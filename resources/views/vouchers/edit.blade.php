@extends('master')
@section('title', 'Cập nhật sản phẩm')
@section('content')
  
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row  d-flex justify-content-center">

            <div class="card card-primary w-50">
              <div class="card-header">
                <h3 class="card-title">Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('updateVoucher',['id' => $voucher->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name" placeholder="Nhập tiêu đề mới" value="{{ $voucher->Name }}">
                  </div>
                  <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="Status">
                      @if($voucher->Status == 1) 
                        <option value="1" selected>Active</option> 
                        <option value="0">Deactive</option> 
                      @else  
                        <option value="1">Active</option> 
                        <option value="0" selected>Deactive</option>
                      @endif
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Content">Content</label>
                    <input type="text" class="form-control" name="Content" placeholder="Nhập thông tin mã giảm giá" value="{{ $voucher->Content }}">
                  </div>

                  <div class="form-group">
                    <label for="EXD">EXD</label>
                    <input class="date form-control" type="text" name="EXD" value="{{ $voucher->EXD }}">
                </div>
                  
                <script type="text/javascript">
                    $('.date').datepicker({  
                       format: 'yyyy-mm-dd 23:59:59'
                     });  
                </script> 

                  <div class="form-group">
                    <label for="Quantity">Quantity</label>
                    <input type="text" class="form-control" name="Quantity" placeholder="Nhập số lượng" value="{{ $voucher->Quantity }}">
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
           <script>
             $('.datepicker').datepicker();
           </script>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection