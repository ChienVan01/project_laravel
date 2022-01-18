@extends('master')
@section('title', 'Mã Giảm Giá')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh Sách Mã Giảm Giá</h1>
            {{-- <a class="btn btn-primary" type="button" href="/products/create">Thêm Sản Phẩm</a> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{ route('/') }}>Trang Chủ</a></li>
              <li class="breadcrumb-item active">Danh Sách Mã Giảm Giá</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
      {{-- @else <p>fail</p> --}}
     @endif

      <!-- Default box -->
      <div class="card">
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                            Name
                      </th>
                      <th style="width: 15%">
                          Image
                      </th>
                      <th style="width: 15%">
                        Expiry Date
                    </th>
                      <th>
                         Owner
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($vouchers as $voucher)  
                  <tr>
                      <td>
                         {{ $voucher->id }}
                      </td>
                      <td>
                          <a>
                              {{-- {{dd($product)}} --}}
                            {{ $voucher->Name }}
                          </a>
                          <br/>                
                      </td>
                      
                      <td>
                          {{-- <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                              </li>
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                              </li>
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                              </li>
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                              </li>
                          </ul> --}}
                          <img alt="#" class="table-avatar" src="../../dist/img/avatar.png">
                      </td>
                      <td>
                        <a>
                          {{-- {{dd($product)}} --}}
                        {{ $voucher->EXD }}
                      </a>
                      <br/>  
                      </td>
                      <td class="project_progress">
                        @foreach ($users as $user)
                           @if($voucher->User_id == $user->id)
                            <span>{{ $user->Email }}</span>
                          @endif
                        @endforeach
                       
                      </td>
                      <td class="project-state">
                        @if($voucher->Status == 1)
                            <span class="badge badge-success">Active</span>
                        @else 
                            <span class="badge badge-danger">Deactive</span>
                        @endif
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="/vouchers/detail/{{ $voucher->id }}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="/vouchers/edit/{{ $voucher->id }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          @if ($voucher->Status==1)
                          <a class="btn btn-danger btn-sm" href="/vouchers/delete/{{ $voucher->id }}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                        @else
                        <a class="btn btn-success btn-sm" href="/vouchers/restore/{{ $voucher->id }}">
                          <i class="fas fa-refresh">
                          </i>
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