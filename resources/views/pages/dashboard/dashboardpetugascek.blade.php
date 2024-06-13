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
        <h1 style="margin-left:15px">Selamat Datang Petugas</h1>
        <br>
    </div>
    <div class="layout-px-spacing">
        <div class="col-xl-3 col-lg-6">
            <div class="cards cards-stats mb-4 mb-xl-0">
                <div class="cards-body">
                    <div class="row">
                        <div class="col">

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

                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
