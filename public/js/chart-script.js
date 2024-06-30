$(document).ready(function () {
    $.ajax({
        url: "/get-inputan",
        type: "GET",
        dataType: "json",
        success: function (data) {
            var layananCount = {};

            // Process data and count jenis_layanan_id
            $.each(data, function (key, item) {
                var jenis_layanan_name = item.jenis_layanan.jenis_layanan; // Mengambil nama jenis layanan dari relasi

                if (layananCount[jenis_layanan_name]) {
                    layananCount[jenis_layanan_name]++;
                } else {
                    layananCount[jenis_layanan_name] = 1;
                }
            });

            // Generate chart data
            var labels = Object.keys(layananCount);
            var counts = Object.values(layananCount);

            // Generate random colors for each bar
            var dynamicColors = function () {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                return "rgba(" + r + "," + g + "," + b + ", 0.7)";
            };

            var backgroundColors = labels.map(function () {
                return dynamicColors();
            });

            // Create bar chart
            var ctx = document.getElementById("myChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: "Jumlah Berkas ",
                            data: counts,
                            backgroundColor: backgroundColors,
                            borderColor: backgroundColors,
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: "rgb(255, 99, 132)",
                            },
                        },
                        title: {
                            display: true,
                            text: "Diagram Banyaknya Jenis Layanan",
                            font: {
                                size: 18,
                            },
                        },
                    },
                },
            });
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText); // Tambahkan log jika ada kesalahan dalam AJAX
        },
    });
});
