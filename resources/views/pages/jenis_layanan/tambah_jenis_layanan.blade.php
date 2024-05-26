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
                    <form action="{{ route('jenis_layanan.store') }}" method="post" onsubmit="return prepareData(event)">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="jenis_layanan">Nama</label>
                                <input type="text" class="form-control" name="jenis_layanan">
                                @error('jenis_layanan')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-8">
                                <label for="isi_inputan">Teks Inputan</label>
                                <div id="dynamicInputan">
                                    <div class="input-group mb-3" id="inputan-0">
                                        <input type="text" class="form-control" name="key[]" placeholder="Tulis Inputan">
                                        <select class="form-control" name="type[]">
                                            <option value="text">Text</option>
                                            <option value="tanggal">Tanggal</option>
                                            <option value="checkbox">Checkbox</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" onclick="addInputan()">Tambah</button>
                                        </div>
                                    </div>
                                    @error('isi_inputan')
                                    <div class="error" style="color: red; display:block;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                            </div>
                        </div>
                        <input type="hidden" id="inputanData" name="inputanData">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    let inputanCount = 0;

    function addInputan() {
        inputanCount++;
        let newInputan = `
        <div class="input-group mb-3" id="inputan-${inputanCount}">
            <input type="text" class="form-control" name="key[]" placeholder="Tulis inputan">
            <select class="form-control" name="type[]">
                <option value="text">Text</option>
                <option value="tanggal">Tanggal</option>
                <option value="checkbox">Checkbox</option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="removeInputan(${inputanCount})">Hapus</button>
            </div>
        </div>
        `;
        document.getElementById('dynamicInputan').insertAdjacentHTML('beforeend', newInputan);
    }

    function removeInputan(inputanIndex) {
        document.getElementById(`inputan-${inputanIndex}`).remove();
    }

    function prepareData(event) {
        event.preventDefault();
        let inputDivs = document.querySelectorAll('#dynamicInputan .input-group');
        let inputData = [];

        inputDivs.forEach(function(inputDiv, index) {
            let keyInput = inputDiv.querySelector('input[name="key[]"]').value;
            let typeSelect = inputDiv.querySelector('select[name="type[]"]').value;
            inputData.push({
                name: keyInput,
                type: typeSelect
            });
        });

        // Hilangkan sorting, biarkan urut sesuai inputan
        // inputData.sort((a, b) => a.name.localeCompare(b.name, 'en', { numeric: true }));

        // Set inputanData di form
        document.getElementById('inputanData').value = JSON.stringify(inputData);
        console.log(inputData);
        // Submit form
        event.target.submit();
    }
</script>
@endsection
