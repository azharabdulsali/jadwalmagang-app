<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TempatMagangController extends Controller
{
    public function index()
    {
        $tempatmagang = \App\Models\TempatMagang::all();

        return view('tempatMagang.index', [
            'title' => 'Tempat Magang',
            'tempatMagang' => $tempatmagang
        ]);
    }

    public function create ()
    {
        $tempatmagang = \App\Models\TempatMagang::all();
        return view('tempatMagang.create', [
            'title' => 'Tambah Tempat Magang',
            'tempatMagang' => $tempatmagang
        ]);
    }

    public function store ()
    {
        DB::table('tempatmagang')->insert([
            'namaTempat' => request('namaTempat'),
            'alamat' => request('alamat'),
            'kotaKab' => request('kotaKab'),
            'provinsi' => request('provinsi'),
            'telepon' => request('telepon'),
        ]);
        return redirect('/tempatMagang');
    }

    public function edit($id)
    {
        $tempatMagang = \App\Models\TempatMagang::find($id);
    
        return view('tempatMagang.edit', [
            'title' => 'Edit Tempat Magang',
            'tempatMagang' => $tempatMagang
        ]);
    }

    public function update ($id)
    {
        DB::table('tempatmagang')->where('id', $id)->update([
            'namaTempat' => request('namaTempat'),
            'alamat' => request('alamat'),
            'kotaKab' => request('kotaKab'),
            'provinsi' => request('provinsi'),
            'telepon' => request('telepon'),
        ]);
        return redirect('/tempatMagang');
    }

    public function delete ($id)
    {
        DB::table('tempatmagang')->where('id', $id)->delete();
        return redirect('/tempatMagang');
    }
}
