<?php

namespace App\Http\Controllers;

use App\Models\tugas_model;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tugas'] = tugas_model::with('user')->orderBy('status', 'asc')->get();
        return view('pages.tugas.tugas', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['user'] = User::whereNotIn('role_id', [0, 1, 5])->get();

        // return $data;
        return view('pages.tugas.tambah_tugas', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'content_tugas' => 'required',
            'deskripsi' => 'required',

        ]);

        $model = new tugas_model();
        $model->uid = Str::uuid();
        $model->user_id = $validatedData['user_id'];
        $model->content_tugas = $validatedData['content_tugas'];
        $model->deskripsi = $validatedData['deskripsi'];
        $model->status = 0; // Set status to 0 automatically
        $model->save();

        Alert::success('Berhasil', 'Data berhasil ditambahkan');

        return redirect('/tugas');
    }

    /**
     * Display the specified resource.
     */
    public function show(tugas_model $tugas_model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tugas_model $tugas_model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tugas_model $tugas_model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        tugas_model::where('uid', $id)->delete();
        return redirect('/tugas')->with('success', 'Berhasil hapus');
    }
    public function markAsCompleted($id)
    {
        $tugas = tugas_model::findOrFail($id);
        $tugas->status = 1;
        $tugas->save();

        Alert::success('Berhasil', 'Status tugas berhasil diperbarui menjadi selesai');
        return redirect()->back();
    }
}
