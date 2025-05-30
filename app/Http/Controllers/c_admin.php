<?php

namespace App\Http\Controllers;

use App\Models\m_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_admin extends Controller
{

    protected $m_admin;
    
    public function __construct(){
        $this->m_admin = new m_admin();
    }

    public function about(){
        return view('admin/about');
    }

    public function invoice(){
        return view('admin/invoice');
    }

    public function chart(){
        return view('admin/chart');
    }
    
    public function user(){
        $data = ['user' => $this->m_admin->allData_user()];
        return view('admin/user', $data);
    }
    
    #DOSEN
    public function kelola_dosen(){
        $data = ['dosen' => $this->m_admin->allData_dosen()];
        return view('admin/kelola_dosen', $data);
    }

    public function detail_dosen($nidn){
        if(!$this->m_admin->detailData_dosen($nidn))
        {abort(404);}
        $data = ['dosen' => $this->m_admin->detailData_dosen($nidn)];
        return view('admin/dosen_detail', $data);
    }

    public function add_dosen(){

        $data = [
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
            'matakuliah' => DB::table('mata_kuliah')->get(),
        ];
        return view('admin/dosen_add', $data);
    }

    public function insert_dosen(){

        // validasi form
        Request()->validate([
            'nidn' => 'required|unique:tb_dosen,nidn',
            'nama_dosen' => 'required',
            'bidang_keahlian' => 'required',
            'id_matakuliah' => 'required',
            'id_prodi' => 'required',
            'id_jurusan' => 'required',
            'foto_dosen' => 'required',
        ],[
            'nidn.required' => 'NIDN wajib diisi !',
            'nidn.unique' => 'NIDN ini sudah terdaftar di database !',
            'nidn.min' => 'NIDN minimal 5 karakter',
            'nidn.max' => 'NIDN maksimal 18 karakter',
            'nama_dosen.required' => 'Nama Dosen Wajib diisi !',
            'bidang_keahlian.required' => 'Nama Bidang Wajib diisi !',
            'id_matakuliah.required' => 'Nama Matakuliah wajib diisi !',
            'id_prodi.required' => 'Nama Prodi wajib diisi !',
            'id_jurusan.required' => 'Nama Jurusan wajib diisi !',
            'foto_dosen.required' => 'Foto Dosen Wajib diisi !',
        ]);

        // upload gambar
        $file = Request()->foto_dosen;
        $fileName = request()->nidn .'.'. $file->extension();
        $file->move(public_path('assets/foto_dosen'),$fileName);

        $data = [
            'nidn' => request()->nidn,
            'nama_dosen' => request()->nama_dosen,
            'bidang_keahlian' => request()->bidang_keahlian,
            'id_matakuliah' => request()->id_matakuliah,
            'foto_dosen' => $fileName,
            'id_prodi' => request()->id_prodi,
            'id_jurusan' => request()->id_jurusan,
        ];
        $this->m_admin->addData_dosen($data);
        return redirect()->route('dosen')->with('pesan', 'Data berhasil ditambahkan !');
    }

    public function edit_dosen($nidn){
        if(!$this->m_admin->detailData_dosen($nidn))
        {abort(404);}
        $data = ['dosen' => $this->m_admin->detailData_dosen($nidn)];
        
        $data2 = [
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
            'matakuliah' => DB::table('mata_kuliah')->get(),
        ];
        return view('admin/dosen_edit', $data, $data2);
    }

    public function update_dosen($nidn){
        
        // validasi form
        Request()->validate([
            'nama_dosen' => 'required',
            'bidang_keahlian' => 'required',
            'id_prodi' => 'required',
            'id_jurusan' => 'required',
            // 'foto_dosen' => 'required|mimes:jpg,jpeg,png,bmp|max:10240',
        ],[
            'nama_dosen.required' => 'Nama Dosen Wajib diisi !',
            'bidang_keahlian.required' => 'Nama Bidang wajib diisi !',
            'id_prodi.required' => 'Nama Prodi wajib diisi !',
            'id_jurusan.required' => 'Nama jurusan wajib diisi !',
            // 'foto_dosen.required' => 'Foto Dosen Wajib diisi !',
        ]);

        // upload gambar
        if (request()->foto_dosen != ""){
            $file = Request()->foto_dosen;
            $fileName = request()->nidn .'.'. $file->extension();
            $file->move(public_path('assets/foto_dosen'),$fileName);

            $data = [
                'nidn' => request()->nidn,
                'nama_dosen' => request()->nama_dosen,
                'bidang_keahlian' => request()->bidang_keahlian,
                'foto_dosen' => $fileName,
                'id_prodi' => request()->id_prodi,
                'id_jurusan' => request()->id_jurusan,
            ];
            $this->m_admin->editData_dosen($nidn, $data);
        }
        else {
            $data = [
                'nidn' => request()->nidn,
                'nama_dosen' => request()->nama_dosen,
                'bidang_keahlian' => request()->bidang_keahlian,
                'id_prodi' => request()->id_prodi,
                'id_jurusan' => request()->id_jurusan,
            ];
            $this->m_admin->editData_dosen($nidn, $data);
        }
        return redirect()->route('dosen')->with('pesan', 'Data berhasil diedit !');
    }

    public function delete_dosen($nidn){
        if(!$this->m_admin->detailData_dosen($nidn))
        {abort(404);}
        $dosen = $this->m_admin->detailData_dosen($nidn);
        if($dosen->foto_dosen != ""){
            unlink(public_path('assets/foto_dosen').'/'.$dosen->foto_dosen);
        }
        $this->m_admin->deleteData_dosen($nidn);
        return redirect()->route('dosen')->with('pesan', 'Data berhasil dihapus !');
    }

    #----------------------------------------------------------------------------
    
    #MAHASISWA

    public function mahasiswa(){
        $data = ['mahasiswa' => $this->m_admin->allData_mahasiswa()];
        return view('admin/mahasiswa', $data);
    }

    public function detail_mahasiswa($nim){
        if(!$this->m_admin->detailData_mahasiswa($nim))
        {abort(404);}
        $data = ['mahasiswa' => $this->m_admin->detailData_mahasiswa($nim)];
        return view('admin/mahasiswa_detail', $data);
    }

    public function add_mahasiswa(){

        $data = [
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
            'semester' => DB::table('semester')->get(),
            'kelas' => DB::table('kelas')->get(),
            'tahun_akademik' => DB::table('tahun_akademik')->get(),
        ];
        return view('admin/mahasiswa_add', $data);
    }

    public function insert_mahasiswa(){

        // validasi form
        Request()->validate([
            'nim' => 'required|unique:tb_mahasiswa,nim',
            'nama_mahasiswa' => 'required',
            'jenis_kelamin' => 'required',
            'id_prodi' => 'required',
            'id_semester' => 'required',
            'id_kelas' => 'required',
            'id_tahun_akademik' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'nomor_handphone' => 'required',
            'foto_mahasiswa' => 'required',
        ],[
            'nim.required' => 'NIM wajib diisi !',
            'nim.unique' => 'NIM ini sudah terdaftar di database !',
            'nama_mahasiswa.required' => 'Nama Mahasiswa Wajib diisi !',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib diisi !',
            'id_prodi.required' => 'Nama Prodi wajib diisi !',
            'id_semester.required' => 'Semester wajib diisi !',
            'id_kelas.required' => 'Kelas wajib diisi !',
            'id_tahun_akademik.required' => 'Tahun Akademik wajib diisi !',
            'tgl_lahir.required' => 'Tanggal Lahir Wajib diisi !',
            'alamat.required' => 'Alamat Wajib diisi !',
            'nomor_handphone.required' => 'No Handphone Wajib diisi !',
            'foto_mahasiswa.required' => 'Foto Mahasiswa Wajib diisi !',
        ]);

        // upload gambar
        $file = Request()->foto_mahasiswa;
        $fileName = request()->nim .'.'. $file->extension();
        $file->move(public_path('assets/foto_mahasiswa'),$fileName);

        $data = [
            'nim' => request()->nim,
            'nama_mahasiswa' => request()->nama_mahasiswa,
            'jenis_kelamin' => request()->jenis_kelamin,
            'id_prodi' => request()->id_prodi,
            'id_semester' => request()->id_semester,
            'id_kelas' => request()->id_kelas,
            'id_tahun_akademik' => request()->id_tahun_akademik,
            'tgl_lahir' => request()->tgl_lahir,
            'alamat' => request()->alamat,
            'agama' => request()->agama,
            'nomor_handphone' => request()->nomor_handphone,
            'foto_mahasiswa' => $fileName,
        ];
        $this->m_admin->addData_mahasiswa($data);
        return redirect()->route('mahasiswa')->with('pesan', 'Data berhasil ditambahkan !');
    }

    public function edit_mahasiswa($nim){
        if(!$this->m_admin->detailData_mahasiswa($nim))
        {abort(404);}
        $data = ['mahasiswa' => $this->m_admin->detailData_mahasiswa($nim)];
        
        $data2 = [
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
            'semester' => DB::table('semester')->get(),
            'kelas' => DB::table('kelas')->get(),
            'tahun_akademik' => DB::table('tahun_akademik')->get(),
        ];
        return view('admin/mahasiswa_edit', $data, $data2);
    }

    public function update_mahasiswa($nim){
        
        // validasi form
        Request()->validate([
            'nim' => 'required|unique:tb_mahasiswa,nim',
            'nama_mahasiswa' => 'required',
            'jenis_kelamin' => 'required',
            'id_prodi' => 'required',
            'id_semester' => 'required',
            'id_kelas' => 'required',
            'id_tahun_akademik' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'nomor_handphone' => 'required',
            // 'foto_mahasiswa' => 'required|mimes:jpg,jpeg,png,bmp|max:10240',
        ],[
            'nim.required' => 'NIM wajib diisi !',
            'nim.unique' => 'NIM ini sudah terdaftar di database !',
            'nama_mahasiswa.required' => 'Nama Mahasiswa Wajib diisi !',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib diisi !',
            'id_prodi.required' => 'Nama Prodi wajib diisi !',
            'id_semester.required' => 'Semester wajib diisi !',
            'id_kelas.required' => 'Kelas wajib diisi !',
            'id_tahun_akademik.required' => 'Tahun Akademik wajib diisi !',
            'tgl_lahir.required' => 'Tanggal Lahir Wajib diisi !',
            'alamat.required' => 'Alamat Wajib diisi !',
            'nomor_handphone.required' => 'No Handphone Wajib diisi !',
            // 'foto_mahasiswa.required' => 'Foto Dosen Wajib diisi !',
        ]);

        // upload gambar
        if (request()->foto_mahasiswa != ""){
            $file = Request()->foto_mahasiswa;
            $fileName = request()->nim .'.'. $file->extension();
            $file->move(public_path('assets/foto_mahasiswa'),$fileName);

            $data = [
                'nim' => request()->nim,
                'nama_mahasiswa' => request()->nama_mahasiswa,
                'jenis_kelamin' => request()->jenis_kelamin,
                'id_prodi' => request()->id_prodi,
                'id_semester' => request()->id_semester,
                'id_kelas' => request()->id_kelas,
                'id_tahun_akademik' => request()->id_tahun_akademik,
                'tgl_lahir' => request()->tgl_lahir,
                'alamat' => request()->alamat,
                'agama' => request()->agama,
                'nomor_handphone' => request()->nomor_handphone,
                'foto_mahasiswa' => $fileName,
            ];
            $this->m_admin->editData_mahasiswa($nim, $data);
        }
        else {
            $data = [
                'nim' => request()->nim,
                'nama_mahasiswa' => request()->nama_mahasiswa,
                'jenis_kelamin' => request()->jenis_kelamin,
                'id_prodi' => request()->id_prodi,
                'id_semester' => request()->id_semester,
                'id_kelas' => request()->id_kelas,
                'id_tahun_akademik' => request()->id_tahun_akademik,
                'tgl_lahir' => request()->tgl_lahir,
                'alamat' => request()->alamat,
                'agama' => request()->agama,
                'nomor_handphone' => request()->nomor_handphone,
            ];
            $this->m_admin->editData_mahasiswa($nim, $data);
        }
        return redirect()->route('mahasiswa')->with('pesan', 'Data berhasil diedit !');
    }

    public function delete_mahasiswa($nim){
        if(!$this->m_admin->detailData_mahasiswa($nim))
        {abort(404);}
        $mahasiswa = $this->m_admin->detailData_mahasiswa($nim);
        if($mahasiswa->foto_mahasiswa != ""){
            unlink(public_path('assets/foto_mahasiswa').'/'.$mahasiswa->foto_mahasiswa);
        }
        $this->m_admin->deleteData_mahasiswa($nim);
        return redirect()->route('mahasiswa')->with('pesan', 'Data berhasil dihapus !');
    } 
    
    #----------------------------------------------------------------------------

    #NILAI
    public function nilai(){
        $data = ['nilai' => $this->m_admin->allData_nilai()];
        return view('admin/nilai', $data);
    }

    public function add_nilai(){

        $data = [
            'dosen' => DB::table('tb_dosen')->get(),
            'matakuliah' => DB::table('mata_kuliah')->get(),
            'semester' => DB::table('semester')->get(),
            'tahun_akademik' => DB::table('tahun_akademik')->get(),
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
        ];
        return view('admin/nilai_add', $data);
    }

    public function insert_nilai(){

        // validasi form
        Request()->validate([
            'nidn' => 'required',
            'id_matakuliah' => 'required',
            'id_tahun_akademik' => 'required',
            'komposisi_nilai_lain' => 'required|numeric',
            'komposisi_nilai_uts' => 'required|numeric',
            'komposisi_nilai_uas' => 'required|numeric',
        ],[
            'nidn.required' => 'Nama Dosen wajib diisi !',
            'id_matakuliah.required' => 'Nama Matakuliah wajib diisi !',
            'id_tahun_akademik.required' => 'Tahun Akademik wajib diisi !',
            'komposisi_nilai_lain.required' => 'Nilai Lain-lain Wajib diisi !',
            'komposisi_nilai_uts.required' => 'Nilai UTS Wajib diisi !',
            'komposisi_nilai_uas.required' => 'Nilai UAS Wajib diisi !',
        ]);
        $total = request()->komposisi_nilai_lain + request()->komposisi_nilai_uts + request()->komposisi_nilai_uas;

        if ($total != 100) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['total_komposisi' => 'Total komposisi nilai harus tepat 100!']);
        }

        $data = [
            'nidn' => request()->nidn,
            'id_matakuliah' => request()->id_matakuliah,
            'id_tahun_akademik' => request()->id_tahun_akademik,
            'komposisi_nilai_lain' => request()->komposisi_nilai_lain,
            'komposisi_nilai_uts' => request()->komposisi_nilai_uts,
            'komposisi_nilai_uas' => request()->komposisi_nilai_uas,
        ];
        $this->m_admin->addData_nilai($data);
        return redirect()->route('nilai')->with('pesan', 'Data berhasil ditambahkan !');
    }

    public function edit_nilai($id_nilai){
        if(!$this->m_admin->detailData_nilai($id_nilai))
        {abort(404);}
        $data = ['nilai' => $this->m_admin->detailData_nilai($id_nilai)];
        
        $data2 = [
            'dosen' => DB::table('tb_dosen')->get(),
            'matakuliah' => DB::table('mata_kuliah')->get(),
            'semester' => DB::table('semester')->get(),
            'tahun_akademik' => DB::table('tahun_akademik')->get(),
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
        ];
        return view('admin/nilai_edit', $data, $data2);
    }

    public function update_nilai($id_nilai){
        
        // validasi form
        Request()->validate([
            'nidn' => 'required',
            'id_matakuliah' => 'required',
            'id_tahun_akademik' => 'required',
            'komposisi_nilai_lain' => 'required|numeric',
            'komposisi_nilai_uts' => 'required|numeric',
            'komposisi_nilai_uas' => 'required|numeric',
        ],[
            'nidn.required' => 'Nama Dosen wajib diisi !',
            'id_matakuliah.required' => 'Nama Matakuliah wajib diisi !',
            'id_tahun_akademik.required' => 'Tahun Akademik wajib diisi !',
            'komposisi_nilai_lain.required' => 'Nilai Lain-lain Wajib diisi !',
            'komposisi_nilai_uts.required' => 'Nilai UTS Wajib diisi !',
            'komposisi_nilai_uas.required' => 'Nilai UAS Wajib diisi !',
        ]);
        $total = request()->komposisi_nilai_lain + request()->komposisi_nilai_uts + request()->komposisi_nilai_uas;

        if ($total != 100) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['total_komposisi' => 'Total komposisi nilai harus tepat 100!']);
        }

        $data = [
            'nidn' => request()->nidn,
            'id_matakuliah' => request()->id_matakuliah,
            'id_tahun_akademik' => request()->id_tahun_akademik,
            'komposisi_nilai_lain' => request()->komposisi_nilai_lain,
            'komposisi_nilai_uts' => request()->komposisi_nilai_uts,
            'komposisi_nilai_uas' => request()->komposisi_nilai_uas,
        ];
        $this->m_admin->editData_nilai($id_nilai, $data);
        return redirect()->route('nilai')->with('pesan', 'Data berhasil diedit !');
    }

    public function delete_nilai($id_nilai){
        if(!$this->m_admin->detailData_nilai($id_nilai))
        {abort(404);}
        $this->m_admin->deleteData_nilai($id_nilai);
        return redirect()->route('nilai')->with('pesan', 'Data berhasil dihapus !');
    }

    
    #----------------------------------------------------------------------------

    #NILAI-RINCIAN_NILAI

    public function rincian_nilai($id_nilai){
        if(!$this->m_admin->rincian_nilai($id_nilai))
        {abort(404);}

        
        $data = ['nilai' => $this->m_admin->rincian_nilai($id_nilai)];
        $data2 = ['rincian_nilai' => $this->m_admin->allData_rincian_nilai()];
        return view('admin/rincian_nilai', $data, $data2);
    }

    public function add_rincian_nilai($id_nilai){

        $nilai = $this->m_admin->rincian_nilai($id_nilai);
        $data = [
            'nilai' => $nilai,
            'mhs' => $nilai->matakuliah->kelas->mahasiswa ?? collect()
        ];
        return view('admin/rincian_nilai_add', $data);
    }


    public function insert_rincian_nilai(){

        // validasi form
        Request()->validate([
            'nidn' => 'required',
            'id_matakuliah' => 'required',
            'id_tahun_akademik' => 'required',
            'komposisi_nilai_lain' => 'required|numeric',
            'komposisi_nilai_uts' => 'required|numeric',
            'komposisi_nilai_uas' => 'required|numeric',
        ],[
            'nidn.required' => 'Nama Dosen wajib diisi !',
            'id_matakuliah.required' => 'Nama Matakuliah wajib diisi !',
            'id_tahun_akademik.required' => 'Tahun Akademik wajib diisi !',
            'komposisi_nilai_lain.required' => 'Nilai Lain-lain Wajib diisi !',
            'komposisi_nilai_uts.required' => 'Nilai UTS Wajib diisi !',
            'komposisi_nilai_uas.required' => 'Nilai UAS Wajib diisi !',
        ]);
        $total = request()->komposisi_nilai_lain + request()->komposisi_nilai_uts + request()->komposisi_nilai_uas;

        if ($total != 100) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['total_komposisi' => 'Total komposisi nilai harus tepat 100!']);
        }

        $data = [
            'nidn' => request()->nidn,
            'id_matakuliah' => request()->id_matakuliah,
            'id_tahun_akademik' => request()->id_tahun_akademik,
            'komposisi_nilai_lain' => request()->komposisi_nilai_lain,
            'komposisi_nilai_uts' => request()->komposisi_nilai_uts,
            'komposisi_nilai_uas' => request()->komposisi_nilai_uas,
        ];
        $this->m_admin->addData_nilai($data);
        return redirect()->route('nilai')->with('pesan', 'Data berhasil ditambahkan !');
    }

    public function edit_rincian_nilai($id_nilai){
        if(!$this->m_admin->detailData_nilai($id_nilai))
        {abort(404);}
        $data = ['nilai' => $this->m_admin->detailData_nilai($id_nilai)];
        
        $data2 = [
            'dosen' => DB::table('tb_dosen')->get(),
            'matakuliah' => DB::table('mata_kuliah')->get(),
            'semester' => DB::table('semester')->get(),
            'tahun_akademik' => DB::table('tahun_akademik')->get(),
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
        ];
        return view('admin/nilai_edit', $data, $data2);
    }

    public function update_rincian_nilai($id_nilai){
        
        // validasi form
        Request()->validate([
            'nidn' => 'required',
            'id_matakuliah' => 'required',
            'id_tahun_akademik' => 'required',
            'komposisi_nilai_lain' => 'required|numeric',
            'komposisi_nilai_uts' => 'required|numeric',
            'komposisi_nilai_uas' => 'required|numeric',
        ],[
            'nidn.required' => 'Nama Dosen wajib diisi !',
            'id_matakuliah.required' => 'Nama Matakuliah wajib diisi !',
            'id_tahun_akademik.required' => 'Tahun Akademik wajib diisi !',
            'komposisi_nilai_lain.required' => 'Nilai Lain-lain Wajib diisi !',
            'komposisi_nilai_uts.required' => 'Nilai UTS Wajib diisi !',
            'komposisi_nilai_uas.required' => 'Nilai UAS Wajib diisi !',
        ]);
        $total = request()->komposisi_nilai_lain + request()->komposisi_nilai_uts + request()->komposisi_nilai_uas;

        if ($total != 100) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['total_komposisi' => 'Total komposisi nilai harus tepat 100!']);
        }

        $data = [
            'nidn' => request()->nidn,
            'id_matakuliah' => request()->id_matakuliah,
            'id_tahun_akademik' => request()->id_tahun_akademik,
            'komposisi_nilai_lain' => request()->komposisi_nilai_lain,
            'komposisi_nilai_uts' => request()->komposisi_nilai_uts,
            'komposisi_nilai_uas' => request()->komposisi_nilai_uas,
        ];
        $this->m_admin->editData_nilai($id_nilai, $data);
        return redirect()->route('nilai')->with('pesan', 'Data berhasil diedit !');
    }

    public function delete_rincian_nilai($id_nilai){
        if(!$this->m_admin->detailData_nilai($id_nilai))
        {abort(404);}
        $this->m_admin->deleteData_nilai($id_nilai);
        return redirect()->route('nilai')->with('pesan', 'Data berhasil dihapus !');
    }

    #----------------------------------------------------------------------------

    #END NEW
}
