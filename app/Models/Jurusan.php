<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    // public $timestamps = false;

    // Optional: relasi ke dosen
    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'id_jurusan');
    }

    // Optional: relasi ke prodi
    public function prodi()
    {
        return $this->hasMany(Prodi::class, 'id_jurusan');
    }
}