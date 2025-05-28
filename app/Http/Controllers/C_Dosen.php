<?php

namespace App\Http\Controllers;

use App\Models\m_dosen;
use Illuminate\Http\Request;

class c_dosen extends Controller
{
    protected $m_dosen;
    
    public function __construct(){
        $this->m_dosen = new m_dosen();
    }

    public function kelola_akun(){
        $data = ['dosen' => $this->m_dosen->allData()];
        return view('dosen/kelola_akun', $data);
    }

    public function index(){
        $data = ['dosen' => $this->m_dosen->allData()];
        return view('v_dosen', $data);
    }

    public function add(){
        return view('v_adddosen');
    }

    public function detail($id_dosen){
        if(!$this->m_dosen->detailData($id_dosen))
        {abort(404);}
        $data = ['dosen' => $this->m_dosen->detailData($id_dosen)];
        return view('v_detaildosen', $data);
    }

    public function edit($id_dosen){
        if(!$this->m_dosen->detailData($id_dosen))
        {abort(404);}
        $data = ['dosen' => $this->m_dosen->detailData($id_dosen)];
        return view('v_editdosen', $data);
    }

    public function delete($id_dosen){
        if(!$this->m_dosen->detailData($id_dosen))
        {abort(404);}
        $dosen = $this->m_dosen->detailData($id_dosen);
        $this->m_dosen->deleteData($id_dosen);
        return redirect()->route('dosen')->with('pesan', 'Data berhasil dihapus !');
    }

    public function insert(){

        // validasi form
        Request()->validate([
            'nip' => 'required|unique:tb_dosen,nip|min:17|max:18',
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => 'required|mimes:jpg,jpeg,png,bmp|max:10240',
        ],[
            'nip.required' => 'NIP wajib diisi !',
            'nip.unique' => 'NIP ini sudah terdaftar di database !',
            'nip.min' => 'NIP minimal 17 karakter',
            'nip.max' => 'NIP maksimal 18 karakter',
            'nama_dosen.required' => 'Nama Dosen Wajib diisi !',
            'mata_kuliah.required' => 'Nama Mata Kuliah wajib diisi !',
            'foto_dosen.requirede' => 'Foto Dosen Wajib diisi !'
        ]);

        // upload gambar
        $file = Request()->foto_dosen;
        $fileName = request()->nip .'.'. $file->extension();
        $file->move(public_path('assets/foto_dosen'),$fileName);

        $data = [
            'nip' => request()->nip,
            'nama_dosen' => request()->nama_dosen,
            'mata_kuliah' => request()->mata_kuliah,
            'foto_dosen' => $fileName,
        ];
        $this->m_dosen->addData($data);
        return redirect()->route('dosen')->with('pesan', 'Data berhasil ditambahkan !');
    }

    public function update($id_dosen){
        
        // validasi form
        Request()->validate([
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => '|mimes:jpg,jpeg,png,bmp|max:10240',
        ],[
            'nama_dosen.required' => 'Nama Dosen Wajib diisi !',
            'mata_kuliah.required' => 'Nama Mata Kuliah wajib diisi !',
        ]);

        // upload gambar
        if (request()->foto_dosen != ""){
            $file = Request()->foto_dosen;
            $fileName = request()->nip .'.'. $file->extension();
            $file->move(public_path('assets/foto_dosen'),$fileName);

            $data = [
                'nip' => request()->nip,
                'nama_dosen' => request()->nama_dosen,
                'mata_kuliah' => request()->mata_kuliah,
                'foto_dosen' => $fileName,
            ];
            $this->m_dosen->editData($id_dosen, $data);
        }
        else {
            $data = [
                'nip' => request()->nip,
                'nama_dosen' => request()->nama_dosen,
                'mata_kuliah' => request()->mata_kuliah,
            ];
            $this->m_dosen->editData($id_dosen, $data);
        }
        return redirect()->route('dosen')->with('pesan', 'Data berhasil diedit !');
    }

}
