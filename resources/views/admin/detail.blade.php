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
            <th>Nama Elemen</th>
            <th>Zon</th>
            <th>Lokasi Spesifik</th>
            <th>Cadangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data->elemen2027 as $p)
        <tr>
            <td>{{ $p->no_elemen }}</td>
            <td>{{ $p->nama_elemen }}</td>
            <td>{{ $p->zon }}</td>
            <td>{{ $p->lokasi_spesifik }}</td>
            <td>{{ $p->cadangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>