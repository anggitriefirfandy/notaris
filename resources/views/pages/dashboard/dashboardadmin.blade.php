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
        <div class="col-xl-3 col-lg-6">
            <div class="cards cards-stats mb-4 mb-xl-0">
                <div class="cards-body">
                    <div class="row">
                        <div class="col">
                            <center>
                                <h5 class="cards-title text-uppercase text-muted mb-0">Jumlah Client</h5>
                            </center>
                            <br>
                            <center>
                                <span class="h6 font-weight-bold mb-0" id="jumlahClient"></span>
                            </center>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center" id="chart">
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            $(document).ready(function() {
            $.ajax({
                url: '/getjumlahclient',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#jumlahClient').text(data.jumlah);
                    // console.log(data);
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
                console.log(data);

                var jumlahSertifikat = data.jumlah_sertifikat;
                var jumlahYasan = data.jumlah_yasan;

                var options = {
                    series: [jumlahSertifikat, jumlahYasan],
                    chart: {
                        width: 600,
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
    </div>
</div>
@endsection
