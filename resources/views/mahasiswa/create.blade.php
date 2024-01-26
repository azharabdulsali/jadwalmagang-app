@extends('layouts.main')

@section('container')

<body>
    <a href="/mahasiswa"> Kembali</a>

    <form action="/mahasiswa/store" method="post">
        {{ csrf_field() }}
        NIM <input type="text" name="nim" required="required"> <br/>
        Nama <input type="text" name="nama" required="required"> <br/>
        Program Studi
        <select name="prodi_id" required>
            @foreach($prodi as $p)
            <option value="{{ $p->id }}">
                {{ $p->nama }}
            </option>
            @endforeach
        </select> <br/>
        Semester <input type="text" name="semester" required="required"> <br/>
        <input type="submit" value="Simpan Data">
    </form>

</body>

@endsection
