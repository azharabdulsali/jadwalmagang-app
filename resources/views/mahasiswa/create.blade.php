@extends('layouts.main')

@section('container')
    <div class="card">
        <div class="card-header">
            Tambah Data Mahasiswa
        </div>
        <div class="card-body">
            <form action="/mahasiswa/store" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="prodi_id" class="form-label">Program Studi</label>
                    <select class="form-select" id="prodi_id" name="prodi_id" required>
                        <option value="">Pilih Program Studi</option>
                        @foreach ($prodi as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input type="text" class="form-control" id="semester" name="semester" required>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="/mahasiswa" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
