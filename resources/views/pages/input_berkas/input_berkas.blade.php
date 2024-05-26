@extends('layouts.main')

@section('content')
<style>

</style>
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('input_berkas.index') }}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('input_berkas.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="jenis_berkas">Jenis Berkas</label>
                                <select class="form-control" name="jenis_berkas" id="jenis_berkas">
                                    <option value="">Pilih Jenis Berkas</option>
                                    <option value="Sertifikat">Sertifikat</option>
                                    <option value="Yasan">Yasan</option>
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
                                    <option value="Perorangan">Perorangan</option>
                                    <option value="Badan Hukum">Badan Hukum</option>
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
                                    <option value="ajb">AJB</option>
                                    <option value="aphb">APHB</option>
                                    <option value="hibah">Hibah</option>
                                    <!-- tambahkan opsi jenis kepemilikan lainnya sesuai kebutuhan -->
                                </select>
                                @error('jenis_akta_tanah')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-lg-4">
                                <label for="nama_pemilik">Nama</label>
                                <input type="text" class="form-control" name="nama_pemilik">
                                @error('nama_pemilik')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="no_hp">No HP</label>
                                <input type="text" class="form-control" name="no_hp">
                                @error('no_hp')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat">
                                @error('alamat')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                                @error('tanggal_masuk')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="Pilih Tanggal (Opsional)">
                                @error('tanggal_selesai')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-lg-4">
                                <label for="tanggal_penyerahan">Tanggal Penyerahan</label>
                                <input type="date" class="form-control" id="tanggal_penyerahan" name="tanggal_penyerahan">
                                @error('tanggal_penyerahan')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="tanggal_ukur">Tanggal Ukur</label>
                                <input type="date" class="form-control" id="tanggal_ukur" name="tanggal_ukur">
                                @error('tanggal_ukur')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div style="" class="col-lg-6 cheklist-border">
                                <label for="ktp_penjual">KTP Penjual</label>
                                <div style="border:1px solid rgba(204, 204, 204, 0.5); padding:10px; border-radius:5px" class="d-flex align-items-center">
                                    <input type="file" id="ktp_penjual" name="ktp_penjual" class="form-control-file">
                                    @error('ktp_penjual')
                                    <div class="error" style="color: red; display:block;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div style="" class="col-lg-6 cheklist-border">
                                <label for="kk_penjual">KK Penjual</label>
                                <div style="border:1px solid rgba(204, 204, 204, 0.5); padding:10px; border-radius:5px" class="d-flex align-items-center">
                                    <input type="file" id="kk_penjual" name="kk_penjual" class="form-control-file">
                                    @error('kk_penjual')
                                    <div class="error" style="color: red; display:block;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div style="" class="col-lg-6 cheklist-border">
                                <label for="ktp_pembeli">KTP Pembeli</label>
                                <div style="border:1px solid rgba(204, 204, 204, 0.5); padding:10px; border-radius:5px" class="d-flex align-items-center">
                                    <input type="file" id="ktp_pembeli" name="ktp_pembeli" class="form-control-file">
                                    @error('ktp_pembeli')
                                    <div class="error" style="color: red; display:block;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div style="" class="col-lg-6 cheklist-border">
                                <label for="kk_pembeli">KK Pembeli</label>
                                <div style="border:1px solid rgba(204, 204, 204, 0.5); padding:10px; border-radius:5px" class="d-flex align-items-center">
                                    <input type="file" id="kk_pembeli" name="kk_pembeli" class="form-control-file">
                                    @error('kk_pembeli')
                                    <div class="error" style="color: red; display:block;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div style="" class="col-lg-6 cheklist-border">
                                <label for="npwp">NPWP</label>
                                <div style="border:1px solid rgba(204, 204, 204, 0.5); padding:10px; border-radius:5px" class="d-flex align-items-center">
                                    <input type="file" id="npwp" name="npwp" class="form-control-file">
                                    @error('npwp')
                                    <div class="error" style="color: red; display:block;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div style="" class="col-lg-6 cheklist-border">
                                <label for="kwitansi">Kwitansi</label>
                                <div style="border:1px solid rgba(204, 204, 204, 0.5); padding:10px; border-radius:5px" class="d-flex align-items-center">
                                    <input type="file" id="kwitansi" name="kwitansi" class="form-control-file">
                                    @error('kwitansi')
                                    <div class="error" style="color: red; display:block;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                    <input type="checkbox" id="ttd_desa" name="ttd_desa" value="1">
                                    <label for="ttd_desa">TTD Desa</label><br>
                                </div>
                                @error('konfirmasi_camat')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                    <input type="checkbox" id="ttd_akta" name="ttd_akta" value="1">
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
                                    <input type="checkbox" id="konfirmasi_camat" name="konfirmasi_camat" value="1">
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
                                    <input type="checkbox" id="verifikasi_bphtb" name="verifikasi_bphtb" value="1">
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
                                    <input type="checkbox" id="daftar_ukur" name="daftar_ukur" value="1">
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
                                    <input type="checkbox" id="gambar_ukur" name="gambar_ukur" value="1">
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
                                    <input type="checkbox" id="daftar_yasan" name="daftar_yasan" value="1">
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
                                    <input type="checkbox" id="letter_c" name="letter_c" value="1">
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
                                    <input type="checkbox" id="pbb" name="pbb" value="1">
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
                                    <input type="checkbox" id="efin" name="efin" value="1">
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
                                    <input type="checkbox" id="konfirmasi_c" name="konfirmasi_c" value="1">
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
                                    <input type="checkbox" id="mutasi_pbb" name="mutasi_pbb" value="1">
                                    <label for="mutasi_pbb">Mutasi PBB</label><br>
                                </div>
                                @error('mutasi_pbb')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                    <input type="checkbox" id="plotting_sertifikat" name="plotting_sertifikat" value="1">
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
                                    <input type="checkbox" id="dokumen_lain" name="dokumen_lain" value="1">
                                    <label for="dokumen_lain">Dokumen Lain</label><br>
                                </div>
                                @error('dokumen_lain')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
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
@endsection
