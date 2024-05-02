@extends('layouts.main')

@section('container')
    <h1>Data {{ $title }}</h1>

    <div class="card card-bordered border-gray-300">
        <div class="card-header px-6">
            <div class="card-title">
                <form action="{{ url('/jadwalMagang') }}" method="get" class="d-flex gap-3">
                    <div>
                        <input type="text" name="search" placeholder="Cari Jadwal Magang"
                            class="form-control form-control-solid border-gray-300">
                    </div>
                    <div>
                        <input type="date" name="jadwalAwal" class="form-control" value="{{ Request::input('jadwalAwal') }}">
                    </div>
                    <div>
                        <input type="date" name="jadwalAkhir" class="form-control" value="{{ Request::input('jadwalAkhir') }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i>
                            Search
                        </button>
                    </div>
                </form>
            </div>
            <div class="d-flex align-items-end">
                <a href="/jadwalMagang/create" class="btn btn-primary" title="Tambah">
                    <i class="bi bi-plus-lg"></i>Tambah</a>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table table-row-bordered table-hover table-striped align-middle gs-8 mb-0">
                <thead class="text-uppercase fw-bolder align-middle bg-light-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Program Studi</th>
                        <th>Jadwal Magang</th>
                        <th>Tempat Magang</th>
                        <th>Dosen Pembimbing</th>
                        {{-- <th class="text-center">Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwalMagang as $jadwal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jadwal['nama'] }}</td>
                            <td>{{ $jadwal['nama_prodi'] }}</td>
                            <td>{{ $jadwal['jadwalAwal'] }} - {{ $jadwal['jadwalAkhir'] }}</td>
                            <td>{{ $jadwal['nama_tempatmagang'] }}</td>
                            <td>{{ $jadwal['nama_dospem'] }}</td>
                            <td class="text-center d-flex gap-2 justify-content-center">
                                <a href="/jadwalMagang/edit/{{ $jadwal['id'] }}" class="btn btn-info">Edit</a>
                                <a href="/jadwalMagang/delete/{{ $jadwal['id'] }}"
                                    onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
