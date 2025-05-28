<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Prodi;
use App\Models\Jurusan;
use App\Models\Matakuliah;
use App\Models\Semester;
use App\Models\Detail_nilai;


class Dosen extends Model
{

    use HasFactory;

    protected $table = 'tb_dosen';

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matakuliah');
    }
}

class Mahasiswa extends Model
{

    use HasFactory;

    protected $table = 'tb_mahasiswa';

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
    
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
}

class Nilai extends Model
{

    use HasFactory;

    protected $table = 'nilai';

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matakuliah');
    }

    public function tahun_akademik()
    {
        return $this->belongsTo(Tahun_akademik::class, 'id_tahun_akademik');
    }

    public function detail_nilai()
    {
        return $this->belongsTo(Detail_nilai::class, 'id_nilai');
    }
}

class m_admin extends Model
{
    #DOSEN
    public function allData_dosen() {
        return Dosen::with(['prodi', 'jurusan', 'matakuliah'])
                    ->orderBy('nama_dosen', 'asc')
                    ->get();
    }

    public function detailData_dosen($nidn){
        return Dosen::with(['prodi', 'jurusan', 'matakuliah'])
                    ->where('nidn', $nidn)
                    ->first();
    }

    public function addData_dosen($data){
        return DB::table('tb_dosen')->insert($data);
    }

    public function editData_dosen($nidn, $data){
        DB::table('tb_dosen')->where('nidn', $nidn)->update($data);
    }

    public function deleteData_dosen($nidn){
        DB::table('tb_dosen')->where('nidn', $nidn)->delete();
    }


    #MAHASISWA
    public function allData_mahasiswa(){
        return Mahasiswa::with(['prodi', 'jurusan'])
                    ->orderBy('nama_mahasiswa', 'asc')
                    ->get();
    }

    public function detailData_mahasiswa($nim){
        return Mahasiswa::with(['prodi', 'jurusan'])
                    ->where('nim', $nim)
                    ->first();
    }

    public function addData_mahasiswa($data){
        return DB::table('tb_mahasiswa')->insert($data);
    }

    public function editData_mahasiswa($nim, $data){
        DB::table('tb_mahasiswa')->where('nim', $nim)->update($data);
    }

    public function deleteData_mahasiswa($nim){
        DB::table('tb_mahasiswa')->where('nim', $nim)->delete();
    }

    #NILAI
    public function allData_nilai() {
        return Nilai::with([
            'dosen',
            'matakuliah.semester',
            'matakuliah.prodi.jurusan',
            'tahun_akademik',
            'detail_nilai'
        ])
        ->get()
        ->sortBy('dosen.nama_dosen'); // sortir setelah diambil
    }

    public function detailData_nilai($id_nilai){
        return Nilai::with([
            'dosen',
            'matakuliah.semester',
            'matakuliah.prodi.jurusan',
            'tahun_akademik',
            'detail_nilai'
        ])
        ->where('id_nilai', $id_nilai)
        ->first();
    }

    public function addData_nilai($data){
        return DB::table('nilai')->insert($data);
    }

    public function editData_nilai($id_nilai, $data){
        DB::table('nilai')->where('id_nilai', $id_nilai)->update($data);
    }

    public function deleteData_nilai($id_nilai){
        DB::table('nilai')->where('id_nilai', $id_nilai)->delete();
    }

    #USER
    public function allData_user(){
        return DB::table('users')->get();
    }

    public function detailData_user($id){
        return DB::table('users')->where('id', $id)->first();
    }

    public function addData_user($data){
        return DB::table('users')->insert($data);
    }

    public function editData_user($id, $data){
        DB::table('users')->where('id', $id)->update($data);
    }

    public function deleteData_user($id){
        DB::table('users')->where('id', $id)->delete();
    }

}
