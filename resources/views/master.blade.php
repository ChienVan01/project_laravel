<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('component/header')
</head><!--/head-->

<body  class="hold-transition sidebar-mini">
    <div class="wrapper">
    @include('component/navbar')
	<!--/header-->
    @include('component/sidebar')
	<!--/slider-->
	@yield('content')
	@include('component/footer')
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
    </div>
</body>
</html>