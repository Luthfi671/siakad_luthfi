@extends('layout/v_template')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Detail Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ url('assets/foto_mahasiswa/' . $mahasiswa->foto_mahasiswa) }}" >
                </div>

                <h3 class="profile-username text-center">{{ $mahasiswa->nama_mahasiswa }}</h3>

                <p class="text-muted text-center">{{ $mahasiswa->nim }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Jurusan</b> <a class="float-right">{{ $mahasiswa->jurusan->nama_jurusan }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Program Studi</b> <a class="float-right">{{ $mahasiswa->prodi->nama_prodi }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Tempat, Tanggal Lahir</b> <a class="float-right">{{ $mahasiswa->ttl }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right">{{ $mahasiswa->alamat }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Agama</b> <a class="float-right">{{ $mahasiswa->agama }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Tingkat</b> <a class="float-right">{{ $mahasiswa->tingkat }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Semester</b> <a class="float-right">{{ $mahasiswa->semester }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Nomor Handphone</b> <a class="float-right">{{ $mahasiswa->nomor_handphone }}</a>
                  </li>
                </ul>
                <a href="/admin/mahasiswa" class="btn btn-primary btn-block"><b>Kembali</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    
@endsection