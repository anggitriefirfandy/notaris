@extends('layouts.main')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-px-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Absensi</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Waktu Absensi</th>
                                        <th>Tanggal Absensi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @if ($user->absensi)
                                                    {{ $user->absensi->waktu_absensi }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->absensi)
                                                    {{ $user->absensi->tanggal_absensi }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->absensi)
                                                    Berangkat
                                                @else
                                                    Tidak Berangkat
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
