@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Detail Inputan</h5>
                    <a href="{{route('inputan.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Pemilik</th>
                                    <th>Jenis Berkas</th>
                                    <!-- Kolom dinamis berdasarkan isi JSON -->
                                    @foreach(json_decode($inputan->content, true) as $key => $value)
                                        <th>{{ $key }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $inputan->inputBerkas->nama_pemilik }}</td>
                                    <td>{{ $inputan->inputBerkas->jenis_berkas }}</td>
                                    <!-- Isi kolom berdasarkan nilai JSON -->
                                    @foreach(json_decode($inputan->content, true) as $key => $value)
                                        <td>
                                            @if($value === 'checked')
                                                Sudah
                                            @elseif($value === 'unchecked')
                                                Belum
                                            @else
                                                {{ $value }}
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
