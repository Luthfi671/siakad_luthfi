@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Invoice</li>
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

            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="callout callout-info">
                      <h5><i class="fas fa-info"></i> Note:</h5>
                      <a href="?print=true" target="_blank" class="btn btn-warning ml-2 text-sm no-print" style="float: right;"><b>Print Data Nilai</b></a>
                      This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                    </div>
                    


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-12">
                          <h4>
                            <i class="fas fa-globe"></i> AdminLTE, Inc.
                            <small class="float-right">Date: 2/10/2014</small>
                          </h4>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          From
                          <address>
                            <strong>Admin, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            Phone: (804) 123-5432<br>
                            Email: info@almasaeedstudio.com
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          To
                          <address>
                            <strong>John Doe</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            Phone: (555) 539-1037<br>
                            Email: john.doe@example.com
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>Invoice #007612</b><br>
                          <br>
                          <b>Order ID:</b> 4F3S8J<br>
                          <b>Payment Due:</b> 2/22/2014<br>
                          <b>Account:</b> 968-34567
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table class="table table-striped">
                            <thead>
                            <tr>
                              <th>Qty</th>
                              <th>Product</th>
                              <th>Serial #</th>
                              <th>Description</th>
                              <th>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                              <td>1</td>
                              <td>Call of Duty</td>
                              <td>455-981-221</td>
                              <td>El snort testosterone trophy driving gloves handsome</td>
                              <td>$64.50</td>
                            </tr>
                            <tr>
                              <td>1</td>
                              <td>Need for Speed IV</td>
                              <td>247-925-726</td>
                              <td>Wes Anderson umami biodiesel</td>
                              <td>$50.00</td>
                            </tr>
                            <tr>
                              <td>1</td>
                              <td>Monsters DVD</td>
                              <td>735-845-642</td>
                              <td>Terry Richardson helvetica tousled street art master</td>
                              <td>$10.70</td>
                            </tr>
                            <tr>
                              <td>1</td>
                              <td>Grown Ups Blue Ray</td>
                              <td>422-568-642</td>
                              <td>Tousled lomo letterpress</td>
                              <td>$25.99</td>
                            </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <!-- /.col -->
                        <div class="col-6">
                          <p class="lead">Amount Due 2/22/2014</p>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-12">
                          <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                          <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                            Payment
                          </button>
                          <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Generate PDF
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- /.invoice -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
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
@endsection