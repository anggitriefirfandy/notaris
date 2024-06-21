<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\location_model;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        // Pengecualian untuk user dengan role_id 0
        if ($user->role_id == 0) {
            return redirect()->intended($this->redirectPath());
        }

        $location = location_model::first();
        if (!$location) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'Pengaturan lokasi tidak ditemukan. Silakan tambahkan pengaturan lokasi terlebih dahulu.']);
        }

        $userLatitude = $request->input('latitude');
        $userLongitude = $request->input('longitude');

        Log::info('User Latitude: ' . $userLatitude);
        Log::info('User Longitude: ' . $userLongitude);

        if ($userLatitude && $userLongitude) {
            $distance = $this->haversineGreatCircleDistance(
                $location->latitude,
                $location->longitude,
                $userLatitude,
                $userLongitude
            );

            Log::info('Distance: ' . $distance . ' meters');

            if ($distance > $location->radius) {
                Auth::logout();
                $formattedDistance = $this->formatDistance($distance);
                return redirect()->route('login')->withErrors(['error' => 'Anda berada di luar radius yang diizinkan untuk login. Selisih jarak: ' . $formattedDistance]);
            }
        } else {
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'Lokasi GPS tidak ditemukan.']);
        }

        return redirect()->intended($this->redirectPath());
    }

    private function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius; // Return distance in meters
    }

    private function formatDistance($distance)
    {
        if ($distance >= 1000) {
            $distance = $distance / 1000;
            return number_format($distance, 2) . ' km';
        }
        return number_format($distance, 2) . ' meter';
    }
}
