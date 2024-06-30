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

    /* CSS untuk status sejajar */
    .status-badge {
        display: inline-block;
        width: 70px; /* Sesuaikan dengan lebar yang diinginkan */
        text-align: center;
    }

    /* CSS untuk sejajarkan content_tugas dan status */
    .list-group-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .list-group-item .content-tugas {
        flex: 1;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
<div>
    <div>
        <br>
        <br>
        <h1 style="margin-left:15px">Selamat Datang, Petugas {{ $user->name }}</h1>
        <br>
    </div>
    <div class="layout-px-spacing">
        <div class="col-lg-6">
            <div class="cards cards-stats mb-4 mb-xl-0">
                <div class="cards-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="cards-title">Daftar Tugas</h5>
                            <ul class="list-group">
                                @foreach($tugas as $tugasItem)
                                <li class="list-group-item">
                                    <span class="content-tugas">{{ Str::limit($tugasItem->content_tugas, 25, '...') }}</span>
                                    <span class="status-badge">
                                        @if($tugasItem->status == 0)
                                            <span class="badge badge-danger">Proses</span>
                                        @else
                                            <span class="badge badge-info">Selesai</span>
                                        @endif
                                    </span>
                                    <div>
                                        <!-- Tombol Detail -->
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal{{ $tugasItem->id }}">Detail</button>

                                        <!-- Tombol Selesai -->
                                        <form action="{{ route('tugas.selesai', $tugasItem->id) }}" method="post" style="display:inline-block;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                        </form>
                                    </div>
                                </li>

                                <!-- Modal Detail -->
                                <div class="modal fade" id="detailModal{{ $tugasItem->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $tugasItem->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailModalLabel{{ $tugasItem->id }}">Detail Tugas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Nama Tugas:</strong> {{ $tugasItem->content_tugas }}</p>
                                                <p><strong>Deskripsi:</strong> {{ $tugasItem->deskripsi }}</p>
                                                <p><strong>Status:</strong>
                                                    @if($tugasItem->status == 0)
                                                        Proses
                                                    @else
                                                        Selesai
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
