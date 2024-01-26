@extends('layouts.main')

@section('container')
<h1>{{ $title }}</h1>

<body>
    <a href="/tempatMagang"> Kembali</a>

    <form action="/tempatMagang/store" method="post">
        {{ csrf_field() }}
        Nama Tempat <input type="text" name="namaTempat" required="required"> <br/>
        Alamat <input type="text" name="alamat" required="required"> <br/>
        Kota / Kabupaten <input type="text" name="kotaKab" required="required"> <br/>
        Provinsi <input type="text" name="provinsi" required="required"> <br/>
        Telepon <input type="text" name="telepon" required="required"> <br/>
        <input type="submit" value="Simpan Data">
    </form>

</body>
@endsection