@extends('master')
@section('title', 'Hóa Đơn')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>

            
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <img src="{{ URL('assets/images/logo_chu_s.png') }}" alt="AdminLTE Logo" class="brand-image" style="width:20px"> ShopGear
                    <small class="float-right">Date: {{ $order->TimeBuy }}  </small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <!-- /.col -->
                <div class="col-sm-12 invoice-col">
                  To
                  <address>
                    <strong> {{ DB::table('users')->where('id',$order->User_id )->value('Name'); }}  </strong><br>
                    {{ DB::table('users')->where('id',$order->User_id )->value('Address'); }}<br>
                    Phone:  {{ DB::table('users')->where('id',$order->User_id )->value('Phone');}}<br>
                    Email:  {{ DB::table('users')->where('id',$order->User_id )->value('Email');}}
                  </address>
                </div>
                
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Quantity</th>
                      <th>Product</th>
                      <th>Unit Price</th>
                      <th>Payment Method</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>            
                    <tr>
                      @php
                        $total = 0;
                      @endphp
                      {{-- {{ dd($orders) }} --}}
                      @foreach ($details as $detail)
                      <td>{{ $detail->Quantity }}</td>
                      <td> {{ DB::table('products')->where('id',$detail->Product_id )->value('Name');}}</td>
                      <td>{{number_format($detail->UnitPrice , 0, '', '.')  }} VND</td>
                      <td>{{ DB::table('payments')->where('id',$order->Payment_id )->value('Name');}}</td>
                      <td>{{number_format($detail->UnitPrice * $detail->Quantity , 0, '', '.')  }} VND
                      </td>
                    </tr>
                      @php                  
                        $total += $detail->IntoMoney;
                      @endphp
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="{{ URL('template/admin/dist/img/credit/visa.png') }}" alt="Visa">
                  <img src="{{ URL('template/admin/dist/img/credit/mastercard.png') }}" alt="Mastercard">
                  <img src="{{ URL('template/admin/dist/img/credit/american-express.png') }}" alt="American Express">
                  <img src="{{ URL('template/admin/dist/img/credit/paypal2.png') }}" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{number_format($total , 0, '', '.')}} VND</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>            
                          35.000 VND
                        </td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>{{number_format($total+35000 , 0, '', '.')}} VND</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

             
              
            </div>
        
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@endsection

