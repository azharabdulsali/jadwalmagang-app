@extends('layouts.main')

@section('container')
    <div class="card" style="align-content: center; max-width: 500px; margin: 0 auto">
        <div class="card-header">
            Edit Data Pembimbing
        </div>
        <div class="card-body">
            @foreach ($dospem as $d)
                <form action="/dospem/update/{{ $d->nik }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="nik" value="{{ $d->nik }}">
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $d->nik }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $d->nama }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="gelarDepan" class="form-label">Gelar Depan</label>
                        <input type="text" class="form-control" id="gelarDepan" name="gelarDepan"
                            value="{{ $d->gelarDepan }}">
                    </div>
                    <div class="mb-3">
                        <label for="gelarBelakang" class="form-label">Gelar Belakang</label>
                        <input type="text" class="form-control" id="gelarBelakang" name="gelarBelakang"
                            value="{{ $d->gelarBelakang }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="prodi_id" class="form-label">Program Studi</label>
                        <select class="form-select" id="prodi_id" name="prodi_id" required>
                            @foreach ($prodi as $p)
                                <option value="{{ $p->id }}" {{ $d->prodi_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="/dospem" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
