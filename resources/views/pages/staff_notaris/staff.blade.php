@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('staff.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($staff as $key => $value)
                                    <tr>
                                        <td width="1%">{{$key + 1}}</td>
                                        <td>{{$value->nama}}</td>
                                        <td>
                                            @if($value->jenis_kelamin == 1)
                                                Laki-laki
                                            @else
                                                Perempuan
                                            @endif
                                        </td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->no_hp}}</td>

                                        <td class="text-center" style="display: flex; justify-content: center;">

                                            <a href="{{ route('staff.edit', $value->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Update'><i class="bx bx-edit bx-sm"></i></a>



                                            <form action="{{ route('staff.destroy', $value->uid) }}" method="post">
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
