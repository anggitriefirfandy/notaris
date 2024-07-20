<?php

namespace App\Http\Controllers;

use App\Models\Verifyotp_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyotpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show(Verifyotp_model $verifyotp_model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Verifyotp_model $verifyotp_model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Verifyotp_model $verifyotp_model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Verifyotp_model $verifyotp_model)
    {
        //
    }

    public function verifyOtp(Request $request)
    {
        \Log::info('verifyOtp jalan');
        $otpcode_verify = $request->input('otp_code');
        $user = Auth::user();

        if ($user->otp_code == $otpcode_verify) {
            $user->otpcode_verify = $otpcode_verify;
            $user->save();

            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors(['error' => 'Kode OTP tidak valid.']);
        }
    }
}
