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
          <h1>Hóa Đơn </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Hóa Đơn</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">
                #
              </th>
              <th style="width: 19%">
                User Name
              </th>
              <th style="width: 15%">
                Payment Method
              </th>
              <th style="width: 15%">
                Total Price
              </th>
              <th style="width: 15%">
                Time Buy
              </th>
              <th style="width: 15%" class="text-center">
                Order Status
              </th>
              <th style="width: 20%">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)

            <tr>
              <td>
                {{ $order->id }}
              </td>
              <td>
                <a>
                  {{ DB::table('users')->where('id',$order->User_id )->value('Name'); }}
                </a>
              </td>
              <td>
                {{ DB::table('payments')->where('id',$order->Payment_id )->value('Name'); }}
              </td>
              <td>
                {{number_format($order->TotalPrice , 0, '', '.')  }} VND
              </td>
              <td>
                {{ $order->TimeBuy }}
              </td>
              <td class="project-state">
                @if ($order->Status == 1)
                <span class="badge badge-success">Active</span>
                @else
                <span class="badge badge-danger">Deactive</span>
                @endif

              </td>
              <td class="project-actions">
                @if($order->Status==1)
                <a class="btn btn-danger btn-sm" href="/orders/delete/{{ $order->id }}">
                  <i class="fas fa-trash">
                  </i>
                  Delete
                </a>
                @else
                <a class="btn btn-primary btn-sm" href="/orders/restore/{{ $order->id }}">
                  <i class="fas fa-trash-restore"></i>
                  </i>
                  Restore
                </a>
                @endif
                <a class="btn btn-primary btn-sm" href="/orders/detail/{{ $order->id }}">
                  <i class="fas fa-folder">
                  </i>
                  View
                </a>
                <a class="btn btn-info btn-sm" href="/orders/edit/{{ $order->id }}">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Edit
                </a>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection