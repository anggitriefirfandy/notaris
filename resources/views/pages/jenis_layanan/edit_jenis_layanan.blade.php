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
                    <form action="{{ route('jenis_layanan.update', $jenislayanan->id) }}" method="post" onsubmit="return prepareData(event)">
                        @csrf
                        @method('PUT')
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="jenis_layanan">Nama</label>
                                <input type="text" class="form-control" name="jenis_layanan" value="{{ $jenislayanan['jenis_layanan'] }}">
                                @error('jenis_layanan')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-8">
                                <label for="isi_inputan">Teks Inputan</label>
                                <div id="dynamicInputan">
                                    <!-- Input fields akan ditambahkan di sini oleh JavaScript -->
                                </div>
                                @error('isi_inputan')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
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

        function addInputan(key = '', type = 'text') {
            inputanCount++;
            let newInputan = `
            <div class="input-group mb-3" id="inputan-${inputanCount}">
                <input type="text" class="form-control" name="key[]" placeholder="Tulis inputan" value="${key}">
                <select class="form-control" name="type[]">
                    <option value="text" ${type === 'text' ? 'selected' : ''}>Text</option>
                    <option value="tanggal" ${type === 'tanggal' ? 'selected' : ''}>Tanggal</option>
                    <option value="checkbox" ${type === 'checkbox' ? 'selected' : ''}>Checkbox</option>
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

            // Set inputanData di form
            document.getElementById('inputanData').value = JSON.stringify(inputData);
            console.log(inputData);
            // Submit form
            event.target.submit();
        }

        $(document).ready(function() {
            var isi_inputan = JSON.parse('{!! addslashes($jenislayanan["isi_inputan"]) !!}');

            for (var key in isi_inputan) {
                if (isi_inputan.hasOwnProperty(key)) {
                    var label = key.split('@')[0];
                    var type = key.split('@')[1];
                    addInputan(label, type);
                }
            }
        });
    </script>
@endsection
