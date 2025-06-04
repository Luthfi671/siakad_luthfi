<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai'; // sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id_nilai'; // jika primary key bukan 'id'
    // public $timestamps = false; // jika tidak ada kolom created_at & updated_at
    
    // Optional: relasi ke detail_nilai
    public function detail_nilai()
    {
        return $this->hasMany(Detail_nilai::class, 'id_nilai');
    }

    // Optional: relasi ke dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }
    
    // Optional: relasi ke matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matakuliah', 'id_matakuliah');
    }

    // Optional: relasi ke tahun_akademik
    public function tahun_akademik()
    {
        return $this->belongsTo(Tahun_akademik::class, 'id_tahun_akademik');
    }
}