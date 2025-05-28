<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class m_dosen extends Model
{
    public function allData(){
        // return DB::table('tb_dosen')->get();
        $data = DB::select(
            'SELECT 
            a.nidn as nidn,
            a.nama_dosen as nama_dosen,
            a.foto_dosen as foto_dosen,
            a.bidang_keahlian as bidang_keahlian,
            a.id_prodi as id_prodi,
            b.nama_prodi as nama_prodi,
            a.id_jurusan as id_jurusan,
            c.nama_jurusan as nama_jurusan,
            FROM 
            tb_dosen as a,
            prodi as b,
            jurusan as c 
            WHERE 
            a.id_prodi = b.id_prodi 
            AND 
            a.id_jurusan = c.id_jurusan 
            ORDER BY a.nama_dosen ASC'
        );
        return $data;
    }

    public function detailData($nidn){
        return DB::table('tb_dosen')->where('nidn', $nidn)->first();
    }

    public function addData($data){
        return DB::table('tb_dosen')->insert($data);
    }

    public function editData($nidn, $data){
        DB::table('tb_dosen')->where('nidn', $nidn)->update($data);
    }

    public function deleteData($nidn){
        DB::table('tb_dosen')->where('nidn', $nidn)->delete();
    }

}
