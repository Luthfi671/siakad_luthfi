<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detail_nilai extends Model
{
    use HasFactory;

    protected $table = 'detail_nilai'; // sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id_nilai'; // jika primary key bukan 'id'
    // public $timestamps = false; // jika tidak ada kolom created_at & updated_at

    // Optional: relasi ke mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim');
    }

    // Optional: relasi ke nilai
    public function nilai()
    {
        return $this->belongsTo(Nilai::class, 'id_nilai');
    }
}