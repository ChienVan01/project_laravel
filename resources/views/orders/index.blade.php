@extends('master')
@section('title', 'Hóa Đơn')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
    <div class="group-tabs">
      <!-- Nav tabs -->
      <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-unconfirmed-tab" data-toggle="tab" href="#unconfirmed" role="tab" aria-controls="nav-unpaid" aria-selected="true">Chờ Xác Nhận</a>
            <a class="nav-item nav-link" id="nav-confirmed-tab" data-toggle="tab" href="#confirmed" role="tab" aria-controls="nav-confirmed" aria-selected="false">Đã Xác Nhận</a>
            <a class="nav-item nav-link" id="nav-cancelled-tab" data-toggle="tab" href="#cancelled" role="tab" aria-controls="nav-cancelled" aria-selected="false">Đã Hủy</a>
            <a class="nav-item nav-link" id="nav-completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="nav-completed" aria-selected="false">Đã Hoàn Thành</a>
        </div>
    </nav>

      <!-- Tab panes -->
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="unconfirmed">
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
                            
                            <th style="width: 20%">
                              Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                        @if($order->OrderStatus_id==1)             
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
                            <a class="btn btn-info btn-sm" href="/orders/check/{{ $order->id }}">
                              <i class="fas fa-check-circle"></i>
                                Check
                            </a>
                            </td>
                          </tr>
                        @endif
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

        <div role="tabpanel" class="tab-pane" id="confirmed">
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
                           
                            <th style="width: 20%">
                              Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                        @if($order->OrderStatus_id==2)             
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
                           
                            <td class="project-actions">
                      
                              <a class="btn btn-primary btn-sm" href="/orders/detail/{{ $order->id }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                          
                            </td>
                          </tr>
                        @endif
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

        <div role="tabpanel" class="tab-pane" id="cancelled">
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
                              
                              <th style="width: 20%">
                                Action
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $order)
                          @if($order->OrderStatus_id==3)             
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
                             
                              <td class="project-actions">
                                
                                <a class="btn btn-primary btn-sm" href="/orders/detail/{{ $order->id }}">
                                  <i class="fas fa-folder">
                                  </i>
                                  View
                              </a>
                              
                              </td>
                            </tr>
                          @endif
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
        <div role="tabpanel" class="tab-pane" id="completed">
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
                          
                            <th style="width: 20%">
                              Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                        @if($order->OrderStatus_id==4)             
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
                            
                            <td class="project-actions">
                            
                              <a class="btn btn-primary btn-sm" href="/orders/detail/{{ $order->id }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            
                            </td>
                          </tr>
                        @endif
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
      </div>
    </div>
    <!-- Content Header (Page header) -->
 

   
  </div>
  <!-- /.content-wrapper -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection