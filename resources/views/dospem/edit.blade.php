@extends('layouts.main')

@section('container')

<h1>{{ $title }}</h1>

<body>
    <a href="/dospem"> Kembali</a>

    @foreach($dospem as $dospem)
    <form action="/dospem/update/{{ $dospem->nik }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="nik" value="{{ $dospem->nik }}"> <br/>
        NIK <input type="text" required="required" name="nik" value="{{ $dospem->nik }}" readonly> <br/>
        Nama <input type="text" required="required" name="nama" value="{{ $dospem->nama }}"> <br/>
        Gelar Depan <input type="text" name="gelarDepan" value="{{ $dospem->gelarDepan }}"> <br/>
        Gelar Belakang <input type="text" required="required" name="gelarBelakang" value="{{ $dospem->gelarBelakang }}"> <br/>
        Program Studi
        <select name="prodi_id" required>
            @foreach($prodi as $p)
                <option value="{{ $p->id }}" {{ $dospem->prodi_id == $p->id ? 'selected' : '' }}>
                    {{ $p->nama }}
                </option>
            @endforeach
        </select> <br/>
        <input type="submit" value="Simpan Data">
    </form>
    @endforeach

</body>

@endsection