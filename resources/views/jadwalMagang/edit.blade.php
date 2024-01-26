@extends('layouts.main')

@section('container')

<body>
    <a href="/jadwalMagang"> Kembali</a>

    @foreach($jadwalMagang as $j)
    <form action="/jadwalMagang/update/{{ $j->id }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $j->id }}"> <br/>
        Nama 
        <select name="nim" id="nim">
            @foreach($mahasiswa as $m)
            <option value="{{ $m->nim }}" {{ $j->nim == $m->nim ? 'selected' : '' }}>
                {{ $m->nama }}
            </option>
            @endforeach
        </select> <br/>
        Program Studi 
        <select name="program_studi" id="program_studi">
            @foreach($mahasiswa as $m)
            <option value="{{ $m->prodi_id }}" {{ $j->nim == $m->nim ? 'selected' : '' }}>
                {{ $m->prodi_id }}
            </option>
            @endforeach
        </select> <br/>
        Tanggal Mulai <input type="date" name="jadwalAwal" value="{{ $j->jadwalAwal }}" required="required"> <br/>
        Tanggal Akhir <input type="date" name="jadwalAkhir" value="{{ $j->jadwalAkhir }}" required="required"> <br/>
        Tempat Magang 
        <select name="nama_tempatmagang" id="nama_tempatmagang">
            @foreach($tempatmagang as $t)
                <option value="{{ $t->id }}" {{ $j->idTempatMagang == $t->id ? 'selected' : '' }}>
                    {{ $t->namaTempat }}
                </option>
            @endforeach
        </select> <br/>
        Dosen Pembimbing 
        <select name="nama_dospem" id="nama_dospem">
            @foreach($dospem as $d)
            <option value="{{ $d->nik }}" {{ $j->nik == $d->nik ? 'selected' : '' }}>
                {{ $d->nama }}
            </option>
            @endforeach
        </select>
        <input type="submit" value="Simpan Data">
    </form>
    @endforeach

</body>

@endsection
