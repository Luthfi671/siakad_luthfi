@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Mahasiswa</li>
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
                <h3 class="card-title">Tabel Mahasiswa</h3>
                
                <a href="/admin/mahasiswa/add" class="btn btn-primary" style="float: right;"><b>ADD</b></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Jurusan</th>
                      <th>Prodi</th>
                      <th>Semester</th>
                      <th>Foto</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1 ;?>
                    @foreach ($mahasiswa as $data)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $data->nim }}</td>
                      <td>{{ $data->nama_mahasiswa }}</td>
                      <td>{{ $data->jurusan->nama_jurusan }}</td>
                      <td>{{ $data->prodi->nama_prodi }}</td>
                      <td>{{ $data->semester }}</td>
                      <td><img src="{{ url('assets/foto_mahasiswa/' . $data->foto_mahasiswa) }}" alt="" width="100px"></td>
                      <td style="display:flex; gap:2px; border:none;">
                          <a href="/admin/mahasiswa/detail/{{ $data->nim }}" class="btn btn-success">Detail</a>
                          <a href="/admin/mahasiswa/edit/{{ $data->nim }}" class="btn btn-warning">Edit</a>
                          <a href="/admin/mahasiswa/delete/{{ $data->nim }}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->nim}}">Delete</a>
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

@foreach ($mahasiswa as $data)
<!-- modal pop up danger -->
<div class="modal fade" id="delete{{$data->nim}}">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">{{$data->nama_mahasiswa}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>NIM : {{$data->nim}}</span>
        <p>Apakah anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <a href="/admin/mahasiswa/delete/{{ $data->nim }}" type="button" class="btn btn-outline-light">Delete</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

@endsection