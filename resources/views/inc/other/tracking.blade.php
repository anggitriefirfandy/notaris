<div class="card">
    <div class="card-header">
        <form id="tracking-search-form">
            @csrf
            <div class="input-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Cari nama pemilik atau jenis berkas" required>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body" id="tracking-results">
        @include('inc.partial.tracking-results', ['inputan' => $inputan ?? collect() ])
    </div>
</div>
