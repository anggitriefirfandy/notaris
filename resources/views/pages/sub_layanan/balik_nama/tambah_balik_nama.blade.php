@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('jenis_layanan.index') }}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('balik_nama.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                <label for="input_berkas">Pilih client</label>
                                <select class="form-control" id="input_berkas" name="input_berkas_id">
                                    @foreach($input_berkas as $inputBerkas)
                                        <option value="{{ $inputBerkas->id }}">{{ $inputBerkas->nama_pemilik }} - {{ $inputBerkas->alamat }} - {{ $inputBerkas->no_hp }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                    <input type="checkbox" id="pembuatan_akta" name="pembuatan_akta" value="1">
                                    <label for="pembuatan_akta">Pembuatan Akta</label><br>
                                </div>
                                @error('pembuatan_akta')
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
                                    <input type="checkbox" id="verifikasi_pajak" name="verifikasi_pajak" value="1">
                                    <label for="verifikasi_pajak">Verifikasi Pajak</label><br>
                                </div>
                                @error('verifikasi_pajak')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                    <input type="checkbox" id="plotting_validasi" name="plotting_validasi" value="1">
                                    <label for="plotting_validasi">Plotting dan Validasi</label><br>
                                </div>
                                @error('plotting_validasi')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="tanggal_pembayaran_bphtb">Tanggal Pembayaran BPHTB</label>
                                <input type="date" class="form-control" id="tanggal_pembayaran_bphtb" name="tanggal_pembayaran_bphtb">
                                @error('tanggal_pembayaran_bphtb')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="nominal_pembayaran_bphtb">Nominal BPHTB</label>
                                <input type="text" class="form-control autoNumeric" id="nominal_pembayaran_bphtb" name="nominal_pembayaran_bphtb">
                                @error('nominal_pembayaran_bphtb')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="tanggal_pembayaran_pph">Tanggal Pembayaran PPH</label>
                                <input type="date" class="form-control" id="tanggal_pembayaran_pph" name="tanggal_pembayaran_pph">
                                @error('tanggal_pembayaran_pph')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="nominal_pembayaran_pph">Nominal BPHTB</label>
                                <input type="text" class="form-control autoNumeric" id="nominal_pembayaran_pph" name="nominal_pembayaran_pph">
                                @error('nominal_pembayaran_pph')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                    <input type="checkbox" id="cek_sertifikat" name="cek_sertifikat" value="1">
                                    <label for="cek_sertifikat">Cek Sertifikat</label><br>
                                </div>
                                @error('cek_sertifikat')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;margin-top:10px">
                                    <input type="checkbox" id="znt" name="znt" value="1">
                                    <label for="znt">ZNT</label><br>
                                </div>
                                @error('znt')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="tanggal_daftar">Tanggal Daftar</label>
                                <input type="date" class="form-control" id="tanggal_daftar" name="tanggal_daftar">
                                @error('tanggal_daftar')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="no_berkas">No Berkas</label>
                                <input type="text" class="form-control" name="no_berkas">
                                @error('no_berkas')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                                @error('tanggal_selesai')
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
<script src="path/to/autoNumeric.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        autoNumeric('.autoNumeric', {
            currencySymbol: 'Rp ',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            modifyValueOnWheel: false,
            unformatOnSubmit: true
        });
    });
</script>

@endsection
