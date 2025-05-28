<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semester'; // sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id_semester'; // jika primary key bukan 'id'
    // public $timestamps = false; // jika tidak ada kolom created_at & updated_at

    // Optional: relasi ke dosen
    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'id_semester');
    }

    // Optional: relasi ke nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_semester');
    }
}