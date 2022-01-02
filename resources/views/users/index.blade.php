@extends('master')
@section('title', 'Người Dùng')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh Sách Người Dùng</h1>
            {{-- <a class="btn btn-primary" type="button" href="/products/create">Thêm Sản Phẩm</a> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{ route('/') }}>Trang Chủ</a></li>
              <li class="breadcrumb-item active">Danh Sách Người Dùng</li>
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
                      <th style="width: 30%">
                          Image
                      </th>
                      <th>
                         Email
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                 @foreach ($users as $user)
                                      
                  <tr>
                      <td>
                         {{ $user->id }}
                      </td>
                      <td>
                          <a>
                              {{-- {{dd($product)}} --}}
                              {{ $user->Name }}
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
                          <img alt="{{ $user->Avatar }}" class="table-avatar" src="../../dist/img/avatar.png">
                      </td>
                      <td class="project_progress">
                       <span>{{ $user->Email }}</span>
                      </td>
                      <td class="project-state">
                        @if ($user->Status==1)
                          <span class="badge badge-success">Active</span>
                        @else
                          <span class="badge badge-danger">Deactive</span>
                        @endif                      
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>

                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Block
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