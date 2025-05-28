@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
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
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/mahasiswa/update/{{$mahasiswa->nim}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIM</label>
                    <input type="text" class="form-control" placeholder="NIM" value="{{ $mahasiswa->nim }}" disabled>
                    <input type="hidden" name="nim" value="{{ $mahasiswa->nim }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Mahasiswa</label>
                    <input type="text" name="nama_mahasiswa" class="form-control" value="{{ $mahasiswa->nama_mahasiswa }}" placeholder="Nama Mahasiswa">
                    <div class="text-danger">
                      @error('nama_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jurusan</label>
                    <input type="text" name="jurusan_mahasiswa" class="form-control" value="{{ $mahasiswa->jurusan_mahasiswa }}" placeholder="Jurusan">
                    <div class="text-danger">
                      @error('jurusan_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Prodi</label>
                    <input type="text" name="prodi_mahasiswa" class="form-control" value="{{ $mahasiswa->prodi_mahasiswa }}" placeholder="Prodi">
                    <div class="text-danger">
                      @error('prodi_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tempat Tanggal Lahir</label>
                    <input type="text" name="ttl_mahasiswa" class="form-control" value="{{ $mahasiswa->ttl_mahasiswa }}" placeholder="Tempat Tanggal Lahir">
                    <div class="text-danger">
                      @error('ttl_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" name="alamat_mahasiswa" class="form-control" value="{{ $mahasiswa->alamat_mahasiswa }}" placeholder="Alamat">
                    <div class="text-danger">
                      @error('alamat_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Agama</label>
                    <input type="text" name="agama_mahasiswa" class="form-control" value="{{ $mahasiswa->agama_mahasiswa }}" placeholder="Agama">
                    <div class="text-danger">
                      @error('agama_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tingkat</label>
                    <input type="text" name="tingkat_mahasiswa" class="form-control" value="{{ $mahasiswa->tingkat_mahasiswa }}" placeholder="Tingkat">
                    <div class="text-danger">
                      @error('tingkat_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Semester</label>
                    <input type="text" name="semester_mahasiswa" class="form-control" value="{{ $mahasiswa->semester_mahasiswa }}" placeholder="Semester">
                    <div class="text-danger">
                      @error('semester_mahasiswa')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">No Handphone</label>
                    <input type="text" name="nomor_handphone_mahasiswa" class="form-control" value="{{ $mahasiswa->nomor_handphone_mahasiswa }}" placeholder="No Handphone">
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
                        <input type="file" name="foto_mahasiswa" class="custom-file-input" id="exampleInputFile" >
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
                      <br>
                    </div>
                    <div>
                      <img src="{{ url('assets/foto_mahasiswa/' . $mahasiswa->foto_mahasiswa) }}" width="100%">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="/mahasiswa" class="btn btn-primary">Kembali</a>
                  <button type="submit" class="btn btn-primary" style="float: right;">Edit</button>
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
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

@endsection