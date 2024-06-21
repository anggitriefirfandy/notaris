<?php

namespace App\Http\Controllers;

use App\Models\inputan_model;
use App\Models\input_berkas;
use App\Models\jenis_layanan_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tracking'] = inputan_model::get();
        // return $data;
        return view('pages.tracking.tracking', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');

        $inputan = inputan_model::leftJoin('input_berkas', 'input_berkas.id', '=', 'inputans.input_berkas_id')
            ->leftJoin('jenis_layanans', 'jenis_layanans.id', '=', 'inputans.jenis_layanan_id')
            ->where(function ($query) use ($search) {
                $query->where('input_berkas.nama_pemilik', 'like', '%' . $search . '%')
                    ->orWhere('input_berkas.jenis_berkas', 'like', '%' . $search . '%');
            })
            ->select('inputans.*', 'input_berkas.nama_pemilik', 'input_berkas.tanggal_masuk', 'input_berkas.jenis_berkas', 'jenis_layanans.jenis_layanan')
            ->get();
        // return $inputan;

        return view('pages.tracking.tracking', ['inputan' => $inputan]);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Log::info('Edit ID: ' . $id);
        $inputan = inputan_model::where('uid', $id)->first();
        if (!$inputan) {
            return redirect()->route('inputan.index')->with('error', 'Data tidak ditemukan.');
        }

        $inputBerkass = input_berkas::all();
        $jenisLayanans = jenis_layanan_model::all();

        return view('pages.inputan.edit_inputan', compact('inputan', 'inputBerkass', 'jenisLayanans'));
    }

    public function update(Request $request, $id)
    {
        $inputan = inputan_model::find($id);
        if (!$inputan) {
            return redirect()->route('tracking.index')->with('error', 'Data tidak ditemukan.');
        }

        $inputan->update([
            'input_berkas_id' => $request->input_berkas_id,
            'jenis_layanan_id' => $request->jenis_layanan_id,
            'content' => $request->content,
        ]);

        return redirect()->route('tracking.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
