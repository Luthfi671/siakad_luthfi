@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Nilai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Form Edit Nilai</li>
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
                <h3 class="card-title">Edit Nilai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/nilai/update/{{$nilai->id_nilai}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  
                  <!-- select -->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Dosen</label>
                    <select class="form-control" id="nidn" name="nidn">
                      <option selected value="{{ $nilai->nidn }}" hidden>{{ $nilai->dosen->nama_dosen }}</option>
                      @foreach ($dosen as $data1)
                      <option value="{{ $data1->nidn }}">{{ $data1->nama_dosen }}</option>
                      @endforeach
                    </select>
                    <div class="text-danger">
                      @error('nidn')
                      {{$message}}
                      @enderror
                    </div>
                  </div>

                  <!-- select -->
                  <div class="form-group">
                    <label>Matakuliah</label>
                    <select class="form-control" id="id_matakuliah" name="id_matakuliah">
                      <option selected value="{{ $nilai->id_matakuliah }}" hidden>{{ $nilai->matakuliah->nama_matakuliah }}</option>
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
                    <label>Tahun Akademik</label>
                    <select class="form-control" id="id_tahun_akademik" name="id_tahun_akademik">
                      <option selected value="{{ $nilai->id_tahun_akademik }}" hidden>{{ $nilai->tahun_akademik->tahun_akademik }}</option>
                      @foreach ($tahun_akademik as $data1)
                      <option value="{{ $data1->id_tahun_akademik }}">{{ $data1->tahun_akademik }}</option>
                      @endforeach
                    </select>
                    @error('id_tahun_akademik')
                    {{$message}}
                    @enderror
                  </div>

                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Komposisi Nilai Lain-lain %</label>
                    <input type="number" name="komposisi_nilai_lain" value="{{ $nilai->komposisi_nilai_lain }}" class="form-control" placeholder="Komposisi Nilai Lain-lain %">
                    <div class="text-danger">
                      @error('komposisi_nilai_lain')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Komposisi Nilai UTS %</label>
                    <input type="number" name="komposisi_nilai_uts" value="{{ $nilai->komposisi_nilai_uts }}" class="form-control" placeholder="Komposisi Nilai UTS %">
                    <div class="text-danger">
                      @error('komposisi_nilai_uts')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Komposisi Nilai UAS %</label>
                    <input type="number" name="komposisi_nilai_uas" value="{{ $nilai->komposisi_nilai_uas }}" class="form-control" placeholder="Komposisi Nilai UAS %">
                    <div class="text-danger">
                      @error('komposisi_nilai_uas')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  @if ($errors->has('total_komposisi'))
                    <div class="alert alert-danger">
                      {{ $errors->first('total_komposisi') }}
                    </div>
                  @endif

                <div class="card-footer">
                  <a href="/admin/nilai" class="btn btn-primary">Kembali</a>
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