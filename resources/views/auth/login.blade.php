@extends('layouts.app')

<title>E-NOTARIS</title>
@section('content')
<body id="particles-js"></body>
<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form method="POST" action="{{ route('login') }}" name="form1" class="box" onsubmit="return checkStuff()">
      @csrf
      <h2>Selamat datang di Tata Kelola Notaris</h2>
      <h5>Silahkan login terlebih dahulu.</h5>
      <input type="hidden" id="latitude" name="latitude">
      <input type="hidden" id="longitude" name="longitude">
      <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      <i class="typcn typcn-eye" id="eye"></i>
      <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
      <input type="submit" value="Sign in" class="btn1">
    </form>
  </div>
  <div class="footer">
    <div class="register-link">
      <a href="{{ route('register') }}" class="btn btn-primary">Klik disini untuk melamar pekerjaan staff</a>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        document.getElementById('latitude').value = position.coords.latitude;
        document.getElementById('longitude').value = position.coords.longitude;
        console.log('Latitude: ' + position.coords.latitude);
        console.log('Longitude: ' + position.coords.longitude);
      }, function(error) {
        console.error("Error Code = " + error.code + " - " + error.message);
      });
    } else {
      console.error("Geolocation is not supported by this browser.");
    }
  });

  function checkStuff() {
    var lat = document.getElementById('latitude').value;
    var lon = document.getElementById('longitude').value;
    if (!lat || !lon) {
      alert('Lokasi tidak ditemukan. Pastikan izin lokasi sudah diberikan.');
      return false;
    }

    // Tunda pengiriman form selama 5 detik (5000 ms)
    setTimeout(function() {
      document.form1.submit();
    }, 5000);

    return false; // Mencegah pengiriman form segera
  }

  // Menampilkan pesan kesalahan dari sesi
  @if ($errors->has('error'))
    alert('{{ $errors->first('error') }}');
  @endif
</script>
@endsection
