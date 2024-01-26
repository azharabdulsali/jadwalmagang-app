@extends('layouts.main')

@section('container')

<h1>Data {{ $title }}</h1>
<a href="/mahasiswa/create">Tambah</a>

<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Semester</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $mahasiswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mahasiswa['nim'] }}</td>
                <td>{{ $mahasiswa['nama'] }}</td>
                <td>{{ $mahasiswa['prodi'] }}</td>
                <td>{{ $mahasiswa['semester'] }}</td>
                <td class="text-center d-flex gap-2 justify-content-center">
                    <a href="/mahasiswa/edit/{{ $mahasiswa->nim }}" class="btn btn-info">Edit</a>
                    <a href="/mahasiswa/delete/{{ $mahasiswa->nim }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection