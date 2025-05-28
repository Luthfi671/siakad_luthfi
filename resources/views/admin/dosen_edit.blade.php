@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Dosen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Form Edit Dosen</li>
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
                <h3 class="card-title">Edit Dosen</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/dosen/update/{{$dosen->nidn}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIDN</label>
                    <input type="text" class="form-control" placeholder="NIDN" value="{{ $dosen->nidn }}" disabled>
                    <input type="hidden" name="nidn" value="{{ $dosen->nidn }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Dosen</label>
                    <input type="text" name="nama_dosen" class="form-control" value="{{ $dosen->nama_dosen }}" placeholder="Nama Dosen">
                    <div class="text-danger">
                      @error('nama_dosen')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  
                  <!-- select -->
                  <div class="form-group">
                    <label>Bidang Keahlian</label>
                    <select class="form-control" id="bidang_keahlian" name="bidang_keahlian" placeholder="Bidang Keahlian">
                      <option selected hidden value="{{ $dosen->bidang_keahlian }}">{{ $dosen->bidang_keahlian }}</option>
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
                    <select class="form-control" id="id_matakuliah" name="id_matakuliah" placeholder="Matakuliah">
                      <option selected hidden value="{{ $dosen->matakuliah->id_matakuliah }}">{{ $dosen->matakuliah->nama_matakuliah }}</option>
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
                    <select class="form-control" id="id_jurusan" name="id_jurusan" placeholder="Jurusan">
                      <option selected hidden value="{{ $dosen->jurusan->id_jurusan }}">{{ $dosen->jurusan->nama_jurusan }}</option>
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
                      <option selected hidden value="{{ $dosen->prodi->id_prodi }}">{{ $dosen->prodi->nama_prodi }}</option>
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
                        <input type="file" name="foto_dosen" class="custom-file-input" id="exampleInputFile" value="{{ $dosen->foto_dosen }}">{{ $dosen->foto_dosen }}
                        <label class="custom-file-label" for="exampleInputFile">{{ $dosen->foto_dosen }}</label>
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
                  <a href="/admin/kelola_dosen" class="btn btn-primary">Kembali</a>
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