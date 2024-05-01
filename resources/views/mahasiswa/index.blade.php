@extends('layouts.main')

@section('container')
    <h1>Data {{ $title }}</h1>
    <div class="card card-bordered border-gray-300">
        <div class="card-header px-6 h-80px">
            <div class="card-title">
                <form action="{{ route('mahasiswa.index') }}" method="get" class="d-flex gap-3">
                    <div>
                        <input type="text" name="search" id="search" placeholder="Cari Mahasiswa"
                            class="form-control form-control-solid border-gray-300">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i>
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <div class="card-toolbar">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-link btn-color-primary" title="Tambah">
                    <i class="bi bi-plus-lg"></i>Tambah</a>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table table-row-bordered table-hover table-striped align-middle gs-8 mb-0">
                <thead class="text-uppercase fw-bolder align-middle bg-light-dark">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Semester</th>
                        {{-- <th class="text-center">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data['nim'] }}</td>
                            <td>{{ $data['nama'] }}</td>
                            <td>{{ $data['prodi'] }}</td>
                            <td>{{ $data['semester'] }}</td>
                            <td class="text-center d-flex gap-2 justify-content-center">
                                <a href="{{ route('mahasiswa.edit', $data->nim) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('mahasiswa.destroy', $data->nim) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#search').on('input', function() {
                    let searchQuery = $(this).val().toLowerCase().trim();
                    if(searchQuery.length > 0){
                        filterMahasiswa(searchQuery);
                    } else {
                        $('.table tbody tr').show();
                    }
                });

                function filterMahasiswa(searchQuery) {
                    $('.table tbody tr').each(function() {
                        let nim = $(this).find('td:nth-child(2)').text().toLowerCase().trim();
                        let nama = $(this).find('td:nth-child(3)').text().toLowerCase().trim();
                        let matches = nim.includes(searchQuery) || nama.includes(searchQuery);
                        $(this).toggle(matches);
                    });
                }
            });
        </script>
    @endpush
@endsection
