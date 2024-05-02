@extends('layouts.main')

@section('container')
    <div class="card" style="align-content: center; max-width: 500px; margin: 0 auto">
        <div class="card-header">
            Tambah Data Tempat Magang
        </div>
        <div class="card-body">
            <form action="/tempatMagang/store" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="namaTempat" class="form-label">Nama Tempat</label>
                    <input type="text" class="form-control" id="namaTempat" name="namaTempat" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="kotaKab" class="form-label">Kota / Kabupaten</label>
                    <input type="text" class="form-control" id="kotaKab" name="kotaKab" required>
                </div>
                <div class="mb-3">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="/tempatMagang" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
