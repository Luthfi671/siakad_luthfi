@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Tambah Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
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
                <h3 class="card-title">Tambah Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/mahasiswa/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIM</label>
                    <input type="text" name="nim" class="form-control" placeholder="NIM">
                    <div class="text-danger">
                      @error('nim')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Mahasiswa</label>
                    <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama Mahasiswa">
                    <div class="text-danger">
                      @error('nama_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jurusan</label>
                    <input type="text" name="jurusan_mahasiswa" class="form-control" placeholder="Jurusan">
                    <div class="text-danger">
                      @error('jurusan_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Prodi</label>
                    <input type="text" name="prodi_mahasiswa" class="form-control" placeholder="Prodi">
                    <div class="text-danger">
                      @error('prodi_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tempat Tanggal Lahir</label>
                    <input type="text" name="ttl_mahasiswa" class="form-control" placeholder="Tempat Tanggal Lahir">
                    <div class="text-danger">
                      @error('ttl_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" name="alamat_mahasiswa" class="form-control" placeholder="Alamat">
                    <div class="text-danger">
                      @error('alamat_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Agama</label>
                    <input type="text" name="agama_mahasiswa" class="form-control" placeholder="Agama">
                    <div class="text-danger">
                      @error('agama_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tingkat</label>
                    <input type="text" name="tingkat_mahasiswa" class="form-control" placeholder="Tingkat">
                    <div class="text-danger">
                      @error('tingkat_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Semester</label>
                    <input type="text" name="semester_mahasiswa" class="form-control" placeholder="Semester">
                    <div class="text-danger">
                      @error('semester_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">No Handphone</label>
                    <input type="text" name="nomor_handphone_mahasiswa" class="form-control" placeholder="No Handphone">
                    <div class="text-danger">
                      @error('nomor_handphone_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto_mahasiswa" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    <div class="text-danger">
                      @error('foto_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="/mahasiswa" class="btn btn-primary">Kembali</a>
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