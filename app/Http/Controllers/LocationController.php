<?php

namespace App\Http\Controllers;

use App\Models\location_model; // pastikan nama model benar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class LocationController extends Controller
{
    public function index()
    {
        $location = location_model::first();
        return view('pages.location.location', compact('location'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric',
        ]);

        // Mengambil data lokasi pertama dari tabel
        $location = location_model::first();

        // Jika data lokasi tidak ditemukan, buat instance baru dari model
        if (!$location) {
            $location = new location_model();
        }

        // Set data dari request ke instance model
        $location->latitude = $request->input('latitude');
        $location->longitude = $request->input('longitude');
        $location->radius = $request->input('radius');

        // Simpan data ke database
        $location->save();

        Alert::success('Berhasil', 'Titik pusat berhasil diupdate');
        return redirect('/location');
    }
}
