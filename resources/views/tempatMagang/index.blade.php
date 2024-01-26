@extends('layouts.main')

@section('container')

<h1>Data {{ $title }}</h1>
<a href="/tempatMagang/create">Tambah</a>

<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Tempat</th>
            <th>Alamat</th>
            <th>Kota / Kabupaten</th>
            <th>Provinsi</th>
            <th>Telepon</th>
            <th class="text-center">Action</th>
            </tr>
    </thead>
    <tbody>
        @foreach ($tempatMagang as $tempatmagang)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tempatmagang['namaTempat'] }}</td>
                <td>{{ $tempatmagang['alamat'] }}</td>
                <td>{{ $tempatmagang['kotaKab'] }}</td>
                <td>{{ $tempatmagang['provinsi'] }}</td>
                <td>{{ $tempatmagang['telepon'] }}</td>
                <td class="text-center d-flex gap-2 justify-content-center">
                    <a href="/tempatMagang/edit/{{ $tempatmagang['id'] }}"  class="btn btn-info">Edit</a>
                    <a href="/tempatMagang/delete/{{ $tempatmagang['id'] }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

@endsection