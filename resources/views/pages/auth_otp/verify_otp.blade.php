@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="color:white">Masukkan Kode OTP</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('verifyotp') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="otp_code">Kode OTP</label>
                <input type="text" id="otpcode_verify" name="otpcode_verify" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Verifikasi OTP</button>
        </form>
    </div>
@endsection
