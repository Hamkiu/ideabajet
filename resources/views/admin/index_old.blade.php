@extends('layout.master')
@section('title', 'Admin Dashboard')
@section('content')
@include('include.error')
@push('styles')
<style>
        .highcharts-figure,
        .highcharts-data-table table {
            width: 100%;
            margin: 0;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;body {
        font-family:
            -apple-system,
            BlinkMacSystemFont,
            "Segoe UI",
            Roboto,
            Helvetica,
            Arial,
            "Apple Color Emoji",
            "Segoe UI Emoji",
            "Segoe UI Symbol",
            sans-serif;
        background: var(--highcharts-background-color);
        color: var(--highcharts-neutral-color-100);
    }

    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid var(--highcharts-neutral-color-10, #e6e6e6);
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: var(--highcharts-neutral-color-60, #666);
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tbody tr:nth-child(even) {
        background: var(--highcharts-neutral-color-3, #f7f7f7);
    }

    .highcharts-description {
        margin: 0.3rem 10px;
    }

</style>
@endpush

            <div class="container-fluid">
                <h4 class="card-title" style="text-align: center;">Statistik Belanjawan 2027</h4>
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="card-group">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-danger">
                                        <i class="ti-user text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Jumlah Responden
                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light">{{ $pencadang }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg btn-info">
                                        <i class="ti-drupal text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Jumlah Lelaki

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light">{{ $lelaki }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-success">
                                        <i class="ti-heart-broken text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Jumlah Perempuan

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light">{{ $perempuan }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-warning">
                                        <i class="mdi mdi-ghost text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Jumlah Cadangan

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light">{{ $cadangan }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Column -->


                </div>
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
                <!-- ============================================================== -->

                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                PEKERJAAN / BANGSA
                            </div>
                            <div class="card-body">
                                <div id="pbChart" style="width:100%; height:450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                ELEMEN 1: IPOH BANDAR TERBERSIH
                            </div>
                            <div class="card-body">
                                <div id="elemen1Chart" style="width:100%; height:450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                ELEMEN 2: KEMUDAHAN AWAM DAN TAMAN
                            </div>
                            <div class="card-body">
                                <div id="elemen2Chart" style="width:100%; height:450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                ELEMEN 3: KEMUDAHAN INFRASTRUKTUR
                            </div>
                            <div class="card-body">
                                <div id="elemen3Chart" style="width:100%; height:450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                ELEMEN 4: BANGUNAN DAN HARTANAH MAJLIS
                            </div>
                            <div class="card-body">
                                <div id="elemen4Chart" style="width:100%; height:450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                ELEMEN 5: HARTA DAN MODAL (ASET)
                            </div>
                            <div class="card-body">
                                <div id="elemen5Chart" style="width:100%; height:450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                ELEMEN 6: IPOH BANDAR (BANDAR PINTAR)
                            </div>
                            <div class="card-body">
                                <div id="elemen6Chart" style="width:100%; height:450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                ELEMEN 7: IPOH BANDAR (BANDAR RENDAH KARBON)
                            </div>
                            <div class="card-body">
                                <div id="elemen7Chart" style="width:100%; height:450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                ELEMEN 8: PEMBANGUNAN EKONOMI MASYARAKAT DAN PELANCONGAN
                            </div>
                            <div class="card-body">
                                <div id="elemen8Chart" style="width:100%; height:450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')
<script>
    window.chartData = {
        lokasi1: @json($lokasi1),
        series1: @json($series1),
        lokasi2: @json($lokasi2),
        series2: @json($series2),
        lokasi3: @json($lokasi3),
        series3: @json($series3),
        lokasi4: @json($lokasi4),
        series4: @json($series4),
        main: @json($mainSeries),
        drill: @json($drilldownSeries),
        lokasi6: @json($lokasi6),
        series6: @json($series6),
        lokasi7: @json($lokasi7),
        series7: @json($series7),
        lokasi8: @json($lokasi8),
        series8: @json($series8),
        seriesPb: @json($seriesPb),
        pekerjaanList: @json($pekerjaanList),
        bangsaList: @json($bangsaList)
    };
</script>

<script src="{{ asset('template/js/custom-highchart.js') }}"></script>

@endpush