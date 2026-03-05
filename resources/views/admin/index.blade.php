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

    #accordionElemen .card-header{
    font-size:16px;
    }

    #accordionElemen .card-header:hover{
        background:#0d6efd;
        color:white;
    }

    .badge{
        font-size:13px;
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
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        PEKERJAAN / BANGSA
                    </div>
                    <div class="card-body">
                        <div id="pbChart" style="width:100%; height:450px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        BILANGAN ELEMEN
                    </div>
                    <div class="card-body">
                        <div id="elemenChart" style="width:100%; height:450px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
        
                <div class="card">
                    <div class="card-header">
                        SENARAI CADANGAN MENGIKUT ELEMEN
                    </div>
        
                    <div class="card-body">
        
                        <div id="accordionElemen">
        
                            @foreach($list_elemen->groupBy('nama_elemen') as $elemen => $rows)
        
                            <div class="card mb-2">
        
                                <div class="card-header bg-info text-white"
                                     data-toggle="collapse"
                                     data-target="#elemen{{ $loop->index }}"
                                     style="cursor:pointer">
        
                                    <strong>{{ $elemen }}</strong>
        
                                    <span class="badge badge-light ml-2">
                                        {{ $rows->count() }} cadangan
                                    </span>
        
                                </div>
        
                                <div id="elemen{{ $loop->index }}"
                                     class="collapse {{ $loop->first ? 'show' : '' }}"
                                     data-parent="#accordionElemen">
        
                                    <div class="card-body">
        
                                        <div class="table-responsive">
        
                                            <table class="table table-bordered table-striped">
        
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th style="width:20%">Zon</th>
                                                        <th style="width:30%">Lokasi Spesifik</th>
                                                        <th>Cadangan</th>
                                                    </tr>
                                                </thead>
        
                                                <tbody>
        
                                                @foreach($rows as $row)
                                                    <tr>
                                                        <td>{{ $row->zon }}</td>
                                                        <td>{{ $row->lokasi_spesifik }}</td>
                                                        <td>{{ $row->cadangan }}</td>
                                                    </tr>
                                                @endforeach
        
                                                </tbody>
        
                                            </table>
        
                                        </div>
        
                                    </div>
        
                                </div>
        
                            </div>
        
                            @endforeach
        
                        </div>
        
                    </div>
                </div>
        
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    window.chartData = {
        seriesPb: @json($seriesPb),
        seriesElemen: @json($seriesElemen),
        categories: @json($categories),
        pekerjaanList: @json($pekerjaanList),
        bangsaList: @json($bangsaList)
    };

    var table = $('#cadanganTable').DataTable({

        responsive: true,
        pageLength: 10,
        autoWidth: false,

        columnDefs: [
            { targets: 0, visible: false }
        ],

        order: [[0, 'asc']],

        drawCallback: function(settings){

            var api = this.api();
            var rows = api.rows({page:'current'}).nodes();
            var last = null;

            api.column(0,{page:'current'}).data().each(function(group,i){

                if(last !== group){

                    $(rows).eq(i).before(
                        '<tr class="group"><td colspan="4">'+group+'</td></tr>'
                    );

                    last = group;
                }

            });

        }

    });
</script>

<script src="{{ asset('template/js/custom-highchart.js') }}"></script>
@endpush