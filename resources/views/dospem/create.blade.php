@extends('layouts.main')

@section('container')
<h1>{{ $title }}</h1>

<body>
    <a href="/dospem"> Kembali</a>

    <form action="/dospem/store" method="post">
        {{ csrf_field() }}
        NIK <input type="text" name="nik" required="required"> <br/>
        Nama <input type="text" name="nama" required="required"> <br/>
        Gelar Depan (optional) <input type="text" name="gelarDepan"> <br/>
        Gelar Belakang <input type="text" name="gelarBelakang" required="required"> <br/>
        Program Studi
        <select name="prodi_id" required>
            @foreach($prodi as $p)
            <option value="{{ $p->id }}">
                {{ $p->nama }}
            </option>
            @endforeach
        </select> <br/>
        <input type="submit" value="Simpan Data">
    </form>

</body>

@endsection