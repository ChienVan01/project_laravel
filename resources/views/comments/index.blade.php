@extends('master')
@section('title', 'Bình Luận')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh Sách Bình Luận</h1>
            {{-- <a class="btn btn-primary" type="button" href="/products/create">Thêm Sản Phẩm</a> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{ route('/') }}>Trang Chủ</a></li>
              <li class="breadcrumb-item active">Danh Sách Bình Luận</li>
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
                          Evaluate
                      </th>
                      <th style="width: 15%">
                          Rate
                      </th>
                      <th style="width: 15%">
                        User
                        </th>
                      <th style="width: 15%">
                         Product 
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">

                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($comments as $comment)
   
                  <tr>
                      <td>
                         {{ $comment->id }}
                      </td>

                      <td>
                        {{ $comment->Evaluate }}
                     </td>

                      <td>
                          
                            @for ($i=0; $i < $comment->Rate; $i++)
                                <span><i class="fa fa-star text-warning"></i></span>                            
                            @endfor
                                      
                      </td>

                        <td class="project_progress">
                            @foreach ($users as $user)
                               @if($comment->User_id == $user->id)
                                <span>{{ $user->Email }}</span>
                              @endif
                            @endforeach                          
                          </td>
                      

                        <td class="project_progress">
                            @foreach ($products as $product)
                               @if($comment->Product_id == $product->id)
                                <span>{{ $product->Name}}</span>
                              @endif
                            @endforeach
                           
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
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
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