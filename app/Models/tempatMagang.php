<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tempatMagang extends Model
{
    use HasFactory;
    protected $table = 'tempatmagang';
    protected $fillable = ['namaTempat', 'alamat', 'kotaKab', 'provinsi', 'telepon'];
}
