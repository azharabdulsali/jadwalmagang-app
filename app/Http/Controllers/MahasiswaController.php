<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::query()
        ->select('mahasiswa.*', 'prodi.nama as prodi')
        ->join('prodi', 'mahasiswa.prodi_id', '=', 'prodi.id')
        ->get();

    return view('mahasiswa.index', [
        'title' => 'Mahasiswa',
        'mahasiswa' => $mahasiswa
    ]);
    }

    public function create()
    {
        $prodi = \App\Models\Prodi::all();
    
        return view('mahasiswa.create', [
            'title' => 'Tambah Mahasiswa',
            'prodi' => $prodi
        ]);
    }

    public function store()
    {
        DB::table('mahasiswa')->insert([
            'nim' => request('nim'),
            'nama' => request('nama'),
            'prodi_id' => request('prodi_id'),
            'semester' => request('semester'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // $user = new User();
        // $user->username = request('nim');
        // $user->password = Hash::make("mahasiswa");
        // $user->role = 'mahasiswa';
        // $user->
        // $user->save();
        return redirect('/mahasiswa');
    }

public function edit($nim)
{
    $mahasiswa = DB::table('mahasiswa')
        ->select('mahasiswa.*', 'prodi.nama as prodi')
        ->join('prodi', 'mahasiswa.prodi_id', '=', 'prodi.id')
        ->where('nim', $nim)
        ->get();

    $prodi = \App\Models\Prodi::all();

    return view('mahasiswa.edit', [
        'mahasiswa' => $mahasiswa,
        'prodi' => $prodi,
        'title' => 'Mahasiswa'
    ]);
}

    public function update($nim)
    {
        DB::table('mahasiswa')->where('nim', $nim)->update([
            'nim' => request('nim'),
            'nama' => request('nama'),
            'prodi_id' => request('prodi_id'),
            'semester' => request('semester'),
        ]);
        return redirect('/mahasiswa');
    }

    public function delete($nim)
    {
        DB::table('mahasiswa') -> where ('nim', $nim) -> delete();

        return redirect('/mahasiswa');
    }
}
