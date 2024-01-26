@extends('layouts.main')

@section('container')

<h1>Data {{ $title }}</h1>
<a href="/jadwalMagang/create" class="btn btn-primary">Tambah</a>
<a href="{{ route('jadwalMagang.print') }}" class="btn btn-success" target="_blank">Print PDF</a>

<form action="{{ url('/jadwalMagang') }}" method="get">
    <div class="mb-3 row">
        <div class="col-md-6">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Nama, Prodi, Tempat Magang, atau Dosen" value="{{ Request::input('search') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="jadwalAwal" class="form-control" value="{{ Request::input('jadwalAwal') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="jadwalAkhir" class="form-control" value="{{ Request::input('jadwalAkhir') }}">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>

@if ($jadwalMagang->isEmpty())
        <p>Data not found.</p>
@else
<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Program Studi</th>
            <th>Jadwal Magang</th>
            <th>Tempat Magang</th>
            <th>Dosen Pembimbing</th>
            <th class="text-center">Action</th>
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
                <td class="text-center d-flex gap-2 justify-content-center">
                    <a href="/jadwalMagang/edit/{{ $jadwalMagang['id'] }}" class="btn btn-info">Edit</a>
                    <a href="/jadwalMagang/delete/{{ $jadwalMagang['id'] }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- {{ $jadwalMagang->links() }} --}}
@endif

@endsection