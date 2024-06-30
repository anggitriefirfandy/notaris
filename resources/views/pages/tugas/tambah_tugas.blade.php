@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{route('tugas.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('tugas.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-1">

                            <div class="col-lg-4">
                                <label for="form-control">Nama Staff</label>
                                <select class="selectpicker" data-live-search="true" id="ntr" name="user_id" onchange="getnamestaff()">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($user as $key => $value)
                                    <option value="{{$value->id}}"><b>{{$value->name}}-{{$value->roleName()}}</b> </option>
                                    @endforeach
                                </select>
                                @if($errors->has('user_id'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('user_id') }}
                                </div>
                                @endif
                            </div>

                            <div class="col-lg-4">
                                <label for="form-control">Nama Tugas</label>
                                <input type="text" class="form-control" name="content_tugas">
                                @if($errors->has('content_tugas'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('content_tugas') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="deskripsi">Uraian Tugas</label>
                                <textarea class="form-control" name="deskripsi" rows="4"></textarea>
                                @if($errors->has('deskripsi'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('deskripsi') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
