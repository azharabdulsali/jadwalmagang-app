{{-- @extends('layouts.main') --}}

@section('container')
<link rel="stylesheet" href="/css/style.css">

<h1>Data {{ $title }}</h1>
<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Program Studi</th>
            <th>Jadwal Magang</th>
            <th>Tempat Magang</th>
            <th>Dosen Pembimbing</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jadwalMagang as $jadwalMagang)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jadwalMagang['nama'] }}</td>
                <td>{{ $jadwalMagang['nama_prodi'] }}</td>
                <td>{{ $jadwalMagang['jadwalAwal'] }} - {{ $jadwalMagang['jadwalAkhir'] }}</td>
                <td><?= $jadwalMagang['nama_tempatmagang'] ?></td>
                <td><?= $jadwalMagang['nama_dospem'] ?></td>
            </tr>
        @endforeach
    </tbody>
</table>