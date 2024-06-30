<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Location; // Pastikan untuk mengimpor model Location jika belum
use App\Models\location_model;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role_id == 0) {
            // Generate OTP code for role_id 0 admin
            // $emailAddress = 'irfandyanggit@gmail.com'; // Email address to send OTP to
            // $otpCode = mt_rand(100000, 999999); // Generate random 6-digit code
            // $user->otp_code = $otpCode;
            // $user->save();

            // // Send OTP code via email to the user's email address
            // Mail::to($emailAddress)->send(new OtpMail($otpCode));

            // return view('pages.auth_otp.verify_otp');
            return redirect()->intended($this->redirectPath());
        } else {
            // For users with role_id other than 0, perform location validation
            $location = location_model::first(); // Get the first location record from database

            if (!$location) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['error' => 'Pengaturan lokasi tidak ditemukan.']);
            }

            // Check if user's location is within the allowed radius
            $userLatitude = $request->input('latitude'); // Adjust this according to your form input
            $userLongitude = $request->input('longitude');

            if ($userLatitude && $userLongitude) {
                $distance = $this->calculateDistance($userLatitude, $userLongitude, $location->latitude, $location->longitude);

                if ($distance > $location->radius) {
                    Auth::logout();
                    $formattedDistance = $this->formatDistance($distance);
                    return redirect()->route('login')->withErrors(['error' => 'Anda berada di luar radius yang diizinkan untuk login. Selisih jarak: ' . $formattedDistance]);
                }
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors(['error' => 'Lokasi GPS tidak ditemukan.']);
            }
        }

        return redirect()->intended($this->redirectPath());
    }

    protected function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371000; // Earth radius in meters

        $latFrom = deg2rad($lat1);
        $lonFrom = deg2rad($lon1);
        $latTo = deg2rad($lat2);
        $lonTo = deg2rad($lon2);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

        return $angle * $earthRadius; // Distance in meters
    }

    protected function formatDistance($distance)
    {
        if ($distance >= 1000) {
            $distance = $distance / 1000;
            return number_format($distance, 2) . ' km';
        }
        return number_format($distance, 2) . ' meter';
    }

    public function showVerifyOtpForm()
    {
        return view('pages.auth_otp.verify_otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp_code' => 'required|digits:6',
        ]);

        $user = Auth::user();

        if ($user->otp_code == $request->otp_code) {
            $user->otp_code = null; // Reset OTP code after successful verification
            $user->save();

            return redirect()->intended('/home'); // Redirect to home page after successful login
        }

        return back()->withErrors([
            'otp_code' => 'Kode OTP yang dimasukkan salah. Silakan coba lagi.',
        ]);
    }
}
