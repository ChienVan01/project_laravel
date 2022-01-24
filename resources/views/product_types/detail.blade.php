@extends('master')
@section('title', 'Loại Sản Phẩm')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Loại Sản Phẩm</h1>
            <a class="btn btn-primary" type="button" href="/product_types/create">Thêm Loại Sản Phẩm</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{ route('/') }}>Trang Chủ</a></li>
              <li class="breadcrumb-item active">Loại Sản Phẩm</li>
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
                      <th style="width: 40%">
                            Name
                      </th>
                     
                      <th style="width: 40%" class="text-center">
                          Status
                      </th>
                      <th style="width: 19%">Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($detail  as $d)
                                      
                  <tr>
                      <td>
                       {{ $d->id }}
                      </td>
                      <td>
                          <a>
                            {{ $d->Name }}
                          </a>
                          <br/>                
                      </td>
                     
                      
                      <td class="project-state">
                        @if ($d->Status==1)
                          <span class="badge badge-success">Active</span>
                        @else
                          <span class="badge badge-danger">Deactive</span>
                        @endif                      
                      </td>
                      <td class="project-actions">
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