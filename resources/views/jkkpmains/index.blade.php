@extends('layout.master')
@section('title', 'Senarai JKKP')
@section('content')
<div class="card">
    <header class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title mb-0">Senarai JKKP</h5>
    
        <a href="{{ route('jkkpmains.create') }}" class="btn waves-effect waves-light btn-primary btn-circle">
            <i class="fas fa-plus"></i>
        </a>
    </header>
    
    <div class="card-body">
        {{-- <h4 class="card-title">Special title treatment</h4> --}}
        <div class="table-responsive">
            <table id="list_jkkpmains" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Laporan</th>
                        <th>No Pekerja</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>Peringkat</th>
                        <th>Tarikh Terima</th>
                        <th>Tarikh Kemaskini</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berjaya!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: true
        });        
    @endif

    $(function () {
        $('#list_jkkpmains').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                type: 'POST',
                url: "{{ route('jkkpmains.list') }}",
                data: function (d) {
                    d._token = "{{ csrf_token() }}";
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', width: '3%'},
                { data: 'id', name: 'id', width: '3%'},
                { data: 'id_terlibat', name: 'id_terlibat', width: '3%'},
                { data: 'nama_terlibat', name: 'nama_terlibat' },
                { data: 'jabatan', name: 'jabatan' },
                { data: 'status', name: 'status', className: 'text-center'},
                { data: 'peringkat', name: 'peringkat', className: 'text-center'},
                { data: 'tarikh_terima', name: 'tarikh_terima' },
                { data: 'tarikh_kemaskini', name: 'tarikh_kemaskini' },
                { data: 'tindakan', name: 'tindakan', searchable: false, orderable: false },
            ],
            "lengthMenu": [
                [25, 50, 75, -1],
                [25, 50, 75, "All"]
            ],
            "pageLength": 25
        });
    });
</script>
@endpush