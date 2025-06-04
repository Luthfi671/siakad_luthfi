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
                <a href="/admin/nilai/rincian_nilai/add/{{ $nilai->id_nilai }}" class="btn btn-warning ml-2 text-sm" style="float: right;"><b>Print Data Nilai</b></a>
                <a href="/admin/nilai/rincian_nilai/add/{{ $nilai->id_nilai }}" class="btn btn-primary ml-2 text-sm" style="float: right;"><b>Tambah Data Nilai</b></a>
                <a href="/admin/nilai" class="btn btn-primary text-sm" style="float: right;"><b>Kembali</b></a>
              </div>
            </div>
            <!-- card tabel -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Rincian Nilai</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama Mahasiswa</th>
                      <th>Nilai Lain-lain</th>
                      <th>Nilai UTS</th>
                      <th>Nilai UAS</th>
                      <th>Nilai Akhir</th>
                      <th>Grade</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1 ;?>
                    @foreach ($rincian_nilai as $data)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $data->mahasiswa->nim }}</td>
                      <td>{{ $data->mahasiswa->nama_mahasiswa }}</td>
                      <td>{{ $data->lain_lain }}</td>
                      <td>{{ $data->uts }}</td>
                      <td>{{ $data->uas }}</td>
                      <td>{{ $data->nilai_akhir }}</td>
                      <td>{{ $data->grade }}</td>
                      <td>{{ $data->status }}</td>
                      <td>{{ $data->keterangan }}</td>
                      <td style="display:flex; flex-direction: column; gap:2px; border:none;">
                          <a href="/admin/nilai/rincian_nilai/edit/{{ $data->id_detail_nilai }}/{{ $data->id_nilai }}" class="btn btn-warning p-1">Edit Nilai</a>
                          <a href="/admin/nilai/rincian_nilai/delete/{{ $data->id_detail_nilai }}/{{ $data->id_nilai }}" type="button" class="btn btn-danger p-1" data-toggle="modal" data-target="#delete{{ $data->id_detail_nilai }}">Delete Nilai</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
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

@foreach ($rincian_nilai as $data)
<!-- modal pop up danger -->
<div class="modal fade" id="delete{{ $data->id_detail_nilai }}">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">{{ $data->mahasiswa->nama_mahasiswa }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <span>ID : {{ $data->id_detail_nilai }}</span> <br>
      <span>Grade : {{ $data->grade }}</span>
        <p>Apakah anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <a href="/admin/nilai/rincian_nilai/delete/{{ $data->id_detail_nilai }}/{{ $data->id_nilai }}" type="button" class="btn btn-outline-light">Delete</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

@endsection