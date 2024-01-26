@extends('layouts.main')

@section('container')

<h1>Data {{ $title }}</h1>
<a href="/dospem/create">Tambah</a>

<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Gelar Depan</th>
            <th>Gelar Belakang</th>
            <th>Program Studi</th>
            <th class="text-center">Action</th>
            </tr>
    </thead>
    <tbody>
        @foreach ($dospem as $dospem)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dospem['nik'] }}</td>
                <td>{{ $dospem['nama'] }}</td>
                <td>{{ $dospem['gelarDepan'] }}</td>
                <td>{{ $dospem['gelarBelakang'] }}</td>
                <td>{{ $dospem['prodi'] }}</td>
                <td class="text-center d-flex gap-2 justify-content-center">
                    <a href="/dospem/edit/{{ $dospem->nik }}" class="btn btn-info">Edit</a>
                    <a href="/dospem/delete/{{ $dospem->nik }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection