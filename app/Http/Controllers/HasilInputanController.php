<?php

namespace App\Http\Controllers;

use App\Models\hasil_inputan_model;
use App\Models\inputan_model;
use App\Models\jenis_layanan_model;
use Illuminate\Http\Request;

class HasilInputanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['hasil_inputan'] = hasil_inputan_model::get();
        // return $data;
        return view('pages.hasil_inputan.hasil_inputan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua jenis layanan untuk ditampilkan di dropdown
        $jenis_layanan = jenis_layanan_model::all();

        return view('pages.hasil_inputan.tambah_hasil_inputan', compact('jenis_layanan'));
    }

    public function getInputans(Request $request)
    {
        // Validasi jenis_layanan_id
        $request->validate([
            'jenis_layanan_id' => 'required|exists:jenis_layanans,id',
        ]);

        // Ambil inputan yang sesuai dengan jenis layanan yang dipilih
        $inputans = inputan_model::find($request->jenis_layanan_id)->inputans;

        // Kirim data inputan ke dalam JSON response
        return response()->json($inputans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pencet(Request $request)
    {
        // Tambahkan pesan ke konsol browser
        \Log::info('Sudah berhasil terpencet');
        return response()->json(['message' => 'Sudah berhasil terpencet']);
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(hasil_inputan_model $hasil_inputan_model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hasil_inputan_model $hasil_inputan_model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hasil_inputan_model $hasil_inputan_model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hasil_inputan_model $hasil_inputan_model)
    {
        //
    }
}
