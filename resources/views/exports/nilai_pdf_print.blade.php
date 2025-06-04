<!DOCTYPE html>
<html>
<head>
  <title>Data Nilai</title>
  <style>
    body { font-family: sans-serif; font-size: 12px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #000; padding: 6px; text-align: left; }
  </style>
</head>
<body>
  <h3>Data Nilai</h3>
  <p>Tanggal Cetak: {{ $tanggal }}</p>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Dosen</th>
        <th>Matakuliah</th>
        <th>Semester</th>
        <th>Tahun Akademik</th>
        <th>Program Studi</th>
        <th>Jurusan</th>
        <th>Lain-lain (%)</th>
        <th>UTS (%)</th>
        <th>UAS (%)</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1 ;?>
      @foreach ($data as $item)
      <tr>
        <td >{{ $no++ }}</td>
        <td>{{ $item->dosen->nama_dosen }}</td>
        <td>{{ $item->matakuliah->nama_matakuliah }}</td>
        <td>{{ $item->matakuliah->semester->semester }}</td>
        <td>{{ $item->tahun_akademik->tahun_akademik }}</td>
        <td>{{ $item->matakuliah->prodi->nama_prodi }}</td>
        <td>{{ $item->matakuliah->prodi->jurusan->nama_jurusan}}</td>
        <td>{{ $item->komposisi_nilai_lain }} %</td>
        <td>{{ $item->komposisi_nilai_uts }} %</td>
        <td>{{ $item->komposisi_nilai_uas }} %</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
