<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Tombol Pencet</title>
</head>
<body>
    <button id="tombol">Pencet Saya</button>

    <script>
        // Mendengarkan klik pada tombol
        document.getElementById('tombol').addEventListener('click', function() {
            // Kirim permintaan POST ke server saat tombol ditekan
            fetch('{{ route('pencet') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message); // Tampilkan pesan dari server di konsol
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
