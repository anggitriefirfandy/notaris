@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Hasil Inputan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('hasil_inputan.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="jenis_layanan">Pilih Jenis Layanan</label>
                            <select class="form-control" id="jenis_layanan" name="jenis_layanan_id" onclick="loadInputans()">
                                @foreach($jenis_layanan as $jenisLayanan)
                                    <option value="{{ $jenisLayanan->id }}">{{ $jenisLayanan->nama }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div id="inputan-container">
                            <!-- Form inputan dinamis akan muncul di sini -->
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<!-- Masukkan tag <script> di bagian atas halaman -->
<script>
    function loadInputans() {
        console.log("Dropdown dipilih."); // Mencetak pesan di konsol browser

        var jenisLayananId = document.getElementById('jenis_layanan').value;

        // Ambil daftar inputan untuk jenis layanan yang dipilih
        $.ajax({
            url: "{{ route('get_inputans') }}",
            type: "GET",
            data: {
                jenis_layanan_id: jenisLayananId
            },
            success: function(response){
                // Reset container inputan
                $('#inputan-container').empty();

                // Tambahkan form inputan sesuai dengan daftar inputan yang diperoleh
                $.each(response, function(index, inputan){
                    $('#inputan-container').append('<div class="form-group"><label for="'+ inputan.nama +'">'+ inputan.nama +'</label><input type="text" class="form-control" name="'+ inputan.nama +'"></div>');
                });
            }
        });
    }
</script>

<!-- Tempatkan tag <select> di bawah definisi fungsi -->
<s class="form-control" id="jenis_layanan" name="jenis_layanan_id" onchange="loadInputans()">
    <!-- Opsi dropdown disini -->
                                @foreach($jenis_layanan as $jenisLayanan)
                                    <option value="{{ $jenisLayanan->id }}">{{ $jenisLayanan->nama }}</option>
                                @endforeach
</select>



</script>
@endpush
