@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('inputan.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nama</th>
                                        <th>Jenis Layanan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($inputan as $key => $value)
                                    <tr>
                                        <td width="1%">{{$key + 1}}</td>
                                        <td>{{$value->inputBerkas->nama_pemilik}}-{{$value->inputBerkas->jenis_berkas}}</td>
                                        <td>{{ $value->jenisLayanan->jenis_layanan }}</td>
                                        <td>
                                            @php
                                                $contentArray = json_decode($value->content, true);
                                                $status = 'Complete';
                                                foreach ($contentArray as $content) {
                                                    if (is_null($content) || $content === '') {
                                                        $status = 'On Progress';
                                                        break;
                                                    }
                                                }
                                            @endphp
                                            @if($status == 'Complete')
                                                <div class="badge badge-info">Complete</div>
                                            @else
                                                <div class="badge badge-danger">On Progress</div>
                                            @endif
                                        </td>
                                        <td class="text-center" style="display: flex; justify-content: center;">
                                            <a href="{{ route('inputan.show', $value->uid) }}" class="btn btn-info mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Detail'><i class="bx bx-info-circle bx-sm"></i></a>
                                            <a href="{{ route('inputan.edit', $value->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Update'><i class="bx bx-edit bx-sm"></i></a>
                                            <form action="{{ route('inputan.destroy', $value->uid) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title='Delete' type="submit"><i class="bx bx-trash bx-sm"></i></button>
                                            </form>
										    <a href="/cetakagenda?inputanid={{$value->uid}}" target="_blank" class="btn btn-primary mb-1 mr-1 " data-toggle="tooltip" title='Cetak'>Cetak</a>
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
