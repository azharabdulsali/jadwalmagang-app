@extends('layouts.main')

@section('container')
    <h1>Data {{ $title }}</h1>
    <div class="card card-bordered border-gray-300">
        <div class="card-header px-6">
            <div class="card-title">
                <form action="{{ route('tempatMagang.index') }}" method="get" class="d-flex gap-3">
                    <div>
                        <input type="text" name="search" id="search" placeholder="Cari Tempat Magang"
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
            <div class="d-flex">
                <a href="{{ route('tempatMagang.create') }}" class="btn btn-primary" title="Tambah">
                    <i class="bi bi-plus-lg"></i>Tambah</a>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table table-row-bordered table-hover table-striped align-middle gs-8 mb-0">
                <thead class="text-uppercase fw-bolder align-middle bg-light-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Tempat</th>
                        <th>Alamat</th>
                        <th>Kota / Kabupaten</th>
                        <th>Provinsi</th>
                        <th>Telepon</th>
                        {{-- <th class="text-center">Action</th> --}}
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
                                <a href="{{ route('tempatMagang.edit', $tempatmagang['id']) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('tempatMagang.destroy', $tempatmagang['id']) }}" method="GET"
                                    onsubmit="return confirm('Are you sure?')">
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
                    if (searchQuery.length > 0) {
                        filterTempatMagang(searchQuery);
                    } else {
                        $('.table tbody tr').show();
                    }
                });

                function filterTempatMagang(searchQuery) {
                    $('.table tbody tr').each(function() {
                        let namaTempat = $(this).find('td:nth-child(2)').text().toLowerCase().trim();
                        let alamat = $(this).find('td:nth-child(3)').text().toLowerCase().trim();
                        let matchesNamaTempat = namaTempat.includes(searchQuery);
                        let matchesAlamat = alamat.includes(searchQuery);
                        $(this).toggle(matchesNamaTempat || matchesAlamat);
                    });
                }
            });
        </script>
    @endpush
@endsection
