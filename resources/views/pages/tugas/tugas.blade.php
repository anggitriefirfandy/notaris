@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('tugas.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>tugas</th>
                                        <th>deskripsi</th>
                                        <th>status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tugas as $key => $value)
                                    <tr>
                                        <td width="1%">{{$key + 1}}</td>
                                        <td>
                                            {{$value->user->name}} -
                                            @if($value->user->role_id == 2)
                                                Staff
                                            @elseif($value->user->role_id == 3)
                                                Petugas
                                            @else
                                                Tidak diketahui
                                            @endif
                                        </td>
                                        <td>{{$value->content_tugas}}</td>
                                        <td>{{$value->deskripsi}}</td>
                                        <td>
                                            @if($value->status)
                                                <div class="badge badge-info">selesai</div>
                                            @else
                                                <div class="badge badge-danger">proses</div>
                                            @endif
                                        </td>

                                        <td class="text-center" style="display: flex; justify-content: center;">

                                            <!-- <a href="{{ route('tugas.edit', $value->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Update'><i class="bx bx-edit bx-sm"></i></a> -->



                                            <form action="{{ route('tugas.destroy', $value->uid) }}" method="post">
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
