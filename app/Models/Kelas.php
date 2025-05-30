<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    // public $timestamps = false;

    // Optional: relasi ke mahasiswa
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_kelas', 'id_kelas');
    }

    // Optional: relasi ke matakuliah
    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class, 'id_kelas');
    }
}