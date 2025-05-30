<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'tb_mahasiswa'; // sesuaikan dengan nama tabel di database
    protected $primaryKey = 'nim'; // jika primary key bukan 'id'
    // public $timestamps = false; // jika tidak ada kolom created_at & updated_at
    
    // Optional: relasi ke detail_nilai
    public function detail_nilai()
    {
        return $this->hasMany(Detail_nilai::class, 'nim');
    }

    // Optional: relasi ke prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
    
    // Optional: relasi ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    // Optional: relasi ke tahun_akademik
    public function tahun_akademik()
    {
        return $this->belongsTo(Tahun_akademik::class, 'id_tahun_akademik');
    }
}