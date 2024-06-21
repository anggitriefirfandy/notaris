<?php

namespace App\Http\Controllers;

use App\Models\absensi_model;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('pages.absensi.absensi_staff.absensi_staff');
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        $today = now()->toDateString();
        $currentTime = $request->input('currentTime'); // Mengambil waktu dari inputan klien

        // Cek apakah sudah ada absensi untuk user_id ini hari ini
        $existingAbsensi = absensi_model::where('user_id', $userId)
            ->whereDate('tanggal_absensi', $today)
            ->first();

        if ($existingAbsensi) {
            Alert::error('Anda sudah melakukan absensi hari ini');
        } else {
            // Jika belum ada, buat absensi baru
            absensi_model::create([
                'user_id' => $userId,
                'waktu_absensi' => $currentTime, // Simpan waktu yang dikirimkan dari klien
                'tanggal_absensi' => $today,
            ]);

            Alert::success('Berhasil melakukan absen');
        }

        return redirect('/absensi_user');
    }
    public function adminIndex()
    {
        // Ambil semua user kecuali yang memiliki role_id 1 atau 5
        $users = User::whereNotIn('role_id', [0, 5])->get();

        // Ambil id semua user untuk digunakan dalam query absensi
        $userIds = $users->pluck('id');

        // Ambil data absensi berdasarkan user_ids
        $absensi = absensi_model::whereIn('user_id', $userIds)->get()->keyBy('user_id');

        // Kembalikan view dengan data users dan absensi
        return view('pages.absensi.absensi_admin.absensi', compact('users', 'absensi'));
    }

}
