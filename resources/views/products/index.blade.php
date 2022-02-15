@extends('master')
@section('title', 'Sản Phẩm')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh Sách Sản Phẩm</h1>
          <a class="btn btn-primary" type="button" href="/products/create">Thêm Sản Phẩm</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{ route('/') }}>Trang Chủ</a></li>
            <li class="breadcrumb-item active">Danh Sách Sản Phẩm</li>
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
                Stock
              </th>
              <th>
                Price
              </th>
              <th style="width: 8%" class="text-center">
                Status
              </th>
              <th style="width: 20%">
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td>
                {{ $product->id }}
              </td>
              <td>
                <a>
                  {{-- {{dd($product)}} --}}
                  {{ $product->Name }}
                </a>
                <br />
              </td>
              <td>
                <img alt="{{ $product->Avatar }}" class="" style="width:100px;height:100px ; " src="{{ URL("assets/images/product/$product->Avatar") }}">
              </td>
              <td>
                {{ $product->Quantity }}
              </td>
              <td class="project_progress">
                <span>{{ number_format($product->Price) }} VND</span>
              </td>
              <td class="project-state">
                @if($product->Status == 1)
                <span class="badge badge-success">Active</span>
                @else
                <span class="badge badge-danger">Deactive</span>
                @endif
              </td>
              <td class="project-actions text-right">
                <a class="btn btn-primary btn-sm" href="/products/detail/{{ $product->id }}">
                  <i class="fas fa-folder">
                  </i>
                  View
                </a>
                <a class="btn btn-info btn-sm" href="/products/edit/{{ $product->id }}">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Edit
                </a>
                @if($product->Status==1)
                <a class="btn btn-danger btn-sm" href="/products/delete/{{ $product->id }}">
                  <i class="fas fa-trash">
                  </i>
                  Delete
                </a>
                @else
                <a class="btn btn-warning btn-sm" href="/products/restore/{{ $product->id }}">
                  <i class="fas fa-trash-restore"></i>
                  </i>
                  Restore
                </a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>

        </table>
        {{ $products->links() }}
      </div>

      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
{{-- {{ $products->links() }} --}}
<!-- /.content-wrapper -->

@endsection