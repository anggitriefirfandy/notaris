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
        <div class="d-flex justify-content-between">
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
