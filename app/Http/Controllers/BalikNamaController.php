<?php

namespace App\Http\Controllers;

use App\Models\balik_nama_model;
use App\Models\input_berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BalikNamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['balik_nama'] = balik_nama_model::get();
        return view('pages.sub_layanan.balik_nama.balik_nama', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['input_berkas'] = input_berkas::get();
        // return $data;
        return view('pages.sub_layanan.balik_nama.tambah_balik_nama', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'input_berkas_id' => 'required|exists:input_berkas,id',
            'pembuatan_akta' => 'boolean',
            'ttd_akta' => 'boolean',
            'mutasi_pbb' => 'boolean',
            'verifikasi_pajak' => 'boolean',
            'plotting_validasi' => 'boolean',
            'tanggal_pembayaran_bphtb' => 'nullable|date',
            'nominal_pembayaran_bphtb' => 'nullable',
            'tanggal_pembayaran_pph' => 'nullable|date',
            'nominal_pembayaran_pph' => 'nullable',
            'cek_sertifikat' => 'boolean',
            'znt' => 'boolean',
            'tanggal_daftar' => 'nullable|date',
            'no_berkas' => 'nullable',
            'tanggal_selesai' => 'nullable|date',
        ]);

        $model = new balik_nama_model();
        $model->uid = Str::uuid();
        $model->input_berkas_id = $validatedData['input_berkas_id'];
        $model->pembuatan_akta = $request->has('pembuatan_akta') ? 1 : 0;
        $model->ttd_akta = $request->has('ttd_akta') ? 1 : 0;
        $model->mutasi_pbb = $request->has('mutasi_pbb') ? 1 : 0;
        $model->verifikasi_pajak = $request->has('verifikasi_pajak') ? 1 : 0;
        $model->plotting_validasi = $request->has('plotting_validasi') ? 1 : 0;
        $model->tanggal_pembayaran_bphtb = $validatedData['tanggal_pembayaran_bphtb'];
        $model->nominal_pembayaran_bphtb = $validatedData['nominal_pembayaran_bphtb'];
        $model->tanggal_pembayaran_pph = $validatedData['tanggal_pembayaran_pph'];
        $model->nominal_pembayaran_pph = $validatedData['nominal_pembayaran_pph'];
        $model->cek_sertifikat = $request->has('cek_sertifikat') ? 1 : 0;
        $model->znt = $request->has('znt') ? 1 : 0;
        $model->tanggal_daftar = $validatedData['tanggal_daftar'];
        $model->no_berkas = $validatedData['no_berkas'];
        $model->tanggal_selesai = $validatedData['tanggal_selesai'];

        $model->save();

        Alert::success('Berhasil', 'Data berhasil ditambahkan');

        return redirect('/balik_nama');
    }

    /**
     * Display the specified resource.
     */
    public function show(balik_nama_model $balik_nama_model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(balik_nama_model $balik_nama_model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, balik_nama_model $balik_nama_model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        balik_nama_model::where('uid', $id)->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');

        return redirect('/balik_nama');
    }
}
