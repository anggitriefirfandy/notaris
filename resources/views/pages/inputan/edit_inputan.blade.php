@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Inputan</h5>
                </div>
                <div class="card-body">
                    <form id="dynamicForm" action="{{ route('inputan.update', $inputan->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="client">Pilih Client</label>
                            <select class="form-control" id="client" name="input_berkas_id">
                                <option value="" selected>Silahkan pilih Client</option>
                                @foreach($inputBerkass as $inputBerkas)
                                    <option value="{{ $inputBerkas->id }}" {{ $inputan->input_berkas_id == $inputBerkas->id ? 'selected' : '' }} data-content="{{ $inputBerkas->nama_pemilik }}">{{ $inputBerkas->nama_pemilik }}-{{$inputBerkas->jenis_berkas}}-{{$inputBerkas->alamat}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_layanan">Pilih Jenis Layanan</label>
                            <select class="form-control" id="jenis_layanan" name="jenis_layanan_id">
                                <option value="" selected>Silahkan pilih Jenis Layanan</option>
                                @foreach($jenisLayanans as $jenisLayanan)
                                    <option value="{{ $jenisLayanan->id }}" {{ $inputan->jenis_layanan_id == $jenisLayanan->id ? 'selected' : '' }} data-content="{{ $jenisLayanan->isi_inputan }}">{{ $jenisLayanan->jenis_layanan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="dynamicInputs">
                            <!-- Input fields akan ditambahkan di sini -->
                        </div>
                        <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Ketika pilihan jenis layanan berubah
    document.getElementById('jenis_layanan').addEventListener('change', function() {
        var select = document.getElementById('jenis_layanan');
        var selectedOption = select.options[select.selectedIndex];
        var isiInputan = selectedOption.getAttribute('data-content');

        // Ubah isiInputan dari string JSON menjadi objek JavaScript
        var isiInputanObj = JSON.parse(isiInputan);

        // Hapus input fields yang ada sebelumnya
        document.getElementById('dynamicInputs').innerHTML = '';

        // Buat input fields untuk setiap key dalam objek JSON
        Object.keys(isiInputanObj).forEach(function(key) {
            var [fieldName, fieldType] = key.split('@');
            var inputField;

            if (fieldType === 'text') {
                inputField = document.createElement('input');
                inputField.setAttribute('type', 'text');
                inputField.setAttribute('class', 'form-control mb-2');
            } else if (fieldType === 'tanggal') {
                inputField = document.createElement('input');
                inputField.setAttribute('type', 'date');
                inputField.setAttribute('class', 'form-control mb-2');
            } else if (fieldType === 'checkbox') {
                inputField = document.createElement('input');
                inputField.setAttribute('type', 'checkbox');
                inputField.setAttribute('class', 'form-check-input large-checkbox ');
            }

            inputField.setAttribute('name', fieldName);
            inputField.setAttribute('placeholder', fieldName);

            var label = document.createElement('label');
            label.textContent = fieldName;

            var div = document.createElement('div');
            div.classList.add('form-group');

            if (fieldType === 'checkbox') {
                var checkboxDiv = document.createElement('div');
                checkboxDiv.classList.add('form-check');
                checkboxDiv.classList.add('checkboxstyle');
                div.appendChild(label);
                checkboxDiv.appendChild(inputField);
                div.appendChild(checkboxDiv);
            } else {
                div.appendChild(label);
                div.appendChild(inputField);
            }

            document.getElementById('dynamicInputs').appendChild(div);
        });
    });

    // Menangani submit form
    document.getElementById('dynamicForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Mengambil nilai dari setiap input field
        var inputs = document.querySelectorAll('#dynamicInputs input');
        var formData = {};

        inputs.forEach(function(input) {
            var inputType = input.getAttribute('type');
            var inputValue;

            if (inputType === 'checkbox') {
                inputValue = input.checked ? 'checked' : 'unchecked';
            } else {
                inputValue = input.value;
            }

            formData[input.getAttribute('name')] = inputValue;
        });

        // Mengubah objek menjadi JSON
        var jsonData = JSON.stringify(formData);

        // Membuat input hidden untuk menyimpan JSON data
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'content');
        hiddenInput.setAttribute('value', jsonData);
        document.getElementById('dynamicForm').appendChild(hiddenInput);

        // Submit form
        this.submit();
    });
</script>

<style>
    .large-checkbox {
        width: 30px;
        height: 30px;
    }
    .form-check-input {
        margin-left: 0;
        margin-top: 0px; /* Menambahkan margin di atas checkbox */
    }
</style>
@endsection
