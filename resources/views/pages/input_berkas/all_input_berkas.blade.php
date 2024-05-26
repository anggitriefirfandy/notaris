@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('input_berkas.create')}}" class="btn btn-primary btn-sm">Tambah</a>


                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nama_pemilik</th>
                                        <th>no_hp</th>
                                        <th>alamat</th>
                                        <th>jenis_berkas</th>
                                        <th>jenis_kepemilikan</th>
                                        <th>jenis_akta_tanah</th>
                                        <th>ttd akta</th>
                                        <th>ttd desa</th>
                                        <th>konfirmasi camat</th>
                                        <th>verifikasi bphtb</th>
                                        <th>daftar ukur</th>
                                        <th>gambar ukur</th>
                                        <th>daftar yasan</th>
                                        <th>letter c</th>
                                        <th>ktp penjual</th>
                                        <th>kk penjual</th>
                                        <th>ktp pembeli</th>
                                        <th>kk pembeli</th>
                                        <th>PBB</th>
                                        <th>kwitansi</th>
                                        <th>npwp</th>
                                        <th>efin</th>
                                        <th>konfirmasi c</th>
                                        <th>mutasi PBB</th>
                                        <th>plotting sertifikat</th>
                                        <!-- <th>jenis akta tanah</th> -->
                                        <th>dokumen lain</th>
                                        <th>tanggal_masuk</th>
                                        <th>tanggal_selesai</th>
                                        <th>tanggal_penyerahan</th>
                                        <th>tanggal_ukur</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($input_berkas as $key => $value)
                                    <tr>
                                        <td width="1%">{{$key + 1}}</td>
                                        <td>{{$value->nama_pemilik}}</td> <!-- Akses nama dari relasi notaris -->
                                        <td>{{$value->no_hp}}</td>
                                        <td>{{$value->alamat}}</td> <!-- Akses nama pekerjaan dari relasi pekerjaan -->
                                        <td>{{$value->jenis_berkas}}</td>
                                        <td>{{$value->jenis_pemilik}}</td>
                                        <td>{{$value->jenis_akta_tanah}}</td>
                                        <td>
                                            @if($value->ttd_akta)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->ttd_desa)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->konfirmasi_camat)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->verifikasi_bphtb)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->daftar_ukur)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>

                                        <td>
                                            @if($value->gambar_ukur)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->daftar_yasan)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->letter_c)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->ktp_penjual)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->kk_penjual)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->ktp_pembeli)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->kk_pembeli)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->pbb)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->kwitansi)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->npwp)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->efin)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->konfirmasi_c)
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
                                            @if($value->plotting_sertifikat)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <!-- <td>
                                            @if($value->jenis_akta_tanah)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td> -->
                                        <td>
                                            @if($value->dokumen_lain)
                                                <div class="badge badge-info">V</div>
                                            @else
                                                <div class="badge badge-danger">X</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->tanggal_masuk)
                                                {{ \Carbon\Carbon::parse($value->tanggal_masuk)->isoFormat('dddd, D MMMM Y') }}
                                            @else
                                                Belum ada tanggal
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->tanggal_selesai)
                                                {{ \Carbon\Carbon::parse($value->tanggal_selesai)->isoFormat('dddd, D MMMM Y') }}
                                            @else
                                                Belum ada tanggal
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->tanggal_penyerahan)
                                                {{ \Carbon\Carbon::parse($value->tanggal_penyerahan)->isoFormat('dddd, D MMMM Y') }}
                                            @else
                                                Belum ada tanggal
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->tanggal_ukur)
                                                {{ \Carbon\Carbon::parse($value->tanggal_ukur)->isoFormat('dddd, D MMMM Y') }}
                                            @else
                                                Belum ada tanggal
                                            @endif
                                        </td>

                                        <td class="text-center" style="display: flex; justify-content: center;">
                                            <a href="{{ route('input_berkas.show', $value->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Update'><i class="bx bx-edit bx-sm"></i></a>
                                            <form action="{{ route('input_berkas.destroy', $value->uid) }}" method="post">
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
