@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('tracking.search') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama pemilik atau jenis berkas" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @if(isset($inputan) && $inputan->count() > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Layanan</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Status</th>
                                    <th>Proses Terakhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inputan as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->nama_pemilik ?? 'Tidak Diketahui' }} - {{ $value->jenis_berkas ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ $value->jenis_layanan ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($value->tanggal_masuk)->isoFormat('D MMMM Y') }}</td>
                                        <td>
                                            @php
                                                $contentArray = json_decode($value->content, true);
                                                $status = 'Complete';
                                                foreach ($contentArray as $content) {
                                                    if (is_null($content) || $content === '' || $content == 'unchecked') {
                                                        $status = 'On Progress';
                                                        break;
                                                    }
                                                }
                                            @endphp
                                            <div class="badge {{ $status == 'Complete' ? 'badge-info' : 'badge-danger' }}">{{ $status }}</div>
                                        </td>
                                        <td>
                                            @php
                                                $prosesTerakhir = '';
                                                $lastKey = '';
                                                foreach ($contentArray as $key => $content) {
                                                    $lastKey = $key;
                                                    if (is_null($content) || $content === '' || $content == 'unchecked') {
                                                        $prosesTerakhir = $key;
                                                        break;
                                                    }
                                                }
                                                if ($prosesTerakhir == '') {
                                                    $prosesTerakhir = $lastKey;
                                                }
                                            @endphp
                                            {{ $prosesTerakhir }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('inputan.show', $value->uid) }}" class="btn btn-info mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Detail'><i class="bx bx-info-circle bx-sm"></i></a>
                                            <a href="{{ route('inputan.edit', $value->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Update'><i class="bx bx-edit bx-sm"></i></a>
                                            <!-- <a href="/cetakagenda?inputanid={{ $value->uid }}" target="_blank" class="btn btn-primary mb-1 mr-1" data-toggle="tooltip" title='Cetak'>Cetak</a> -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning">Data tidak ditemukan.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
