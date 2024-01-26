@extends('layouts.main')

@section('container')
<h1>{{ $title }}</h1>

<body>
    <a href="/tempatMagang"> Kembali</a>

    <form action="/tempatMagang/update/{{ $tempatMagang->id }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $tempatMagang->id }}"> <br/>
        Nama Tempat <input type="text" name="namaTempat" required="required" value="{{ $tempatMagang->namaTempat }}"> <br/>
        Alamat <input type="text" name="alamat" required="required" value="{{ $tempatMagang->alamat }}"> <br/>
        Kota / Kabupaten <input type="text" name="kotaKab" required="required" value="{{ $tempatMagang->kotaKab }}"> <br/>
        Provinsi <input type="text" name="provinsi" required="required" value="{{ $tempatMagang->provinsi }}"> <br/>
        Telepon <input type="text" name="telepon" required="required" value="{{ $tempatMagang->telepon }}"> <br/>
        <input type="submit" value="Simpan Data">
    </form>
</body>
@endsection