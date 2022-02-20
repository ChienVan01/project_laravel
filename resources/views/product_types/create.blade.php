@extends('master')
@section('title', 'Thêm loại sản phẩm')
@section('content')
  
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm loại sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm loại sản phẩm</li>
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
              <form action="{{ route('createProductType')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name" placeholder="Nhập tên loại sản phẩm">
                  </div>
                 
                  <div class="form-group">
                    <label for="Parent_id">Cate Parent</label>
                    <select class="form-control" name="Parent_id">
                      <option value="" selected >Chọn Loại Sản Phẩm Cha</option> 
                        @foreach($ProductType as $item)
                          @if($item->Parent_id == null){
                            <option value="{{ $item->id }}" >{{ $item->Name }}</option> 
                          }
                          @endif
                        @endforeach 
                    </select>
                  </div> 
                  <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="Status">
                        <option value="1" selected>Active</option> 
                        <option value="0">Deactive</option>         
                    </select>
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