@extends('layouts.main')

@section('container')
    <div class="card" style="align-content: center; max-width: 500px; margin: 0 auto">
        <div class="card-header">
            Tambah Data Jadwal Magang
        </div>
        <div class="card-body">
            <form action="/jadwalMagang/store" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <select name="nama" id="nama" class="form-select">
                        <option value="">--Pilih--</option>
                        @foreach ($mahasiswa as $m)
                            <option value="{{ $m->nim }}">
                                {{ $m->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="mb-3">
                    <label for="prodi_id" class="form-label">Program Studi</label>
                    <select class="form-select" id="prodi_id" name="prodi_id" required>
                        <option value="">Pilih Program Studi</option>
                        <option value="1">Program Studi 1</option>
                        <option value="2">Program Studi 2</option>
                    </select>
                </div> --}}
                <div class="mb-3">
                    <label for="jadwalAwal" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="jadwalAwal" class="form-control" required="required">
                </div>
                <div class="mb-3">
                    <label for="jadwalAkhir" class="form-label">Tanggal Akhir</label>
                    <input type="date" name="jadwalAkhir" class="form-control" required="required">
                </div>
                <div class="mb-3">
                    <label for="nama_tempatmagang" class="form-label">Tempat Magang</label>
                    <select name="nama_tempatmagang" id="nama_tempatmagang" class="form-select">
                        <option value="">--Pilih--</option>
                        @foreach ($tempatmagang as $t)
                            <option value="{{ $t->id }}">
                                {{ $t->namaTempat }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_dospem" class="form-label">Dosen Pembimbing</label>
                    <select name="nama_dospem" id="nama_dospem" class="form-select">
                        <option value="">--Pilih--</option>
                        @foreach ($dospem as $d)
                            <option value="{{ $d->nik }}">
                                {{ $d->nama }} {{ $d->gelarBelakang }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="/jadwalMagang" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
