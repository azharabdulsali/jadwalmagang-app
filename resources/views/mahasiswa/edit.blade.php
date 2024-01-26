@extends('layouts.main')

@section('container')

<body>
    <a href="/mahasiswa"> Kembali</a>

    @foreach($mahasiswa as $mhs)
    <form action="/mahasiswa/update/{{ $mhs->nim }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="nim" value="{{ $mhs->nim }}"> <br/>
        NIM <input type="text" required="required" name="nim" value="{{ $mhs->nim }}"> <br/>
        Nama <input type="text" required="required" name="nama" value="{{ $mhs->nama }}"> <br/>
        Program Studi
        <select name="prodi_id" required>
            @foreach($prodi as $p)
                <option value="{{ $p->id }}" {{ $mhs->prodi_id == $p->id ? 'selected' : '' }}>
                    {{ $p->nama }}
                </option>
            @endforeach
        </select> <br/>
        Semester <input type="text" required="required" name="semester" value="{{ $mhs->semester }}"> <br/>
        <input type="submit" value="Simpan Data">
    </form>
    @endforeach

</body>

@endsection