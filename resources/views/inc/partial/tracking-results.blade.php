<!-- resources/views/partials/tracking-results.blade.php -->

@if($inputan->count() > 0)
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Layanan</th>
                <!-- <th>Tanggal Masuk</th> -->
                <th>Status</th>
                <!-- <th>Proses Terakhir</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($inputan as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->nama_pemilik ?? 'Tidak Diketahui' }} - {{ $value->jenis_berkas ?? 'Tidak Diketahui' }}</td>
                    <td>{{ $value->jenis_layanan ?? 'Tidak Diketahui' }}</td>
                    <!-- <td>{{ \Carbon\Carbon::parse($value->tanggal_masuk)->isoFormat('D MMMM Y') }}</td> -->
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
                    <!-- <td>
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
                    </td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-warning">Data tidak ditemukan.</div>
@endif
