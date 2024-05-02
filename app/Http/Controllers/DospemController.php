<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dospem;

class DospemController extends Controller
{
    public function index(Request $request) 
    {
        $searchQuery = $request->input('search');

        $dospem = Dospem::query()
        ->select('dospem.*', 'prodi.nama as prodi')
        ->join('prodi', 'dospem.prodi_id', '=', 'prodi.id')
        ->when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('dospem.nik', 'like', "%$searchQuery%")
                ->orWhere('dospem.nama', 'like', "%$searchQuery%");
        })
        ->get();

        return view('dospem.index', [
        'title' => 'Dosen Pembimbing',
        'dospem' => $dospem
    ]);
    }

    public function create()
    {
        $prodi = \App\Models\Prodi::all();

        return view('dospem.create', [
            'title' => 'Tambah Dosen',
            'prodi' => $prodi
        ]);
    }

    public function store ()
    {
        DB::table('dospem')->insert([
            'nik' => request('nik'),
            'nama' => request('nama'),
            'gelarDepan' => request('gelarDepan'),
            'gelarBelakang' => request('gelarBelakang'),
            'prodi_id' => request('prodi_id'),
        ]);
        return redirect('/dospem');
    }

    public function edit ($nik)
    {
        $dospem = DB::table('dospem')
        ->select('dospem.*', 'prodi.nama as prodi')
        ->join('prodi', 'dospem.prodi_id', '=', 'prodi.id')
        ->where('nik', $nik)
        ->get();

        $prodi = \App\Models\Prodi::all();

        return view('dospem.edit', [
            'dospem' => $dospem,
            'prodi' => $prodi,
            'title' => 'Edit Data Dosen'
        ]);
    }

    public function update ($nik)
    {
        DB::table('dospem')->where('nik', $nik)->update([
            'nik' => request('nik'),
            'nama' => request('nama'),
            'gelarDepan' => request('gelarDepan'),
            'gelarBelakang' => request('gelarBelakang'),
            'prodi_id' => request('prodi_id'),
        ]);
        return redirect('/dospem');
    }

    public function delete ($nik)
    {
        DB::table('dospem')->where('nik', $nik)->delete();
        return redirect('/dospem');
    }
}
