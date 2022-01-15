
@extends('master')
@section('title', 'Trang chủ')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Phương thức thanh toán </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payment Method</li>
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
                      <th style="width: 39%">
                        Name
                      </th>
                    
                      <th style="width: 40%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                        Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($payments as $payment)
                  <tr>
                      <td>
                          {{ $payment->id }}
                      </td>
                      <td>
                          <a>
                            {{ $payment->Name }}
                          </a>
                      </td>    
                      <td class="project-state">
                        @if ($payment->Status==1)
                        <span class="badge badge-success">Active</span>
                      @else
                        <span class="badge badge-danger">Deactive</span>
                      @endif       
                      </td>
                      <td class="project-actions">
                          @if($payment->Status==1)
                          <a class="btn btn-danger btn-sm" href="/payments/delete/{{ $payment->id }}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                          @else
                          <a class="btn btn-primary btn-sm" href="/payments/restore/{{ $payment->id }}">
                            <i class="fas fa-trash-restore"></i>
                            Restore
                        </a>
                            @endif
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

