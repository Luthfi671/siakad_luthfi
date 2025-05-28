@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Tambah Dosen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Form Tambah Dosen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Dosen</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/dosen/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIDN</label>
                    <input type="text" name="nidn" class="form-control" placeholder="NIDN">
                    <div class="text-danger">
                      @error('nidn')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Dosen</label>
                    <input type="text" name="nama_dosen" class="form-control" placeholder="Nama Dosen">
                    <div class="text-danger">
                      @error('nama_dosen')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <!-- select -->
                  <div class="form-group">
                    <label>Bidang Keahlian</label>
                    <select class="form-control" id="bidang_keahlian" name="bidang_keahlian">
                      <option selected hidden>Pilih Bidang keahlian</option>
                      <option value="Programming">Programming</option>
                      <option value="Pendidikan">Pendidikan</option>
                      <option value="jaringan">jaringan</option>
                      <option value="Komputer">Komputer</option>
                    </select>
                    @error('bidang_keahlian')
                    {{$message}}
                    @enderror
                  </div>
                  <!-- select -->
                  <div class="form-group">
                    <label>Matakuliah</label>
                    <select class="form-control" id="id_matakuliah" name="id_matakuliah">
                      <option selected hidden>Pilih Matakuliah</option>
                      @foreach ($matakuliah as $data1)
                      <option value="{{ $data1->id_matakuliah }}">{{ $data1->nama_matakuliah }}</option>
                      @endforeach
                    </select>
                    @error('id_matakuliah')
                    {{$message}}
                    @enderror
                  </div>
                  <!-- select -->
                  <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" id="id_jurusan" name="id_jurusan">
                      <option selected hidden>Pilih jurusan</option>
                      @foreach ($jurusan as $data2)
                      <option value="{{ $data2->id_jurusan }}">{{ $data2->nama_jurusan }}</option>
                      @endforeach
                    </select>
                    @error('id_jurusan')
                    {{$message}}
                    @enderror
                  </div>
                  <!-- select -->
                  <div class="form-group">
                    <label>Program Studi</label>
                    <select class="form-control" id="id_prodi" name="id_prodi">
                      <option selected hidden>Pilih Program Studi</option>
                      @foreach ($prodi as $data3)
                      <option value="{{ $data3->id_prodi }}">{{ $data3->nama_prodi }}</option>
                      @endforeach
                    </select>
                    @error('id_prodi')
                    {{$message}}
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto_dosen" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    <div class="text-danger">
                      @error('foto_dosen')
                      {{$message}}
                      @enderror
                    </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="/admin/kelola_dosen" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-primary" style="float: right;">Tambah</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
<!-- Page specific script -->

@endsection