@extends('master')
@section('title', 'Thêm sản phẩm')
@section('content')
  
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('createProduct')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name" placeholder="Nhập tên sản phẩm">
                  </div>
                 
                  <div class="form-group">
                    <label for="Info">Info</label>
                    <input type="text" class="form-control" name="Info" placeholder="Nhập thông tin sản phẩm">
                  </div>
                  <div class="form-group">
                    <label for="Origin">Origin</label>
                    <input type="text" class="form-control" name="Origin" placeholder="Nhập tên thương hiệu">
                  </div>
                  <div class="form-group">
                    <label for="Quantity">Stock</label>
                    <input type="text" class="form-control" name="Quantity" placeholder="Nhập số lượng sản phẩm">
                  </div>
                  <div class="form-group">
                    <label for="ProductType_id">Chọn Loại Sản Phẩm</label>
                    <select class="form-control" name="ProductType_id" required>
                      <option value="">Vui lòng chọn loại sản phẩm </option>
                      @foreach($product_types as $product_type)
                          <option value="{{ $product_type->id }}"> {{ $product_type->Name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="text" class="form-control" name="Price" placeholder="Nhập giá sản phẩm" >
                  </div>
                  <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="Status">
                        <option value="1" selected>Active</option> 
                        <option value="0">Deactive</option> 
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Avatar">Avatar</label>    
                    <input type="file"  name="Avatar" class="form-control">
                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
           

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection