<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<h3>Terima kasih, {{ $pencadang->nama }}, kerana menghantar cadangan anda!</h3>

<p>Berikut adalah ringkasan maklumat yang telah diterima:</p>

<ul>
    <li><strong>No. Rujukan:</strong> {{ $pencadang->id }}</li>
    <li><strong>Nama:</strong> {{ $pencadang->nama }}</li>
    <li><strong>Email:</strong> {{ $pencadang->email }}</li>
    <li><strong>Jantina:</strong> {{ $pencadang->jantina }}</li>
    <li><strong>Bangsa:</strong> {{ $pencadang->bangsa }}</li>
    <li><strong>Umur:</strong> {{ $pencadang->umur }}</li>
    <li><strong>Pekerjaan:</strong> {{ $pencadang->pekerjaan }}</li>
    <li><strong>Zon:</strong> {{ $pencadang->zon }}</li>
    <li><strong>Cadangan:</strong> {{ $pencadang->cadangan }}</li>
    <li><strong>Tarikh Hantar:</strong> {{ $pencadang->created_at->format('d/m/Y H:i') }}</li>
</ul>

<h4>Butiran Cadangan Anda:</h4>

<table border="1" cellpadding="5" cellspacing="0" width="100%" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th width="80" style="text-align:center;">No Elemen</th>
            <th>Pilihan</th>
            <th>Lokasi</th>
            <th>Aset (Elemen 5 sahaja)</th>
            <th>Butiran</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pencadang->elemen as $item)
            <tr>
                <td width="80" style="text-align:center;">{{ $item->no_elemen }}</td>
                <td>{{ $item->pilihan }}</td>
                <td>{{ $item->lokasi ?? '-' }}</td>
                <td>{{ $item->aset ?? '-' }}</td>
                <td>{{ $item->butiran }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p>
    <i>
        Maklumat ini akan dikaji untuk pertimbangan dalam bajet {{ now()->year + 1 }}.
    </i>
</p>

<p><b>Sekian, terima kasih.</b></p>
</body>
</html>
