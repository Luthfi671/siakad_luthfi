<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tahun_akademik extends Model
{
    use HasFactory;
    
    protected $table = 'tahun_akademik'; // sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id_tahun_akademik'; // jika primary key bukan 'id'
    // public $timestamps = false; // jika tidak ada kolom created_at & updated_at
    
    // Optional: relasi ke mahasiswa
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_tahun_akademik');
    }
    
    // Optional: relasi ke nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_tahun_akademik');
    }
}