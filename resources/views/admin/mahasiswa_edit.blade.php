@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Form Edit Mahasiswa</li>
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
                <h3 class="card-title">Edit Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/mahasiswa/update/{{$mahasiswa->nim}}" method="POST" enctype="multipart/form-data">
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

                    <!-- select -->
                  <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" id="id_jurusan" name="id_jurusan" placeholder="Jurusan">
                      <option selected hidden value="{{ $mahasiswa->jurusan->id_jurusan }}">{{ $mahasiswa->jurusan->nama_jurusan }}</option>
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
                    <select class="form-control" id="id_prodi" name="id_prodi" placeholder="Program Studi">
                      <option selected hidden value="{{ $mahasiswa->prodi->id_prodi }}">{{ $mahasiswa->prodi->nama_prodi }}</option>
                      @foreach ($prodi as $data3)
                      <option value="{{ $data3->id_prodi }}">{{ $data3->nama_prodi }}</option>
                      @endforeach
                    </select>
                    @error('id_prodi')
                    {{$message}}
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Tempat, Tanggal Lahir</label>
                    <input type="text" name="ttl" class="form-control" value="{{ $mahasiswa->ttl }}" placeholder="Tempat, Tanggal Lahir">
                    <div class="text-danger">
                      @error('ttl')
                      {{$message}}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $mahasiswa->alamat }}" placeholder="Alamat">
                    <div class="text-danger">
                      @error('alamat')
                      {{$message}}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Agama</label>
                    <input type="text" name="agama" class="form-control" value="{{ $mahasiswa->agama }}" placeholder="Agama">
                    <div class="text-danger">
                      @error('agama')
                      {{$message}}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Tingkat</label>
                    <input type="text" name="tingkat" class="form-control" value="{{ $mahasiswa->tingkat }}" placeholder="Tingkat">
                    <div class="text-danger">
                      @error('tingkat')
                      {{$message}}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Semester</label>
                    <input type="text" name="semester" class="form-control" value="{{ $mahasiswa->semester }}" placeholder="Semester">
                    <div class="text-danger">
                      @error('semester')
                      {{$message}}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Nomor Handphone</label>
                    <input type="text" name="nomor_handphone" class="form-control" value="{{ $mahasiswa->nomor_handphone }}" placeholder="Nomor Handphone">
                    <div class="text-danger">
                      @error('nomor_handphone')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto_mahasiswa" class="custom-file-input" id="exampleInputFile">{{ $mahasiswa->foto_mahasiswa }}
                        <label class="custom-file-label" for="exampleInputFile">{{ $mahasiswa->foto_mahasiswa }}</label>
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
                  <a href="/admin/mahasiswa" class="btn btn-primary">Kembali</a>
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