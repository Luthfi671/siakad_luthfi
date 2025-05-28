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
              <li class="breadcrumb-item active">Detail Dosen</li>
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
                       src="{{ url('assets/foto_dosen/' . $dosen->foto_dosen) }}" >
                </div>

                <h3 class="profile-username text-center">{{ $dosen->nama_dosen }}</h3>

                <p class="text-muted text-center">{{ $dosen->nidn }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Bidang Keahlian</b> <a class="float-right">{{ $dosen->bidang_keahlian }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Jurusan</b> <a class="float-right">{{ $dosen->jurusan->nama_jurusan }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Program Studi</b> <a class="float-right">{{ $dosen->prodi->nama_prodi }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Matakuliah</b> <a class="float-right">{{ $dosen->matakuliah->nama_matakuliah }}</a>
                  </li>
                </ul>
                <a href="/admin/kelola_dosen" class="btn btn-primary btn-block"><b>Kembali</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    
@endsection