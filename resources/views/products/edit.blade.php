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
              <form action="{{ route('updateProduct',['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name" placeholder="Nhập tên sản phẩm" value="{{ $product->Name }}">
                  </div>
                  
                  <div class="form-group">
                    <label for="Info">Info</label>
                    <input type="text" class="form-control" name="Info" placeholder="Nhập thông tin sản phẩm" value="{{ $product->Info }}">
                  </div>
                  <div class="form-group">
                    <label for="Origin">Origin</label>
                    <input type="text" class="form-control" name="Origin" placeholder="Nhập tên thương hiệu" value="{{ $product->Origin }}">
                  </div>
                  <div class="form-group">
                    <label for="ProductType_id">Category</label>
                    <select class="form-control" name="ProductType_id">
                      <option value="{{ $product->ProductType_id }}" selected >{{ DB::table('product_types')->where('id',$product->ProductType_id )->value('Name');}}</option> 
                        @foreach($ProductType as $item)
                          @if($item->Parent_id == null){
                            <option value="{{ $item->id }}" >{{ $item->Name }}</option> 
                          }
                          @else
                          <option value="{{ $item->id }}" >--{{ $item->Name }}</option> 
                          @endif
                          

                        @endforeach 
                    </select>
                  </div> 
                  <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="text" class="form-control" name="Price" placeholder="Nhập tên thương hiệu" value="{{ $product->Price }}">
                  </div>
                  
                  <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="Status">
                      @if($product->Status == 1) 
                        <option value="1" selected>Active</option> 
                        <option value="0">Deactive</option> 
                      @else  
                        <option value="1">Active</option> 
                        <option value="0" selected>Deactive</option>
                      @endif
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Avatar">Image</label><br>
                    <img src='{{ URL('assets/images/product/'.$product->Avatar) }}' alt='{{ $product->Avatar }}'height="300" width="300"  ><br>
                    <input type="file" name="Avatar" value="{{ $product->Avatar }}"  />
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