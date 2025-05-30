@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rincian Nilai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nilai</a></li>
              <li class="breadcrumb-item active">Rincian Nilai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- card detail -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Nilai Perkuliahan</h3>
                
              </div>
              <div class="card-body">
                <div class="d-flex flex-row w-100">
                  <div class="d-flex mr-5">
                    <div class="left mr-3">
                      <p class="mb-1">Program Studi</p>
                      <p class="mb-1">Mata Kuliah</p>
                      <p class="mb-1">Semester</p>
                      <p class="mb-1">Dosen Pengampu</p>
                    </div>
                    <div class="right">
                      <p class="mb-1">: {{ $nilai->matakuliah->prodi->nama_prodi }}</p>
                      <p class="mb-1">: {{ $nilai->matakuliah->nama_matakuliah }}</p>
                      <p class="mb-1">: {{ $nilai->matakuliah->semester->semester }}</p>
                      <p class="mb-1">: {{ $nilai->dosen->nama_dosen }}</p>
                    </div>
                  </div>
                  <div class="d-flex mr-5">
                    <div class="left mr-3">
                      <p class="mb-1">Tahun Akademi</p>
                      <p class="mb-1">Kelas</p>
                      <p class="mb-1">Jurusan</p>
                    </div>
                    <div class="right">
                      <p class="mb-1">: {{ $nilai->tahun_akademik->tahun_akademik }}</p>
                      <p class="mb-1">: {{ $nilai->matakuliah->kelas->nama_kelas }}</p>
                      <p class="mb-1">: {{ $nilai->matakuliah->prodi->jurusan->nama_jurusan}}</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-header">
                <h3 class="card-title">Tambah Rincian Nilai</h3>
              </div>
              <form action="/admin/nilai/rincian_nilai/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Mahasiswa</label>
                    <select class="form-control" id="nidn" name="nidn">
                      <option selected hidden>Pilih Mahasiswa</option>
                      @foreach ($mhs as $data)
                      <option value="{{ $data->nim }}">{{ $data->nama_mahasiswa }}</option>
                      @endforeach
                    </select>
                    <div class="text-danger">
                      @error('nim')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nilai Lain-lain ({{ $nilai->komposisi_nilai_lain }}%)</label>
                    <input type="number" name="lain_lain" class="form-control" placeholder="Nilai Lain-lain">
                    <div class="text-danger">
                      @error('lain_lain')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nilai UTS ({{ $nilai->komposisi_nilai_uts }}%)</label>
                    <input type="number" name="uts" class="form-control" placeholder="Nilai UTS">
                    <div class="text-danger">
                      @error('uts')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nilai UAS ({{ $nilai->komposisi_nilai_uas }}%)</label>
                    <input type="number" name="uas" class="form-control" placeholder="Nilai UAS">
                    <div class="text-danger">
                      @error('uas')
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                  @if ($errors->has('total_komposisi'))
                    <div class="alert alert-danger">
                      {{ $errors->first('total_komposisi') }}
                    </div>
                  @endif

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="/admin/nilai" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-primary" style="float: right;">Tambah</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@foreach ($nilai as $data)
<!-- modal pop up danger -->
<div class="modal fade" id="delete">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <span>ID : </span> <br>
      <span>Matakuliah : </span>
        <p>Apakah anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <a href="/admin/nilai/delete/" type="button" class="btn btn-outline-light">Delete</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

@endsection