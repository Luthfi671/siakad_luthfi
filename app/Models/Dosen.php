<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'tb_dosen'; // sesuaikan dengan nama tabel di database
    protected $primaryKey = 'nidn'; // jika primary key bukan 'id'
    // public $timestamps = false; // jika tidak ada kolom created_at & updated_at
    
    // Optional: relasi ke nilai
    public function nilai()
    {
        return $this->hasMany(nilai::class, 'nidn');
    }
    
    // Optional: relasi ke matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matakuliah');
    }

    // Optional: relasi ke prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    // Optional: relasi ke jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}