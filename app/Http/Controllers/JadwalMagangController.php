<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class JadwalMagangController extends Controller
{
    public function index()
    {
        $query = \App\Models\JadwalMagang::select('jadwalmagang.*',
                'mahasiswa.nama',
                'mahasiswa.prodi_id',
                'prodi.id AS id_prodi',
                'prodi.nama AS nama_prodi',
                DB::raw('DATE_FORMAT(jadwalmagang.jadwalAwal, "%d %M %Y") AS jadwalAwal'),
                DB::raw('DATE_FORMAT(jadwalmagang.jadwalAkhir, "%d %M %Y") AS jadwalAkhir'),
                'tempatmagang.namaTempat AS nama_tempatmagang',
                'dospem.nama AS nama_dospem'
            )
            ->join('mahasiswa', 'jadwalmagang.nim', '=', 'mahasiswa.nim')
            ->join('prodi', 'mahasiswa.prodi_id', '=', 'prodi.id')
            ->join('tempatmagang', 'jadwalmagang.idTempatMagang', '=', 'tempatmagang.id')
            ->join('dospem', 'jadwalmagang.nik', '=', 'dospem.nik');
    
            if (Request::filled('search')) {
                $searchTerm = Request::input('search');
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('mahasiswa.nama', 'like', '%' . $searchTerm . '%')
                      ->orWhere('prodi.nama', 'like', '%' . $searchTerm . '%')
                      ->orWhere('tempatmagang.namaTempat', 'like', '%' . $searchTerm . '%')
                      ->orWhere('dospem.nama', 'like', '%' . $searchTerm . '%');
                });
            }
        
            if (Request::filled('jadwalAwal') && Request::filled('jadwalAkhir')) {
                $jadwalAwal = date('Y-m-d', strtotime(Request::input('jadwalAwal')));
                $jadwalAkhir = date('Y-m-d', strtotime(Request::input('jadwalAkhir')));
                $query->whereBetween('jadwalmagang.jadwalAwal', [$jadwalAwal, $jadwalAkhir])
                      ->orWhereBetween('jadwalmagang.jadwalAkhir', [$jadwalAwal, $jadwalAkhir]);
            }
    
        $jadwalMagang = $query->paginate();
    
        Paginator::useBootstrap();
    
        return view('jadwalMagang.index', [
            'title' => 'Jadwal Magang',
            'jadwalMagang' => $jadwalMagang
        ]);
    }


    public function create()
    {
        $mahasiswa = \App\Models\Mahasiswa::all();
        $dospem = \App\Models\Dospem::all();
        $prodi = \App\Models\Prodi::all();
        $tempatmagang = \App\Models\TempatMagang::all();
    
        return view('jadwalMagang.create', [
            'title' => 'Tambah Jadwal Magang',
            'mahasiswa' => $mahasiswa,
            'dospem' => $dospem,
            'prodi' => $prodi,
            'tempatmagang' => $tempatmagang
        ]);
    }

    public function store ()
    {
        DB::table('jadwalmagang')->insert([
            'nim' => request('nama'),
            'jadwalAwal' => request('jadwalAwal'),
            'jadwalAkhir' => request('jadwalAkhir'),
            'idTempatMagang' => request('nama_tempatmagang'),
            'nik' => request('nama_dospem'),
        ]);
        return redirect('/jadwalMagang');
    }

    public function edit($id)
    {
        $jadwalMagang = DB::table('jadwalmagang')
            ->where('id', $id)
            ->get();
    
        $mahasiswa = \App\Models\Mahasiswa::all();
        $dospem = \App\Models\Dospem::all();
        $prodi = \App\Models\Prodi::all();
        $tempatmagang = \App\Models\TempatMagang::all();
    
        return view('jadwalMagang.edit', [
            'title' => 'Edit Jadwal Magang',
            'jadwalMagang' => $jadwalMagang,
            'mahasiswa' => $mahasiswa,
            'dospem' => $dospem,
            'prodi' => $prodi,
            'tempatmagang' => $tempatmagang,
        ]);
    }

    public function update ($id)
    {
        DB::table('jadwalmagang')->where('id', $id)->update([
            'nim' => request('nim'),
            'jadwalAwal' => request('jadwalAwal'),
            'jadwalAkhir' => request('jadwalAkhir'),
            'idTempatMagang' => request('nama_tempatmagang'),
            'nik' => request('nama_dospem'),
        ]);
        return redirect('/jadwalMagang');
    }

    public function delete($id)
    {
        DB::table('jadwalmagang') -> where ('id', $id) -> delete();
        return redirect('/jadwalMagang');
    }

    public function print()
    {
        $data = [
            'title' => 'Jadwal Magang',
            'jadwalMagang' => \App\Models\JadwalMagang::all(),
        ];

        dd($data);

        // $pdf = PDF::loadView('/jadwalMagang.index-pdf', $data);

        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('index.pdf');
    }
}
