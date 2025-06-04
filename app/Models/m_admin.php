<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

#TABEL_DATABASE
use App\Models\Table\Detail_nilai;
use App\Models\Table\Dosen;
use App\Models\Table\Jurusan;
use App\Models\Table\Kelas;
use App\Models\Table\Mahasiswa;
use App\Models\Table\Matakuliah;
use App\Models\Table\Nilai;
use App\Models\Table\Prodi;
use App\Models\Table\Semester;
use App\Models\Table\Tahun_akademik;


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

    #RINCIAN_NILAI
    public function rincian_nilai($id_nilai){
        return Nilai::with([
            'dosen',
            'matakuliah.semester',
            'matakuliah.kelas',
            'matakuliah.kelas.mahasiswa',
            'matakuliah.prodi.jurusan',
            'tahun_akademik',
            'detail_nilai',
        ])
        ->where('id_nilai', $id_nilai)
        ->first();
    }

    public function allData_rincian_nilai() {
        return Detail_nilai::with([
            'mahasiswa',
            'nilai',
            'nilai.dosen',
            'nilai.matakuliah',
            'nilai.matakuliah.kelas',
            'nilai.matakuliah.prodi',
            'nilai.matakuliah.semester',
            'nilai.tahun_akademik',
        ])
        ->get()
        ->sortBy('mahasiswa.nama_mahasiswa'); // sortir setelah diambil
    }

    public function detail_rincian_nilai($id_detail_nilai) {
        return Detail_nilai::with([
            'mahasiswa',
            'nilai',
            'nilai.dosen',
            'nilai.matakuliah',
            'nilai.matakuliah.kelas',
            'nilai.matakuliah.prodi',
            'nilai.matakuliah.semester',
            'nilai.tahun_akademik',
        ])
        ->where('id_detail_nilai', $id_detail_nilai)
        ->first();
    }

    public function addData_rincian_nilai($data){
        return DB::table('detail_nilai')->insert($data);
    }

    public function deleteData_rincian_nilai($id_detail_nilai){
        DB::table('detail_nilai')->where('id_detail_nilai', $id_detail_nilai)->delete();
    }

    public function editData_rincian_nilai($id_detail_nilai, $data){
        DB::table('detail_nilai')->where('id_detail_nilai', $id_detail_nilai)->update($data);
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
