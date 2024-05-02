@extends('layouts.main')

@section('container')
    <div class="card" style="align-content: center; max-width: 500px; margin: 0 auto">
        <div class="card-header">
            Edit Data Mahasiswa
        </div>
        <div class="card-body">
            @foreach ($mahasiswa as $mhs)
                <form action="/mahasiswa/update/{{ $mhs->nim }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="nim" value="{{ $mhs->nim }}">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="{{ $mhs->nim }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $mhs->nama }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="prodi_id" class="form-label">Program Studi</label>
                        <select class="form-select" id="prodi_id" name="prodi_id" required>
                            @foreach ($prodi as $p)
                                <option value="{{ $p->id }}" {{ $mhs->prodi_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester</label>
                        <input type="number" min="1" max="8" class="form-control" id="semester"
                            name="semester" value="{{ $mhs->semester }}" required>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="/mahasiswa" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
