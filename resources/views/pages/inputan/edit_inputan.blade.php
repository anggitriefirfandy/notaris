@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5>Edit Inputan</h5>
                    </div>
                    <div>
                        <a href="{{route('inputan.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="dynamicForm" action="{{ route('inputan.update', $inputan->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="client">Pilih Client</label>
                            <select class="form-control" id="client" name="input_berkas_id">
                                <option value="" selected>Silahkan pilih Client</option>
                                @foreach($inputBerkass as $inputBerkas)
                                    <option value="{{ $inputBerkas->id }}" data-content="{{ $inputBerkas->nama_pemilik }}" {{ $inputan->input_berkas_id == $inputBerkas->id ? 'selected' : '' }}>
                                        {{ $inputBerkas->nama_pemilik }}-{{$inputBerkas->jenis_berkas}}-{{$inputBerkas->alamat}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_layanan">Pilih Jenis Layanan</label>
                            <select class="form-control" id="jenis_layanan" name="jenis_layanan_id">
                                <option value="" selected>Silahkan pilih Jenis Layanan</option>
                                @foreach($jenisLayanans as $jenisLayanan)
                                    <option value="{{ $jenisLayanan->id }}" data-content="{{ $jenisLayanan->isi_inputan }}" {{ $inputan->jenis_layanan_id == $jenisLayanan->id ? 'selected' : '' }}>
                                        {{ $jenisLayanan->jenis_layanan }}
                                    </option>
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
    document.addEventListener('DOMContentLoaded', function() {
        var selectedOption = document.querySelector('#jenis_layanan option:checked');
        if (selectedOption) {
            var isiInputan = selectedOption.getAttribute('data-content');
            var isiInputanObj = JSON.parse(isiInputan);
            var content = JSON.parse('{!! $inputan->content !!}');
            renderDynamicInputs(isiInputanObj, content);
        }

        document.getElementById('jenis_layanan').addEventListener('change', function() {
            var select = document.getElementById('jenis_layanan');
            var selectedOption = select.options[select.selectedIndex];
            var isiInputan = selectedOption.getAttribute('data-content');
            var isiInputanObj = JSON.parse(isiInputan);
            renderDynamicInputs(isiInputanObj, {});
        });
    });

    function renderDynamicInputs(isiInputanObj, content) {
        document.getElementById('dynamicInputs').innerHTML = '';
        var inputElements = [];

        Object.keys(isiInputanObj).forEach(function(key, index) {
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
                inputField.setAttribute('class', 'form-check-input large-checkbox');
                if (content[fieldName] === 'checked') {
                    inputField.checked = true;
                }
            }

            inputField.setAttribute('name', fieldName);
            inputField.setAttribute('placeholder', fieldName);
            if (content[fieldName] && fieldType !== 'checkbox') {
                inputField.value = content[fieldName];
            }

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
            inputElements.push(inputField);
        });

        // Add event listeners for sequential enable
        inputElements.forEach((input, index) => {
            if (index > 0) {
                input.disabled = true;
            }
            input.addEventListener('input', () => {
                if (isInputValid(input)) {
                    if (index < inputElements.length - 1) {
                        inputElements[index + 1].disabled = false;
                    }
                } else {
                    for (let i = index + 1; i < inputElements.length; i++) {
                        inputElements[i].disabled = true;
                    }
                }
            });
        });

        // Initially enable the first input
        if (inputElements.length > 0) {
            inputElements[0].disabled = false;
        }
    }

    function isInputValid(input) {
        if (input.type === 'checkbox') {
            return input.checked;
        } else {
            return input.value.trim() !== '';
        }
    }

    document.getElementById('dynamicForm').addEventListener('submit', function(event) {
        event.preventDefault();

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

        var jsonData = JSON.stringify(formData);

        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'content');
        hiddenInput.setAttribute('value', jsonData);
        document.getElementById('dynamicForm').appendChild(hiddenInput);

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
        margin-top: 0px;
    }
    .form-check {
        margin-top: 0px;
    }
    .checkboxstyle {
        margin-bottom: 40px;
    }
</style>

@endsection
