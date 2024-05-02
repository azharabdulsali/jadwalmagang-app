@extends('layouts.main')

@section('container')
    <div class="card" style="align-content: center; max-width: 500px; margin: 0 auto">
        <div class="card-header">
            Edit Data Jadwal Magang
        </div>
        <div class="card-body">
            @foreach ($jadwalMagang as $j)
                <form action="/jadwalMagang/update/{{ $j->id }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $j->id }}"> <br />
                    <div class="mb-3">
                        <label for="nim" class="form-label">Nama</label>
                        <select name="nim" id="nim" class="form-select">
                            @foreach ($mahasiswa as $m)
                                <option value="{{ $m->nim }}" {{ $j->nim == $m->nim ? 'selected' : '' }}>
                                    {{ $m->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="mb-3">
                    <label for="prodi_id" class="form-label">Program Studi</label>
                    <select name="program_studi" id="program_studi" class="form-select">
                        @foreach ($mahasiswa as $m)
                            <option value="{{ $m->prodi_id }}" {{ $j->nim == $m->nim ? 'selected' : '' }}>
                                {{ $m->prodi_id }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
                    <div class="mb-3">
                        <label for="jadwalAwal" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="jadwalAwal" class="form-control" value="{{ $j->jadwalAwal }}"
                            required="required">
                    </div>
                    <div class="mb-3">
                        <label for="jadwalAkhir" class="form-label">Tanggal Akhir</label>
                        <input type="date" name="jadwalAkhir" class="form-control" value="{{ $j->jadwalAkhir }}"
                            required="required">
                    </div>
                    <div class="mb-3">
                        <label for="nama_tempatmagang" class="form-label">Tempat Magang</label>
                        <select name="nama_tempatmagang" id="nama_tempatmagang" class="form-select">
                            @foreach ($tempatmagang as $t)
                                <option value="{{ $t->id }}" {{ $j->idTempatMagang == $t->id ? 'selected' : '' }}>
                                    {{ $t->namaTempat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_dospem" class="form-label">Dosen Pembimbing</label>
                        <select name="nama_dospem" id="nama_dospem" class="form-select">
                            @foreach ($dospem as $d)
                                <option value="{{ $d->nik }}" {{ $j->nik == $d->nik ? 'selected' : '' }}>
                                    {{ $d->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="/jadwalMagang" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
