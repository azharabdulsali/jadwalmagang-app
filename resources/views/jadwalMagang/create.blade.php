@extends('layouts.main')

@section('container')

<h1>{{ $title }}</h1>

<body>
    <a href="/jadwalMagang"> Kembali</a>

    <form action="/jadwalMagang/store" method="post">
        {{ csrf_field() }}
        Nama 
        <select name="nama" id="nama">
            <option value="">--Pilih--</option>
            @foreach($mahasiswa as $m)
                <option value="{{ $m->nim }}">
                    {{ $m->nama }}
                </option>
            @endforeach
        </select> <br/>
        Program Studi // sesuai mahasiswa yang dipilih <br/>
        Tanggal Mulai <input type="date" name="jadwalAwal" required="required"> <br/>
        Tanggal Akhir <input type="date" name="jadwalAkhir" required="required"> <br/>
        Tempat Magang 
        <select name="nama_tempatmagang" id="nama_tempatmagang">
            <option value="">--Pilih--</option>
            @foreach($tempatmagang as $t)
                <option value="{{ $t->id }}">
                    {{ $t->namaTempat }}
                </option>
            @endforeach
        </select> <br/>
        Dosen Pembimbing 
        <select name="nama_dospem" id="nama_dospem">
            <option value="">--Pilih--</option>
            @foreach($dospem as $d)
                <option value="{{ $d->nik }}">
                    {{ $d->nama }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Simpan Data">
    </form>
</body>

@endsection