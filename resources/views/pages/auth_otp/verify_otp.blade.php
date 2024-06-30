@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Masukkan Kode OTP</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('verify-otp.verify') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="otp_code">Kode OTP</label>
                <input type="text" id="otp_code" name="otp_code" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Verifikasi OTP</button>
        </form>
    </div>
@endsection
