@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nilai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Nilai</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Nilai</h3>
                
                <a href="/admin/nilai/add" class="btn btn-primary" style="float: right;"><b>ADD</b></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Dosen</th>
                      <th>matakuliah</th>
                      <th>Semester</th>
                      <th>Tahun Akademik</th>
                      <th>Program Studi</th>
                      <th>Jurusan</th>
                      <th>Komposisi Nilai Lain-lain (%)</th>
                      <th>Komposisi Nilai UTS (%)</th>
                      <th>Komposisi Nilai UAS (%)</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1 ;?>
                    @foreach ($nilai as $data)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $data->dosen->nama_dosen }}</td>
                      <td>{{ $data->matakuliah->nama_matakuliah }}</td>
                      <td>{{ $data->matakuliah->semester->nama_semester }}</td>
                      <td>{{ $data->tahun_akademik->tahun_akademik }}</td>
                      <td>{{ $data->matakuliah->prodi->nama_prodi }}</td>
                      <td>{{ $data->matakuliah->prodi->jurusan->nama_jurusan}}</td>
                      <td>{{ $data->komposisi_nilai_lain }} %</td>
                      <td>{{ $data->komposisi_nilai_uts }} %</td>
                      <td>{{ $data->komposisi_nilai_uas }} %</td>
                      <td style="display:flex; flex-direction: column; gap:2px; border:none;">
                          <a href="/admin/nilai/detail/{{ $data->id_nilai }}" class="btn btn-success">Rincian Data Nilai</a>
                          <a href="/admin/nilai/edit/{{ $data->id_nilai }}" class="btn btn-warning">Edit</a>
                          <a href="/admin/nilai/delete/{{ $data->id_nilai }}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id_nilai}}">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
<div class="modal fade" id="delete{{$data->id_nilai}}">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">{{$data->dosen->nama_dosen}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <span>ID : {{$data->id_nilai}}</span> <br>
      <span>Matakuliah : {{$data->matakuliah->nama_matakuliah}}</span>
        <p>Apakah anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <a href="/admin/nilai/delete/{{ $data->id_nilai }}" type="button" class="btn btn-outline-light">Delete</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

@endsection