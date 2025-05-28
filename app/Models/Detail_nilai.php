<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detail_nilai extends Model
{
    use HasFactory;

    protected $table = 'detail_nilai'; // sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id_nilai'; // jika primary key bukan 'id'
    // public $timestamps = false; // jika tidak ada kolom created_at & updated_at

    // Optional: relasi ke dosen
    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'id_nilai');
    }

    // Optional: relasi ke nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_nilai');
    }
}