@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Absensi</h1>
    <form id="absensiForm" action="{{ route('absensi.store') }}" method="POST">
        @csrf
        <input type="hidden" id="currentTime" name="currentTime">
        <button type="submit" class="btn btn-primary">Absen Sekarang</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var currentTimeInput = document.getElementById('currentTime');
        var currentTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        currentTimeInput.value = currentTime;
    });
</script>
@endsection
