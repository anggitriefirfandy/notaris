<?php

namespace App\Http\Controllers;

use App\Models\inputan_model;
use App\Models\input_berkas;
use App\Models\jenis_layanan_model;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class InputanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $inputanModel = inputan_model::all();
        // $inputanBerkas = input_berkas::all();
        // $data = [
        //     'inputanModel' => $inputanModel,
        //     'inputanBerkas' => $inputanBerkas,
        // ];
        // // return $data;
        // return view('pages.inputan.inputan', $data);
        $data['inputan'] = inputan_model::get();
        // return $data;
        return view('pages.inputan.inputan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisLayanans = jenis_layanan_model::all();
        $inputBerkass = input_berkas::all();
        $data = [
            'jenisLayanans' => $jenisLayanans,
            'inputBerkass' => $inputBerkass,
        ];

        // Mengembalikan view tambah inputan dengan data jenis layanan dan input berkas
        return view('pages.inputan.tambah_inputan', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'input_berkas_id' => 'required',
            'jenis_layanan_id' => 'required',
            'content' => 'required',
        ]);

        try {
            // Simpan data inputan ke dalam database
            $inputan = inputan_model::create([
                'uid' => Str::uuid(),
                'input_berkas_id' => $request->input_berkas_id,
                'jenis_layanan_id' => $request->jenis_layanan_id,
                'content' => $request->content,
            ]);

            if ($inputan) {
                // Data berhasil disimpan
                Alert::success('Berhasil', 'Data berhasil ditambahkan');
                return redirect('/inputan');
            } else {
                // Data gagal disimpan
                Alert::error('Gagal', 'Gagal menyimpan data');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            \Log::error('Terjadi kesalahan: ' . $e->getMessage());
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['inputan'] = inputan_model::where('uid', $id)->first();
        return view('pages.inputan.detailinputan', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(inputan_model $inputan_model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, inputan_model $inputan_model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        inputan_model::where('uid', $id)->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');

        return redirect('/inputan');
    }

    public function cetakagenda(Request $request)
    {
        $data['agds'] = inputan_model::where('uid', $request->inputanid)->get();

        $data['agd'] = inputan_model::leftJoin('input_berkas', 'input_berkas.id', '=', 'inputans.input_berkas_id')
            ->leftJoin('jenis_layanans', 'jenis_layanans.id', '=', 'inputans.jenis_layanan_id')
            ->where('inputans.uid', $request->inputanid) // Menambahkan klausa where untuk membatasi hasil left join
            ->get();

        // Render the view as PDF
        $pdf = FacadePdf::loadView('pages.cetak.cetakagenda', $data);

        // Optional: Download the PDF file
        // if ($request->has('download')) {
        //     return $pdf->download('cetakkalender.pdf');
        // }

        // Display the PDF in the browser
        return $pdf->stream();
    }
}
