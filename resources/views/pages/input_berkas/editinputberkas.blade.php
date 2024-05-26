@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{route('input_berkas.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                <form action="{{ route('input_berkas.update', $input_berkas->uid) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">


                        <div class="col-lg-4">
                            <label for="jenis_berkas">Jenis Berkas</label>
                            <select class="form-control" name="jenis_berkas" id="jenis_berkas">
                                <option value="">Pilih Jenis Berkas</option>
                                <option value="Sertifikat" {{ $input_berkas->jenis_berkas == 'Sertifikat' ? 'selected' : '' }}>Sertifikat</option>
                                <option value="Yasan" {{ $input_berkas->jenis_berkas == 'Yasan' ? 'selected' : '' }}>Yasan</option>
                                <!-- tambahkan opsi jenis berkas lainnya sesuai kebutuhan -->
                            </select>
                            @error('jenis_berkas')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="jenis_pemilik">Jenis Kepemilikan</label>
                            <select class="form-control" name="jenis_pemilik" id="jenis_pemilik">
                                <option value="">Pilih Jenis Kepemilikan</option>
                                <option value="Perorangan" {{ $input_berkas->jenis_pemilik == 'Perorangan' ? 'selected' : '' }}>Perorangan</option>
                                <option value="Badan Hukum" {{ $input_berkas->jenis_pemilik == 'Badan Hukum' ? 'selected' : '' }}>Badan Hukum</option>
                                <!-- tambahkan opsi jenis kepemilikan lainnya sesuai kebutuhan -->
                            </select>
                            @error('jenis_pemilik')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="jenis_akta_tanah">Jenis Akta Tanah</label>
                            <select class="form-control" name="jenis_akta_tanah" id="jenis_akta_tanah">
                                <option value="">Pilih Jenis Akta Tanah</option>
                                <option value="ajb" {{ $input_berkas->jenis_akta_tanah == 'ajb' ? 'selected' : '' }}>AJB</option>
                                <option value="aphb" {{ $input_berkas->jenis_akta_tanah == 'aphb' ? 'selected' : '' }}>APHB</option>
                                <option value="hibah" {{ $input_berkas->jenis_akta_tanah == 'hibah' ? 'selected' : '' }}>Hibah</option>

                                <!-- tambahkan opsi jenis kepemilikan lainnya sesuai kebutuhan -->
                            </select>
                            @error('jenis_pemilik')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="form-control">Nama</label>
                            <input type="text" class="form-control" name="nama_pemilik" value="{{$input_berkas['nama_pemilik']}}">
                            @if($errors->has('nama_pemilik'))
                            <div class="error" style="color: red; display:block;">
                                {{ $errors->first('nama_pemilik') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <label for="form-control">No HP</label>
                            <input type="text" class="form-control" name="no_hp" value="{{$input_berkas['no_hp']}}">
                            @if($errors->has('no_hp'))
                            <div class="error" style="color: red; display:block;">
                                {{ $errors->first('no_hp') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <label for="form-control">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{$input_berkas['alamat']}}">
                            @if($errors->has('alamat'))
                            <div class="error" style="color: red; display:block;">
                                {{ $errors->first('alamat') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <label for="form-control">Tanggal Masuk</label>
                            <input type="date" class="form-control" name="tanggal_masuk" value="{{ \Carbon\Carbon::parse($input_berkas['tanggal_masuk'])->format('Y-m-d') }}">
                            @if($errors->has('tanggal_masuk'))
                            <div class="error" style="color: red; display:block;">
                            {{ $errors->first('tanggal_masuk') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <label for="form-control">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggal_selesai" value="{{ \Carbon\Carbon::parse($input_berkas['tanggal_selesai'])->format('Y-m-d') }}">
                            @if($errors->has('tanggal_selesai'))
                            <div class="error" style="color: red; display:block;">
                            {{ $errors->first('tanggal_selesai') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <label for="form-control">Tanggal Penyerahan</label>
                            <input type="date" class="form-control" name="tanggal_penyerahan" value="{{ \Carbon\Carbon::parse($input_berkas['tanggal_penyerahan'])->format('Y-m-d') }}">
                            @if($errors->has('tanggal_penyerahan'))
                            <div class="error" style="color: red; display:block;">
                            {{ $errors->first('tanggal_penyerahan') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <label for="form-control">Tanggal Ukur</label>
                            <input type="date" class="form-control" name="tanggal_ukur" value="{{ \Carbon\Carbon::parse($input_berkas['tanggal_ukur'])->format('Y-m-d') }}">
                            @if($errors->has('tanggal_ukur'))
                            <div class="error" style="color: red; display:block;">
                            {{ $errors->first('tanggal_ukur') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <label for="ktp_penjual">Upload KTP penjual</label>
                            <input type="file" class="form-control" name="ktp_penjual" id="ktp_penjual">
                            @if($input_berkas->ktp_penjual)
                                <p>Nama file: {{ basename($input_berkas->ktp_penjual) }}</p>
                            @endif
                            @error('ktp_penjual')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="kk_penjual">Upload KK penjual</label>
                            <input type="file" class="form-control" name="kk_penjual" id="kk_penjual">
                            @if($input_berkas->kk_penjual)
                                <p>Nama file: {{ basename($input_berkas->kk_penjual) }}</p>
                            @endif
                            @error('kk_penjual')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="ktp_pembeli">Upload KTP pembeli</label>
                            <input type="file" class="form-control" name="ktp_pembeli" id="ktp_pembeli">
                            @if($input_berkas->ktp_pembeli)
                                <p>Nama file: {{ basename($input_berkas->ktp_pembeli) }}</p>
                            @endif
                            @error('ktp_pembeli')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="kk_pembeli">Upload KK Pembeli</label>
                            <input type="file" class="form-control" name="kk_pembeli" id="kk_pembeli">
                            @if($input_berkas->kk_pembeli)
                                <p>Nama file: {{ basename($input_berkas->kk_pembeli) }}</p>
                            @endif
                            @error('kk_pembeli')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="npwp">Upload NPWP</label>
                            <input type="file" class="form-control" name="npwp" id="npwp">
                            @if($input_berkas->npwp)
                                <p>Nama file: {{ basename($input_berkas->npwp) }}</p>
                            @endif
                            @error('npwp')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="kwitansi">Upload Kwitansi</label>
                            <input type="file" class="form-control" name="kwitansi" id="kwitansi">
                            @if($input_berkas->kwitansi)
                                <p>Nama file: {{ basename($input_berkas->kwitansi) }}</p>
                            @endif
                            @error('kwitansi')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="ttd_desa" name="ttd_desa" value="1" @if($input_berkas->ttd_desa == 1) checked @endif>
                                <label for="ttd_desa">TTD Desa</label><br>
                            </div>
                            @error('ttd_desa')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="ttd_akta" name="ttd_akta" value="1" @if($input_berkas->ttd_akta == 1) checked @endif>
                                <label for="ttd_akta">TTD Akta</label><br>
                            </div>
                            @error('ttd_akta')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="konfirmasi_camat" name="konfirmasi_camat" value="1" @if($input_berkas->konfirmasi_camat == 1) checked @endif>
                                <label for="konfirmasi_camat">Konfirmasi Camat</label><br>
                            </div>
                            @error('konfirmasi_camat')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="verifikasi_bphtb" name="verifikasi_bphtb" value="1" @if($input_berkas->verifikasi_bphtb == 1) checked @endif>
                                <label for="verifikasi_bphtb">Verifikasi BPHTB</label><br>
                            </div>
                            @error('verifikasi_bphtb')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="daftar_ukur" name="daftar_ukur" value="1" @if($input_berkas->daftar_ukur == 1) checked @endif>
                                <label for="daftar_ukur">Daftar Ukur</label><br>
                            </div>
                            @error('daftar_ukur')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="gambar_ukur" name="gambar_ukur" value="1" @if($input_berkas->gambar_ukur == 1) checked @endif>
                                <label for="gambar_ukur">Gambar Ukur</label><br>
                            </div>
                            @error('gambar_ukur')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="daftar_yasan" name="daftar_yasan" value="1" @if($input_berkas->daftar_yasan == 1) checked @endif>
                                <label for="daftar_yasan">Daftar Yasan</label><br>
                            </div>
                            @error('daftar_yasan')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="letter_c" name="letter_c" value="1" @if($input_berkas->letter_c == 1) checked @endif>
                                <label for="letter_c">Letter C</label><br>
                            </div>
                            @error('letter_c')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="pbb" name="pbb" value="1" @if($input_berkas->pbb == 1) checked @endif>
                                <label for="pbb">PBB</label><br>
                            </div>
                            @error('pbb')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="efin" name="efin" value="1" @if($input_berkas->efin == 1) checked @endif>
                                <label for="efin">Efin</label><br>
                            </div>
                            @error('efin')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="konfirmasi_c" name="konfirmasi_c" value="1" @if($input_berkas->konfirmasi_c == 1) checked @endif>
                                <label for="konfirmasi_c">Konfirmasi C</label><br>
                            </div>
                            @error('konfirmasi_c')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="mutasi_pbb" name="mutasi_pbb" value="1" @if($input_berkas->mutasi_pbb == 1) checked @endif>
                                <label for="mutasi_pbb">Mutasi PBB</label><br>
                            </div>
                            @error('pbb')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="plotting_sertifikat" name="plotting_sertifikat" value="1" @if($input_berkas->plotting_sertifikat == 1) checked @endif>
                                <label for="plotting_sertifikat">Plotting Sertifikat</label><br>
                            </div>
                            @error('plotting_sertifikat')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                <input type="checkbox" id="dokumen_lain" name="dokumen_lain" value="1" @if($input_berkas->dokumen_lain == 1) checked @endif>
                                <label for="dokumen_lain">Dokumen Lain</label><br>
                            </div>
                            @error('dokumen_lain')
                            <div class="error" style="color: red; display:block;">
                                {{ $message }}
                            </div>
                            @enderror
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
