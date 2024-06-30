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
        <h1 style="margin-left:15px">Selamat Datang Admin</h1>
        <br>
    </div>

    <div class="layout-px-spacing">
        <div class="row">

            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="cards cards-stats">
                    <div style="background-color: Aqua;" class="cards-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-left">
                                <span style="color: black;" class="h2 font-weight-bold mb-0" id="jumlahClient"></span>
                                <br>
                                <h5 style="color: black;" class="cards-title text-uppercase  mb-0">Klien</h5>
                            </div>
                            <div class="text-right">
                                <img src="https://res.cloudinary.com/dk55ik2ah/image/upload/v1718680337/client_i2vvqn.png" alt="" style="width: 50px; height: 50px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <!-- Card 1 -->
                <div class="cards cards-stats">
                    <div style="background-color: LightBlue;" class="cards-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-left">
                                <span style="color: black;" class="h2 font-weight-bold mb-0" id="jumlahLayanan"></span>
                                <br>
                                <h5 style="color: black;" class="cards-title text-uppercase  mb-0">Layanan</h5>
                            </div>
                            <div class="text-right">
                                <img src="https://res.cloudinary.com/dk55ik2ah/image/upload/v1718682422/list_wgpsrp.png" alt="" style="width:50px; height: 50px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <!-- Card 2 -->
                <div class="cards cards-stats">
                    <div style="background-color: LightCoral;" class="cards-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-left">
                                <span style="color: black;" class="h2 font-weight-bold mb-0" id="jumlahAgenda"></span>
                                <br>
                                <h5 style="color: black;" class="cards-title text-uppercase  mb-0">Agenda</h5>
                            </div>
                            <div class="text-right">
                                <img src="https://res.cloudinary.com/dk55ik2ah/image/upload/v1718683011/license_q5ekqj.png" alt="" style="width:50px; height: 50px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <!-- Card 3 -->
                <div class="cards cards-stats">
                    <div style="background-color: LightGreen;" class="cards-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-left">
                                <span style="color: black;" class="h2 font-weight-bold mb-0" id="jumlahStaff"></span>
                                <br>
                                <h5 style="color: black;" class="cards-title text-uppercase  mb-0">Staff</h5>
                            </div>
                            <div class="text-right">
                            <img src="https://res.cloudinary.com/dk55ik2ah/image/upload/v1718683404/team_fauexe.png" alt="" style="width:50px; height: 50px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <br>
        <br>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/getjumlahclient',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#jumlahClient').text(data.jumlah);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                url: '/getjenislayanan',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#jumlahLayanan').text(data.jumlah);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                url: '/getjumlahagenda',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#jumlahAgenda').text(data.jumlah);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                url: '/getjumlahstaff',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#jumlahStaff').text(data.jumlah);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

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
                                text: 'Diagram Banyaknya Jenis Layanan', // judul chart
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
    </script>
</div>
@endsection
