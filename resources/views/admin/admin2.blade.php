<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('asset/lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('asset/lte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
   @include('admin/header')
   @include('admin/sidebar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Pendaftaran</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
         
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container">
   <div class="row">
      <div class="col-5">
  <h2 class ="mt-3"><font size="6"></font></h2>
      <form method="post" action="">
      {{ csrf_field() }}
  <div class="form-row">
    <div class="col">
    <label for="first_name"> <font size="4">Nama</font></label>
    <input type="text" class="form-control" id="first_name" 
      placeholder="Masukkan Nama " name="first_name" required>
    </div>
  </div>

  <div class="form-group">
    <label for="email"><font size="4">Email</font></label>
    <input type="email" class="form-control" id="email" 
      placeholder="aresha@example.com " name="email" required>
  </div>

  <div class="form-group">
    <label for="phone"><font size="4">No telp</font></label>
    <input type="text" class="form-control" id="phone" 
      placeholder="Masukkan Telpon " name="phone" required>
  </div>

  <div class="form-group">
    <label for="tgl_lahir"><font size="4">Tgl Lahir</font></label>
    <input type="date" class="form-control" id="tgl_lahir" 
      placeholder="Masukkan Tanggal Lahir " name="tgl_lahir" required>
  </div>

  <div class="form-group">
  <label for="tgl_lahir"><font size="4">Jenis Kelamin :</font></label>
    <input type="radio" id="male" name="gender" value="male">
    <label for="pria"><font size="4">Pria</font></label>
    <input type="radio" id="female" name="gender" value="female">
    <label for="wanita"><font size="4">wanita</font></label>
  </div>


  <button type="submit" class="btn btn-primary">Submit </button>
</form>

      </div>
   </div>
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('admin/footer')
  
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- jQuery -->
<script src="{{asset ('asset/lte/plugins/jquery/jquery.min.js') }}" ></script>
<!-- Bootstrap 4 -->
<script src="{{asset ('asset/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset ('asset/lte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
