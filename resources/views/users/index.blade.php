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
                      <th style="width: 15%">
                          Image
                      </th>
                      <th style="width: 15%">
                        Permission
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
                  
                        @if($user->Avatar !==null)
                        <img alt="{{ $user->Avatar }}" style="width:100px;height:100px ; "  src="{{ URL("assets/images/avatar/$user->Avatar") }}">
                        @else 
                        <img alt="{{ $user->Avatar }}" style="width:100px;height:100px ; "  src="{{ URL("assets/images/avatar/default.jpg") }}">
                        @endif

                      </td>
                      <td class="project_progress">
                        @if ( $user->UserType_id == 1)
                        <span>Administrator</span>
                        @else
                        <span>Member</span>
                        @endif
                        
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

                          @if($user->Status==1)
                          <a class="btn btn-danger btn-sm" href="/users/block/{{ $user->id }}">
                              <i class="fas fa-trash">
                              </i>
                              Block
                          </a>
                          @else
                          <a class="btn btn-success btn-sm" href="/users/unblock/{{ $user->id }}">
                            <i class="fas fa-refresh">
                            </i>
                            Unblock
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