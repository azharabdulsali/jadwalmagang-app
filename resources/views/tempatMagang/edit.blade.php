@extends('layouts.main')

@section('container')
    <div class="card" style="align-content: center; max-width: 500px; margin: 0 auto">
        <div class="card-header">
            Edit Data Tempat Magang
        </div>
        <div class="card-body">
            <form action="/tempatMagang/update/{{ $tempatMagang->id }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $tempatMagang->id }}">
                <div class="mb-3">
                    <label for="namaTempat" class="form-label">Nama Tempat</label>
                    <input type="text" class="form-control" id="namaTempat" name="namaTempat"
                        value="{{ $tempatMagang->namaTempat }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        value="{{ $tempatMagang->alamat }}" required>
                </div>
                <div class="mb-3">
                    <label for="kotaKab" class="form-label">Kota / Kabupaten</label>
                    <input type="text" class="form-control" id="kotaKab" name="kotaKab"
                        value="{{ $tempatMagang->kotaKab }}" required>
                </div>
                <div class="mb-3">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi"
                        value="{{ $tempatMagang->provinsi }}" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon"
                        value="{{ $tempatMagang->telepon }}" required>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="/tempatMagang" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
