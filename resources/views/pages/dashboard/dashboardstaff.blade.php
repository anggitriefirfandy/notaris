@extends('layouts.main')

@section('content')
<div>
    <div>
        <br>
        <br>
        <h1 style="margin-left:15px">Selamat Datang, Staff {{ $user->name }}</h1>
        <br>
    </div>
    <div class="layout-px-spacing">
        <div class="d-flex justify-content-left mt-4">
            <div class="col-lg-6">
            @include('inc.other.tugas', ['tugas' => $tugas])
            </div>
            <div class="col-lg-6">
            @include('inc.other.tracking')
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
    $('#tracking-search-form').on('submit', function(event) {
        event.preventDefault();
        let formData = $(this).serialize();

        console.log("Form submitted");  // Debugging statement

        $.ajax({
            url: "{{ route('tracking.search') }}",
            method: "POST",
            data: formData,
            success: function(data) {
                console.log("AJAX success");  // Debugging statement
                $('#tracking-results').html(data);
            },
            error: function(xhr, status, error) {
                console.error("AJAX error: ", error);  // Debugging statement
            }
        });
    });
});
    </script>
</div>
@endsection
