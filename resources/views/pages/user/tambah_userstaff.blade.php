@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{route('user_staff.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('user_staff.store')}}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                <label for="form-control">Staff</label>
                                <select class="selectpicker" data-live-search="true" id="ntr" name="staff" onchange="getnamestaff()">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($user_staff as $key => $value)
                                    <option value="{{$value}}"><b>{{$value->nama}}</b> </option>
                                    @endforeach
                                </select>
                                @if($errors->has('staff'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('staff') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                        <div class="col-lg-12">
                            <label for="form-control">Role</label>
                            <select class="form-control" name="role_id">
                                <option value="">Pilih salah satu</option>
                                <option value="1">Notaris</option>
                                <option value="2">Staff</option>
                                <option value="3">Petugas Pengecekan</option>
                            </select>
                            @if($errors->has('role_id'))
                            <div class="error" style="color: red; display:block;">
                                {{ $errors->first('role_id') }}
                            </div>
                            @endif
                        </div>
                    </div>

                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                                @if($errors->has('username'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('username') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Email</label>
                                <input type="email" class="form-control" name="email">
                                @if($errors->has('email'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Password</label>
                                <input type="password" class="form-control" id="username" name="password">
                                @if($errors->has('password'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('password') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
