@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dosen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Kelola Dosen</li>
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
                <h3 class="card-title">Tabel Dosen</h3>
                
                <a href="/admin/dosen/add" class="btn btn-primary" style="float: right;"><b>ADD</b></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIDN</th>
                      <th>Bidang</th>
                      <th>Nama</th>
                      <th>Foto</th>
                      <th>Prodi</th>
                      <th>Jurusan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1 ;?>
                    @foreach ($dosen as $data)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $data->nidn }}</td>
                      <td>{{ $data->bidang_keahlian }}</td>
                      <td>{{ $data->nama_dosen }}</td>
                      <td><img src="{{ url('assets/foto_dosen/' . $data->foto_dosen) }}" alt="" width="100px"></td>
                      <td>{{ $data->prodi->nama_prodi }}</td>
                      <td>{{ $data->jurusan->nama_jurusan }}</td>
                      <td style="display:flex; gap:2px; border:none;">
                          <a href="/admin/dosen/detail/{{ $data->nidn }}" class="btn btn-success">Detail</a>
                          <a href="/admin/dosen/edit/{{ $data->nidn }}" class="btn btn-warning">Edit</a>
                          <a href="/admin/dosen/delete/{{ $data->nidn }}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->nidn}}">Delete</a>
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

@foreach ($dosen as $data)
<!-- modal pop up danger -->
<div class="modal fade" id="delete{{$data->nidn}}">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">{{$data->nama_dosen}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>NIDN : {{$data->nidn}}</span>
        <p>Apakah anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <a href="/admin/dosen/delete/{{ $data->nidn }}" type="button" class="btn btn-outline-light">Delete</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

@endsection