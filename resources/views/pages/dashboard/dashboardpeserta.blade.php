@extends('layouts.main')
@section('content')
<style>
    .cards {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        border: 1px solid rgba(0, 0, 0, .05);
        border-radius: .375rem;
        background-color: #fff;
        background-clip: border-box;
    }


    .cards-body {
        padding: 1.5rem;
        flex: 1 1 auto;
    }

    .cards-title {
        margin-bottom: 1.25rem;
        font-size: 13px;
    }

    .cards-stats .cards-body {
        padding: 1rem 1.5rem;
    }

    .icon-shape {
        display: inline-flex;
        padding: 12px;
        text-align: center;
        border-radius: 50%;
        align-items: center;
        justify-content: center;
    }

    #map {
        height: 400px;
    }
</style>
    <div>
        <br>
        <br>
        @if(Auth::check() && Auth::user()->role_id == 5)
            <h1 style="margin-left:15px">Selamat Datang Peserta {{ Auth::user()->name }}</h1>
        @else
            <h1 style="margin-left:15px">Selamat Datang</h1>
        @endif
        <br>
    </div>
    <div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('jenis_layanan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-1">




                            <div class="col-lg-4">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama">
                                @error('nama')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="email">email</label>
                                <input type="text" class="form-control" name="email">
                                @error('email')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="no_hp">no_hp</label>
                                <input type="text" class="form-control" name="no_hp">
                                @error('no_hp')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="alamat">alamat</label>
                                <input type="text" class="form-control" name="alamat">
                                @error('alamat')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="jenis_kelamin">jenis kelamin</label>
                                <input type="text" class="form-control" name="jenis_kelamin">
                                @error('jenis_kelamin')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-lg-4">
                                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                    <option value="">Pilih</option>
                                    <option value="sd">SD</option>
                                    <option value="smp">SMP</option>
                                    <option value="sma/smk">SMK</option>
                                    <option value="kuliah">Kuliah</option>
                                </select>
                                @error('pendidikan_terakhir')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="jurusan_diambil">jurusan diambil</label>
                                <input type="text" class="form-control" name="jurusan_diambil">
                                @error('jurusan_diambil')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="domisili">Domisili Sekarang</label>
                                <input type="text" class="form-control" name="domisili">
                                @error('domisili')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div style="" class="col-lg-6 cheklist-border">
                                <label for="pass_foto">Pas Foto</label>
                                <div style="border:1px solid rgba(204, 204, 204, 0.5); padding:10px; border-radius:5px" class="d-flex align-items-center">
                                    <input type="file" id="pass_foto" name="pass_foto" class="form-control-file">
                                    @error('pass_foto')
                                    <div class="error" style="color: red; display:block;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>






                        </div>
                        <div class="row mb-1">
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
</div>
@endsection
