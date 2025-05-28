@extends('/layout/template')

@section('barang')
<title>Barang</title>
<div class="container-fluid px-4">
    <h1 class="mt-4">HandPhone</h1>
    {{-- <a class="btn btn-danger" href="/" style="position:absolute; right:0; margin-right:30px;">Logout</a> --}}
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol> --}}
    {{-- <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
            .
        </div>
    </div> --}}
    <div class="card mb-4" style="margin-top:60px;">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>brg00001</td>
                        <td>Vivo X90 PRO</td>
                        <td>5</td>
                        <td>Rp. 4.500.000</td>
                        <td>Rp. 5.000.000</td>
                        <td><img src="{{ asset('assets/gambar/1-VivoX70Pro.jpg') }}" alt="" style="max-height: 100px"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>brg00002</td>
                        <td>Iphone 8 plus</td>
                        <td>8</td>
                        <td>Rp. 9.500.000</td>
                        <td>Rp. 10.000.000</td>
                        <td><img src="{{ asset('assets/gambar/108-899-iphone 8 plus.jpg') }}" alt="" style="max-height: 100px"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>brg00003</td>
                        <td>Iphone 12</td>
                        <td>2</td>
                        <td>Rp. 12.250.000</td>
                        <td>Rp. 14.000.000</td>
                        <td><img src="{{ asset('assets/gambar/130-iphone 12.jpg') }}" alt="" style="max-height: 100px"></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>brg00001</td>
                        <td>Xiaomi Redmi Note 11 Pro</td>
                        <td>8</td>
                        <td>Rp. 2.500.000</td>
                        <td>Rp. 3.000.000</td>
                        <td><img src="{{ asset('assets/gambar/160-xiaomi-redmi-note11-pro-.jpg') }}" alt="" style="max-height: 100px"></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>brg00001</td>
                        <td>Redmi Note 8</td>
                        <td>3</td>
                        <td>Rp. 7.500.000</td>
                        <td>Rp. 9.000.000</td>
                        <td><img src="{{ asset('assets/gambar/179-340-redmi note 8.jpg') }}" alt="" style="max-height: 100px"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<footer class="py-4 bg-light mt-auto">
<div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; Your Website 2023</div>
        <div>
            <a href="#">Privacy Policy</a>
            &middot;
            <a href="#">Terms &amp; Conditions</a>
        </div>
    </div>
</div>
</footer>
@endsection
