@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Pengaturan Lokasi</h1>
    <form action="{{ route('location.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $location->latitude ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $location->longitude ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="radius">Radius (dalam meter)</label>
            <input type="number" class="form-control" id="radius" name="radius" value="{{ $location->radius ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" id="refresh-button">Refresh</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function updateLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                }, function(error) {
                    console.log("Error getting location: " + error.message);
                });
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }

        // Update location when the page loads
        updateLocation();

        // Update location when the refresh button is clicked
        document.getElementById('refresh-button').addEventListener('click', updateLocation);
    });
</script>
@endsection
