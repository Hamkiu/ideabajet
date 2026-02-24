@extends('layout.master')
@section('title', 'Admin Dashboard')
@section('content')
@include('include.error')
@push('styles')

@endpush

    <div class="container-fluid">
        <h4 class="card-title" style="text-align: center;">Senarai Responden 2026</h4>
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="pencadangTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Cadangan</th>
                                    <th>Tarikh Hantar</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pencadang as $item)
                                <tr class="view-detail"
                                    data-id="{{ $item->id }}"
                                    data-nama="{{ $item->nama }}"
                                    data-email="{{ $item->email }}">
                        
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->cadangan }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                    
                        
                                    <td>
                                        <form action="{{ route('admin.delete', $item->id) }}" method="POST" class="d-flex gap-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                    class="btn btn-sm btn-info btn-view"
                                                    data-id="{{ $item->id }}">
                                                View
                                            </button>
                                       
                                            <button class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;"   id="detailModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Butiran Pilihan Pencadang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div id="modalContent"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@push('scripts')
<script>
    $(document).on('click', '.btn-view', function () {

        let id = $(this).data('id');

        var modal = new bootstrap.Modal(document.getElementById('detailModal'));
        modal.show();

        $('#modalContent').html('Loading...');

        $.get("/admin/detail/" + id, function (data) {
            $('#modalContent').html(data);
        });

    });
    
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berjaya!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: true
        });        
    @endif

    $(document).ready(function () {

$('#pencadangTable').DataTable({
    pageLength: 10,
    lengthMenu: [5, 10, 25, 50],
    ordering: true,
    searching: true,
    responsive: true,
    language: {
        search: "Carian:",
        lengthMenu: "Papar _MENU_ rekod",
        info: "Paparan _START_ hingga _END_ daripada _TOTAL_ rekod",
        paginate: {
            previous: "Sebelum",
            next: "Seterusnya"
        }
    }
});

});

</script>

@endpush