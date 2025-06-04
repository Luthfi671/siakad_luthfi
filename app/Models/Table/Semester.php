<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semester'; // sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id_semester'; // jika primary key bukan 'id'
    // public $timestamps = false; // jika tidak ada kolom created_at & updated_at

    // Optional: relasi ke matakuliah
    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class, 'id_semester');
    }
}