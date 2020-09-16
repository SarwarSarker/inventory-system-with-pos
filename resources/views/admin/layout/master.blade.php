<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Max Grocery Shop</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}"
 
  @include('admin.partials.style')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.partials.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
 
  @yield('content')
  <!-- /.content-wrapper -->

  <footer class="main-footer">
  
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.partials.script')

</body>
</html>
