<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dospem extends Model
{
    use HasFactory;
    protected $table = 'dospem';
    protected $fillable = ['nik', 'nama', 'gelarDepan', 'gelarBelakang', 'prodi_id'];
}
