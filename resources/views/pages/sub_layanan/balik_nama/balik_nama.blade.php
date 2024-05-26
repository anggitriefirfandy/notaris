@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('balik_nama.create')}}" class="btn btn-primary btn-sm">Tambah</a>


                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nama client</th>
                                        <th>pembuatan akta</th>
                                        <th>ttd akta</th>
                                        <th>mutasi pbb</th>
                                        <th>verifikasi pajak</th>
                                        <th>plotting dan validasi</th>
                                        <th>tanggal pembayaran bphtb</th>
                                        <th>nominal pembayaran bphtb</th>
                                        <th>tanggal pembayaran pph</th>
                                        <th>nominal pembayaran pph</th>
                                        <th>cek sertifikat</th>
                                        <th>ZNT</th>
                                        <th>tanggal daftar</th>
                                        <th>no berkas</th>
                                        <th>tanggal selesai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($balik_nama as $key => $value)
                                    <tr>
                                        <td width="1%">{{$key + 1}}</td>
                                        <td>{{$value->inputBerkas->nama_pemilik}}-{{$value->inputBerkas->alamat}}</td>
                                        <td>
                                            @if($value->pembuatan_akta)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->ttd_akta)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->mutasi_pbb)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->verifikasi_pajak)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->plotting_validasi)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->tanggal_pembayaran_bphtb)
                                                {{ \Carbon\Carbon::parse($value->tanggal_masuk)->isoFormat('dddd, D MMMM Y') }}
                                            @else
                                                Belum ada tanggal
                                            @endif
                                        </td>
                                        <td>{{$value->nominal_pembayaran_bphtb}}</td>
                                        <td>
                                            @if($value->tanggal_pembayaran_pph)
                                                {{ \Carbon\Carbon::parse($value->tanggal_masuk)->isoFormat('dddd, D MMMM Y') }}
                                            @else
                                                Belum ada tanggal
                                            @endif
                                        </td>
                                        <td>{{$value->nominal_pembayaran_pph}}</td>
                                        <td>
                                            @if($value->cek_sertifikat)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->znt)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->tanggal_daftar)
                                                {{ \Carbon\Carbon::parse($value->tanggal_masuk)->isoFormat('dddd, D MMMM Y') }}
                                            @else
                                                Belum ada tanggal
                                            @endif
                                        </td>
                                        <td>{{$value->no_berkas}}</td>
                                        <td>
                                            @if($value->tanggal_selesai)
                                                {{ \Carbon\Carbon::parse($value->tanggal_masuk)->isoFormat('dddd, D MMMM Y') }}
                                            @else
                                                Belum ada tanggal
                                            @endif
                                        </td>


                                        <td class="text-center" style="display: flex; justify-content: center;">
                                            <a href="{{ route('balik_nama.show', $value->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Update'><i class="bx bx-edit bx-sm"></i></a>
                                            <form action="{{ route('balik_nama.destroy', $value->uid) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title='Delete' type="submit"><i class="bx bx-trash bx-sm"></i></button>
                                            </form>
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
