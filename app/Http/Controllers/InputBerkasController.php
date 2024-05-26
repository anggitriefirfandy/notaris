<?php

namespace App\Http\Controllers;

use App\Models\input_berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class InputBerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['input_berkas'] = input_berkas::get();
        // return $data;
        return view('pages.input_berkas.all_input_berkas', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['input_berkas'] = input_berkas::get();
        // return $data;
        return view('pages.input_berkas.input_berkas', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_berkas' => 'required',
            'jenis_pemilik' => 'required',
            'nama_pemilik' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
            'tanggal_penyerahan' => 'nullable|date',
            'ttd_akta' => 'boolean',
            'ttd_desa' => 'boolean',
            'konfirmasi_camat' => 'boolean',
            'verifikasi_bphtb' => 'boolean',
            'daftar_ukur' => 'boolean',
            'tanggal_ukur' => 'nullable|date',
            'gambar_ukur' => 'boolean',
            'daftar_yasan' => 'boolean',
            'letter_c' => 'boolean',
            'ktp_penjual' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'kk_penjual' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'ktp_pembeli' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'kk_pembeli' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'pbb' => 'boolean',
            'kwitansi' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'npwp' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'efin' => 'boolean',
            'konfirmasi_c' => 'boolean',
            'mutasi_pbb' => 'boolean',
            'plotting_sertifikat' => 'boolean',
            'jenis_akta_tanah' => 'required',
            'dokumen_lain' => 'boolean',
        ]);

        $model = new input_berkas();
        $model->uid = Str::uuid();
        $model->jenis_berkas = $validatedData['jenis_berkas'];
        $model->jenis_pemilik = $validatedData['jenis_pemilik'];
        $model->jenis_akta_tanah = $validatedData['jenis_akta_tanah'];
        $model->nama_pemilik = $validatedData['nama_pemilik'];
        $model->no_hp = $validatedData['no_hp'];
        $model->alamat = $validatedData['alamat'];
        $model->tanggal_masuk = $validatedData['tanggal_masuk'];
        $model->tanggal_selesai = $validatedData['tanggal_selesai'];
        $model->tanggal_penyerahan = $validatedData['tanggal_penyerahan'];
        $model->tanggal_ukur = $validatedData['tanggal_ukur'];
        $model->ttd_desa = $request->has('ttd_desa') ? 1 : 0;
        $model->ttd_akta = $request->has('ttd_akta') ? 1 : 0;
        $model->verifikasi_bphtb = $request->has('verifikasi_bphtb') ? 1 : 0;
        $model->konfirmasi_camat = $request->has('konfirmasi_camat') ? 1 : 0;
        $model->daftar_ukur = $request->has('daftar_ukur') ? 1 : 0;
        $model->gambar_ukur = $request->has('gambar_ukur') ? 1 : 0;
        $model->daftar_yasan = $request->has('daftar_yasan') ? 1 : 0;
        $model->letter_c = $request->has('letter_c') ? 1 : 0;
        $model->pbb = $request->has('pbb') ? 1 : 0;
        $model->efin = $request->has('efin') ? 1 : 0;
        $model->konfirmasi_c = $request->has('konfirmasi_c') ? 1 : 0;
        $model->mutasi_pbb = $request->has('mutasi_pbb') ? 1 : 0;
        $model->plotting_sertifikat = $request->has('plotting_sertifikat') ? 1 : 0;
        $model->dokumen_lain = $request->has('dokumen_lain') ? 1 : 0;

        $model->save();

        $uploadPath = public_path('berkas');

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true, true);
        }

        // Proses untuk mengupload file-file yang bersangkutan
        $filesToUpload = ['ktp_penjual', 'kk_penjual', 'ktp_pembeli', 'kk_pembeli', 'kwitansi', 'npwp'];

        foreach ($filesToUpload as $fileItem) {
            if ($request->hasFile($fileItem)) {
                $file = $request->file($fileItem);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->move($uploadPath, $fileName);
                $model->$fileItem = 'berkas/' . $fileName;
            }
        }

        $model->save();

        Alert::success('Berhasil', 'Data berhasil diperbarui');

        return redirect('/input_berkas');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['input_berkas'] = input_berkas::where('uid', $id)->first();
        return view('pages.input_berkas.editinputberkas', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(input_berkas $input_berkas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // Aturan validasi lainnya di sini...
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $inputBerkas = input_berkas::where('uid', $id)->firstOrFail();

        // Mengupdate data berkas yang tidak berupa file upload
        $inputBerkas->jenis_berkas = $request->jenis_berkas;
        $inputBerkas->jenis_pemilik = $request->jenis_pemilik;
        $inputBerkas->jenis_akta_tanah = $request->jenis_akta_tanah;
        $inputBerkas->nama_pemilik = $request->nama_pemilik;
        $inputBerkas->no_hp = $request->no_hp;
        $inputBerkas->alamat = $request->alamat;
        $inputBerkas->tanggal_masuk = $request->tanggal_masuk;
        $inputBerkas->tanggal_selesai = $request->tanggal_selesai;
        $inputBerkas->tanggal_penyerahan = $request->tanggal_penyerahan;
        $inputBerkas->tanggal_ukur = $request->tanggal_ukur;

        // Mengupdate nilai PBB berdasarkan checkbox
        $inputBerkas->ttd_akta = $request->has('ttd_akta') ? 1 : 0;
        $inputBerkas->ttd_desa = $request->has('ttd_desa') ? 1 : 0;
        $inputBerkas->konfirmasi_camat = $request->has('konfirmasi_camat') ? 1 : 0;
        $inputBerkas->verifikasi_bphtb = $request->has('verifikasi_bphtb') ? 1 : 0;
        $inputBerkas->daftar_ukur = $request->has('daftar_ukur') ? 1 : 0;
        $inputBerkas->gambar_ukur = $request->has('gambar_ukur') ? 1 : 0;
        $inputBerkas->daftar_yasan = $request->has('daftar_yasan') ? 1 : 0;
        $inputBerkas->letter_c = $request->has('letter_c') ? 1 : 0;
        $inputBerkas->pbb = $request->has('pbb') ? 1 : 0;
        $inputBerkas->efin = $request->has('efin') ? 1 : 0;
        $inputBerkas->konfirmasi_c = $request->has('konfirmasi_c') ? 1 : 0;
        $inputBerkas->mutasi_pbb = $request->has('mutasi_pbb') ? 1 : 0;
        $inputBerkas->plotting_sertifikat = $request->has('plotting_sertifikat') ? 1 : 0;
        $inputBerkas->dokumen_lain = $request->has('dokumen_lain') ? 1 : 0;

        // Mengupdate file upload jika ada file yang diunggah
        $filesToUpdate = [

            'ktp_penjual',
            'kk_penjual',
            'ktp_pembeli',
            'kk_pembeli',
            'kwitansi',
            'npwp',
        ];

        foreach ($filesToUpdate as $fileItem) {
            if ($request->hasFile($fileItem)) {
                $validatedData = $request->validate([
                    $fileItem => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                $uploadPath = public_path('berkas');

                if (!File::isDirectory($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true, true);
                }

                $file = $request->file($fileItem);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->move($uploadPath, $fileName);
                $inputBerkas->$fileItem = 'berkas/' . $fileName;
            }
        }

        $inputBerkas->save();

        Alert::success('Berhasil', 'Data berhasil diperbarui');

        return redirect('/input_berkas');
    }

    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         // Aturan validasi lainnya di sini...
    //     ]);

    //     if ($validator->fails()) {
    //         return Redirect::back()->withErrors($validator);
    //     }

    //     $inputBerkas = input_berkas::where('uid', $id)->firstOrFail();

    //     // Mengupdate data berkas yang tidak berupa file upload
    //     $inputBerkas->jenis_berkas = $request->jenis_berkas;
    //     $inputBerkas->jenis_pemilik = $request->jenis_pemilik;
    //     $inputBerkas->nama_pemilik = $request->nama_pemilik;
    //     $inputBerkas->no_hp = $request->no_hp;
    //     $inputBerkas->alamat = $request->alamat;
    //     $inputBerkas->tanggal_masuk = $request->tanggal_masuk;
    //     $inputBerkas->tanggal_selesai = $request->tanggal_selesai;
    //     $inputBerkas->tanggal_penyerahan = $request->tanggal_penyerahan;

    //     // Mengupdate file upload jika ada file yang diunggah
    //     $filesToUpdate = [
    //         'ttd_akta',
    //         'ttd_desa',
    //         'konfirmasi_camat',
    //         'verifikasi_bphtb',
    //         'daftar_ukur',
    //         'tanggal_ukur',
    //         'gambar_ukur',
    //         'daftar_yasan',
    //         'letter_c',
    //         'ktp_penjual',
    //         'kk_penjual',
    //         'ktp_pembeli',
    //         'kk_pembeli',
    //         'PBB',
    //         'kwitansi',
    //         'npwp',
    //         'efin',
    //         'konfirmasi_c',
    //         'mutasi_pbb',
    //         'plotting_sertifikat',
    //         'jenis_akta_tanah',
    //         'dokumen_lain',
    //     ];

    //     foreach ($filesToUpdate as $fileItem) {
    //         if ($request->hasFile($fileItem)) {
    //             $validatedData = $request->validate([
    //                 $fileItem => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //             ]);

    //             $uploadPath = public_path('berkas');

    //             if (!File::isDirectory($uploadPath)) {
    //                 File::makeDirectory($uploadPath, 0755, true, true);
    //             }

    //             $file = $request->file($fileItem);
    //             $fileName = time() . '_' . $file->getClientOriginalName();
    //             $filePath = $file->move($uploadPath, $fileName);
    //             $inputBerkas->$fileItem = 'berkas/' . $fileName;
    //         }
    //     }

    //     $inputBerkas->save();

    //     Alert::success('Berhasil', 'Data berhasil diperbarui');

    //     return redirect('/input_berkas');
    // }

    public function destroy($id)
    {
        input_berkas::where('uid', $id)->delete();
        return redirect('/input_berkas')->with('success', 'Berhasil hapus berkas');
    }

    public function getJumlahClient(Request $request)
    {

        $year = $request->query('year'); // Ambil tahun dari parameter query

        $query = input_berkas::query();

        if ($year) {
            $query->whereYear('created_at', $year);
        }

        $jumlahClient = $query->count();

        return response()->json(['jumlah' => $jumlahClient]);
        // try {
        //     $jumlahMahasiswa = MahasiswaModel::count();
        //     return response()->json(['jumlah' => $jumlahMahasiswa]);
        // } catch (\Exception $e) {
        //     Log::error($e->getMessage());
        //     return response()->json(['error' => 'Terjadi kesalahan server'], 500);
        // }
    }
    public function getjenisberkas(Request $request)
    {
        $year = $request->query('year'); // Ambil tahun dari parameter query

        $jumlahSertifikat = input_berkas::where('jenis_berkas', 'Sertifikat')
            ->whereNotNull('created_at');

        $jumlahYasan = input_berkas::where('jenis_berkas', 'Yasan')
            ->whereNotNull('created_at');

        if ($year) {
            $jumlahSertifikat->whereYear('created_at', $year);
            $jumlahYasan->whereYear('created_at', $year);
        }

        $jumlahSertifikat = $jumlahSertifikat->count();
        $jumlahYasan = $jumlahYasan->count();

        return response()->json([
            'jumlah_sertifikat' => $jumlahSertifikat,
            'jumlah_yasan' => $jumlahYasan,
        ]);
    }

}
