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
</style>

<div>
    <div>
        <br>
        <br>
        <h1 style="margin-left:15px">Selamat Datang Notaris</h1>
        <br>
    </div>
    <div class="layout-px-spacing">
        <div class="d-flex justify-content-left mt-4">
            <div class="col-lg-6">
                @include('inc.other.tracking')
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <!-- Dropdown filter -->
                        <select id="jenisLayananDropdown" style="margin-left:15px">
                            <option value="">Pilih Jenis Layanan</option>
                        </select>
                        <!-- Chart -->
                        <canvas id="chartProsesTerakhir" style="margin-left:15px"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-left mt-4">
        <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center" id="chart">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
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

// script chart dinamis batang proses terakhir
$(document).ready(function(){
        // Fetch data from the endpoint
        $.ajax({
            url: '/get_proses_terakhir',
            type: 'GET',
            dataType: 'json',
            success: function(data){
                console.log(data);
                // Populate the dropdown with unique service types
                var uniqueJenisLayanan = [...new Set(data.map(item => item.jenis_layanan.jenis_layanan))];
                uniqueJenisLayanan.forEach(function(jenis){
                    $('#jenisLayananDropdown').append(new Option(jenis, jenis));
                });

                // Initialize the chart
                var ctx = document.getElementById('chartProsesTerakhir').getContext('2d');
                var chartProsesTerakhir = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [],
                        datasets: [{
                            label: 'Grafik Berkas di Proses Terakhir',
                            data: [],
                            backgroundColor: [],
                            borderColor: [],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Colors for the bars
                var colors = [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ];
                var borderColors = [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ];

                // Update chart based on dropdown selection
                $('#jenisLayananDropdown').on('change', function(){
                    var selectedJenis = $(this).val();
                    if (selectedJenis) {
                        var filteredData = data.filter(item => item.jenis_layanan.jenis_layanan === selectedJenis);
                        var contentKeys = [];
                        var nullOrEmptyCounts = [];

                        filteredData.forEach(function(item){
                            var content = JSON.parse(item.content);
                            var keys = Object.keys(content);
                            for (var i = 1; i < keys.length; i++) {
                                if (content[keys[i]] === null || content[keys[i]] === '') {
                                    var prevKey = keys[i - 1];
                                    var index = contentKeys.indexOf(prevKey);
                                    if (index === -1) {
                                        contentKeys.push(prevKey);
                                        nullOrEmptyCounts.push(1);
                                    } else {
                                        nullOrEmptyCounts[index]++;
                                    }
                                    break;
                                }
                            }
                        });

                        var backgroundColors = [];
                        var borderColorsArray = [];
                        for (var i = 0; i < contentKeys.length; i++) {
                            backgroundColors.push(colors[i % colors.length]);
                            borderColorsArray.push(borderColors[i % borderColors.length]);
                        }

                        chartProsesTerakhir.data.labels = contentKeys;
                        chartProsesTerakhir.data.datasets[0].data = nullOrEmptyCounts;
                        chartProsesTerakhir.data.datasets[0].backgroundColor = backgroundColors;
                        chartProsesTerakhir.data.datasets[0].borderColor = borderColorsArray;
                        chartProsesTerakhir.update();
                    } else {
                        // Reset the chart if no selection
                        chartProsesTerakhir.data.labels = [];
                        chartProsesTerakhir.data.datasets[0].data = [];
                        chartProsesTerakhir.data.datasets[0].backgroundColor = [];
                        chartProsesTerakhir.data.datasets[0].borderColor = [];
                        chartProsesTerakhir.update();
                    }
                });
            }
        });
    });
    $(document).ready(function() {
        $.ajax({
            url: '/get-inputan',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var layananCount = {};

                // Process data and count jenis_layanan_id
                $.each(data, function(key, item) {
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
                var dynamicColors = function() {
                    var r = Math.floor(Math.random() * 255);
                    var g = Math.floor(Math.random() * 255);
                    var b = Math.floor(Math.random() * 255);
                    return "rgba(" + r + "," + g + "," + b + ", 0.7)";
                };

                var backgroundColors = labels.map(function() {
                    return dynamicColors();
                });

                // Create bar chart
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Berkas ',
                            data: counts,
                            backgroundColor: backgroundColors,
                            borderColor: backgroundColors,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                display: true,
                                labels: {
                                    color: 'rgb(255, 99, 132)'
                                }
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Diagram Banyaknya Berkas PerJenis Layanan', // judul chart
                                font: {
                                    size: 18
                                }
                            }
                        }
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Tambahkan log jika ada kesalahan dalam AJAX
            }
        });
    });

//pie chart

$(document).ready(function() {
            $.ajax({
                url: '/getjenisberkas',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var jumlahSertifikat = data.jumlah_sertifikat;
                    var jumlahYasan = data.jumlah_yasan;

                    var options = {
                        series: [jumlahSertifikat, jumlahYasan],
                        chart: {
                            width: 378,
                            type: 'pie',
                        },
                        title: {
                            text: 'Jumlah berdasarkan jenis berkas',
                            align: 'center',
                            margin: 10,
                            offsetX: 0,
                            offsetY: 0,
                            floating: false,
                            style: {
                                fontSize: '15px',
                                fontWeight: 'bold',
                                fontFamily: undefined,
                                color: '#263238'
                            },
                        },
                        legend: {
                            show: true,
                            showForSingleSeries: false,
                            showForNullSeries: true,
                            showForZeroSeries: true,
                            position: 'bottom',
                            horizontalAlign: 'center',
                            floating: false,
                            fontSize: '14px',
                            fontFamily: 'Helvetica, Arial',
                            fontWeight: 400,
                            formatter: undefined,
                            inverseOrder: false,
                            width: undefined,
                            height: undefined,
                            tooltipHoverFormatter: undefined,
                            customLegendItems: [],
                            offsetX: 0,
                            offsetY: 0,
                            labels: {
                                colors: undefined,
                                useSeriesColors: false
                            },
                        },
                        labels: ['Sertifikat', 'Yasan'],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                },
                            }
                        }]
                    };

                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

</script>
@endsection
