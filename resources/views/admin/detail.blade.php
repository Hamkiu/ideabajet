<h5>{{ $data->nama }}</h5>
<p>Email: {{ $data->email }}</p>
<p>Pekerjaan: {{ $data->pekerjaan }}</p>
<p>Bangsa: {{ $data->bangsa }}</p>
<p>Umur: {{ $data->umur }}</p>
<hr>
<div class="table-responsive">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No Elemen</th>
            <th>Pilihan</th>
            <th>Lokasi</th>
            <th>Aset</th>
            <th>Butiran</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data->elemen as $p)
        <tr>
            <td>{{ $p->no_elemen }}</td>
            <td>{{ $p->pilihan }}</td>
            <td>{{ $p->lokasi }}</td>
            <td>{{ $p->aset }}</td>
            <td>{{ $p->butiran }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>