<?php

namespace App\Http\Controllers;

use App\Models\input_berkas;
use App\Models\staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['staff'] = staff::get();
        return view('pages.staff_notaris.staff', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.staff_notaris.tambah_staff');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->uid) {
            if ($request->hasFile('foto')) {
                $validator = Validator::make($request->all(), [
                    'nama' => 'required',
                    'jenis_kelamin' => 'required',
                    'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
                    'alamat' => 'required',
                    'email' => 'required',
                    'no_hp' => 'required',
                ]);

                // response error validation
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator);
                }
                $name = $request->file('foto')->getClientOriginalName();
                $filename = time() . '-' . $name;
                $file = $request->file('foto');
                $file->move(public_path('Image'), $filename);

                staff::where('uid', $request->uid)->update([
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'picture' => $filename,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                ]);
                Alert::success('Berhasil', 'Data berhasil ditambahkan');

                return redirect('/staff');
            } else {
                $validator = Validator::make($request->all(), [
                    'nama' => 'required',
                    'jenis_kelamin' => 'required',
                    'alamat' => 'required',
                    'email' => 'required',
                    'no_hp' => 'required',
                ]);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator);
                }

                staff::where('uid', $request->uid)->update([

                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,

                ]);
                Alert::success('Berhasil', 'Data berhasil ditambahkan');

                return redirect('/staff');
            }

        } else {
            $validator = Validator::make($request->all(), [

                'nama' => 'required',

                'jenis_kelamin' => 'required',

                'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
                'alamat' => 'required',
                'email' => 'required',
                'no_hp' => 'required',

            ]);

            // response error validation
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            if ($request->hasFile('foto')) {
                $name = $request->file('foto')->getClientOriginalName();
                $filename = time() . '-' . $name;
                $file = $request->file('foto');
                $file->move(public_path('Image'), $filename);

                staff::create([
                    'uid' => Str::uuid(),
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'picture' => $filename,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,

                ]);
                Alert::success('Berhasil', 'Data berhasil ditambahkan');

                return redirect('/staff');
            } else {
                staff::create([
                    'uid' => Str::uuid(),
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,

                ]);
                Alert::success('Berhasil', 'Data berhasil ditambahkan');

                return redirect('/staff');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['staff'] = staff::where('uid', $id)->first();
        return view('pages.staff_notaris.edit_staff', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        staff::where('uid', $id)->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');

        return redirect('/staff');
    }

   
}
