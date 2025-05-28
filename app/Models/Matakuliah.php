<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $primaryKey = 'id_matakuliah';
    // public $timestamps = false;

    // Optional: relasi ke dosen
    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'id_matakuliah');
    }

    // Optional: relasi ke nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_matakuliah');
    }

    // Optional: relasi ke semester
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester');
    }

    // Optional: relasi ke prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
}