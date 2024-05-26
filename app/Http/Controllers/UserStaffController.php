<?php

namespace App\Http\Controllers;

use App\Models\staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class UserStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user_staff'] = User::whereIn('role_id', [1, 2, 3])->get();
        return view('pages.user.userstaff', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['user_staff'] = staff::whereNull('user_id')->get();
        return view('pages.user.tambah_userstaff', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'staff' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required', // Tambahkan validasi untuk role_id
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $ntr = json_decode($request->staff);
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'uid' => Str::uuid(),
            'role_id' => $request->role_id, // Gunakan nilai role_id dari inputan pengguna
        ]);

        staff::where('uid', $ntr->uid)->update([
            'user_id' => $user['id'],
        ]);
        Alert::success('Berhasil', 'Berhasil Tambah Pengguna');

        return redirect('/user_staff');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan ID pengguna berdasarkan UUID
        $user = User::where('uid', $id)->firstOrFail();

        // Hapus dulu dari tabel staff menggunakan id pengguna
        $staff = Staff::where('user_id', $user->id)->delete();

        // Hapus dari tabel users
        $user->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');

        return redirect('/user_staff');
    }

}
