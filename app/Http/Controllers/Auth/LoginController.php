<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\location_model;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role_id == 0) {
            // Generate OTP code for role_id 0 admin
            $otpCode = mt_rand(100000, 999999); // Generate random 6-digit code
            $user->otp_code = $otpCode;
            $user->save();

            // Send OTP code via email to the user's email address
            Mail::to($user->email)->send(new OtpMail($otpCode));
            \Log::info('email udh dikirim');
            // Redirect to OTP verification page
            return view('pages.auth_otp.verify_otp');
        } else {
            // For users with role_id other than 0, perform location validation
            $location = location_model::first();

            if (!$location) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['error' => 'Pengaturan lokasi tidak ditemukan.']);
            }

            // Check if user's location is within the allowed radius
            $userLatitude = $request->input('latitude');
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
        \Log::info('verifikasi pencocokan otp sudah jalan');
        $request->validate([
            'otp_code' => 'required|numeric',
        ]);

        $user = auth()->user();

        // Tampilkan nilai $user->otp_code dan $request->otp_code di log atau dd()
        \Log::info('User OTP Code: ' . $user->otp_code);
        \Log::info('Request OTP Code: ' . $request->otp_code);

        if ($user->otp_code == $request->otp_code) {
            // OTP is correct
            // Reset OTP code
            $user->otp_code = null;
            $user->save();

            // Redirect to intended path
            return view('pages.dashboard.dashboardstaff'); // Arahkan ke dashboard yang sesuai
        } else {
            // OTP is incorrect
            return redirect()->back()->withErrors(['otp_code' => 'Invalid OTP code']);
        }
    }

}
