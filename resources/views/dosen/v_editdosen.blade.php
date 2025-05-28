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
              <form action="/dosen/update/{{$dosen->id_dosen}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input type="text" class="form-control" placeholder="NIP" value="{{ $dosen->nip }}" disabled>
                    <input type="hidden" name="nip" value="{{ $dosen->nip }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Dosen</label>
                    <input type="text" name="nama_dosen" class="form-control" placeholder="Nama Dosen" value="{{ $dosen->nama_dosen }}">
                    <div class="text-danger">
                      @error('nama_dosen')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mata Kuliah</label>
                    <input type="text" name="mata_kuliah" class="form-control" placeholder="Nama Dosen" value="{{ $dosen->mata_kuliah }}">
                    <div class="text-danger">
                      @error('mata_kuliah')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto_dosen" class="custom-file-input" id="exampleInputFile" >
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
                      <br>
                    </div>
                    <div>
                      <img src="{{ url('assets/foto_dosen/' . $dosen->foto_dosen) }}" width="100%">
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