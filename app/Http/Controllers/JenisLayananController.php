<?php

namespace App\Http\Controllers;

use App\Models\jenis_layanan_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class JenisLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['jenis_layanan'] = jenis_layanan_model::get();
        // return $data;
        return view('pages.jenis_layanan.jenis_layanan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('pages.jenis_layanan.tambah_jenis_layanan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_layanan' => 'required',
            'inputanData' => 'required', // Validasi inputanData
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mendapatkan data inputan dari form
        $inputanData = json_decode($request->inputanData, true);

        // Mengonversi data inputan ke format yang sesuai
        $formattedInputanData = [];
        foreach ($inputanData as $input) {
            $formattedInputanData[$input['name'] . '@' . $input['type']] = null;
        }
        // return $formattedInputanData;

        // Menyimpan data ke database
        jenis_layanan_model::create([
            'uid' => Str::uuid(),
            'jenis_layanan' => $request->jenis_layanan,
            'isi_inputan' => json_encode($formattedInputanData),
        ]);

        Alert::success('Berhasil', 'Data berhasil ditambahkan');

        return redirect('/jenis_layanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis_layanan_model $jenis_layanan_model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Log::info('Edit ID: ' . $id);
        $jenislayanan = jenis_layanan_model::where('uid', $id)->first();
        if (!$jenislayanan) {
            return redirect()->route('jenis_layanan.index')->with('error', 'Data tidak ditemukan.');
        }
        // return $jenislayanan;

        return view('pages.jenis_layanan.edit_jenis_layanan', compact('jenislayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Log::info('Request method:', ['method' => $request->method()]);

        // Validasi data input
        $validator = Validator::make($request->all(), [
            'jenis_layanan' => 'required',
            'inputanData' => 'required', // Validasi inputanData
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mendapatkan data inputan dari form
        $inputanData = json_decode($request->inputanData, true);

        // Mengonversi data inputan ke format yang sesuai
        $formattedInputanData = [];
        foreach ($inputanData as $input) {
            $formattedInputanData[$input['name'] . '@' . $input['type']] = null;
        }

        // Cari data berdasarkan id
        $jenislayanan = jenis_layanan_model::findOrFail($id);

        // Update data
        $jenislayanan->update([
            'jenis_layanan' => $request->jenis_layanan,
            'isi_inputan' => json_encode($formattedInputanData),
        ]);

        Alert::success('Berhasil', 'Data berhasil diupdate');

        return redirect('/jenis_layanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        jenis_layanan_model::where('uid', $id)->delete();
        return redirect('/jenis_layanan')->with('success', 'Berhasil hapus berkas');
    }
}
