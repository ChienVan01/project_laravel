@extends('master')
@section('title', 'Trang chủ')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Admin ShopGear</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v2</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">All Products</span>
              <span class="info-box-number">
                {{ $products }}
                items
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Product Types</span>
              <span class="info-box-number">{{ $product_type }} types</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">{{ $orders->count('id') }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Members</span>
              <span class="info-box-number">{{ $users->count('id') }} users</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>


      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->

          <!-- /.card -->
          <div class="row">


            <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Latest Members</h3>

                  <div class="card-tools">
                    <span class="badge badge-danger">{{ $users->count('id') }} members</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="users-list clearfix">

                    @foreach($users as $user)
                    <li>
                      @if($user->Avatar !==null)
                      <img alt="{{ $user->Avatar }}" style="width:100px;height:100px ; " src="{{ URL("assets/images/avatar/$user->Avatar") }}">
                      @else
                      <img alt="{{ $user->Avatar }}" style="width:100px;height:100px ; " src="{{ URL("assets/images/avatar/default.jpg") }}">
                      @endif

                      <a class="users-list-name" href="#">{{ $user->Name }}</a>
                      <span class="users-list-date">{{ $user->Phone }}</span>
                    </li>
                    @endforeach

                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href={{ route('users') }}>View All Users</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!--/.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Latest Orders</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>User</th>
                      <th>Status</th>
                      <th>Total Price</th>
                      <th>Create Invoice Day</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $order)
                    <tr>
                      <td><a href="">{{ $order->id }}</a></td>
                      <td>{{ $order->Name }}</td>
                      @if($order->OrderStatus_id == 1)
                      <td><span class="badge badge-primary">Chờ Xác Nhận</span></td>
                      @else
                      @if($order->OrderStatus_id == 2)
                      <td><span class="badge badge-info">Đã Xác Nhận</span></td>
                      @else
                      @if($order->OrderStatus_id == 3)
                      <td><span class="badge badge-success">Đã Hoàn Thành</span></td>
                      @else
                      <td><span class="badge badge-danger">Đã Hủy</span></td>
                      @endif
                      @endif
                      @endif
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $order->TotalPrice }} VNĐ</div>
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $order->created_at }}</div>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
              <a href={{ route('orders') }} class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->


        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection