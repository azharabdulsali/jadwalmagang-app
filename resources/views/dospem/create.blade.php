@extends('layouts.main')

@section('container')
    <div class="card" style="align-content: center; max-width: 500px; margin: 0 auto">
        <div class="card-header">
            Tambah Data Pembimbing
        </div>
        <div class="card-body">
            <form action="/dospem/store" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="gelarDepan" class="form-label">Gelar Depan (Optional)</label>
                    <input type="text" class="form-control" id="gelarDepan" name="gelarDepan">
                </div>
                <div class="mb-3">
                    <label for="gelarBelakang" class="form-label">Gelar Belakang</label>
                    <input type="text" class="form-control" id="gelarBelakang" name="gelarBelakang" required>
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
                <div class="d-flex justify-content-end gap-2">
                    <a href="/dospem" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
