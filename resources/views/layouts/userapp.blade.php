<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Online Lecture Scheduling</title>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/">Online Lecture Scheduling</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="dropdown-item" href="#"
                data-toggle="modal" data-target="#logoutModal">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      </li>
    </ul>
  </nav>
  <div id="wrapper">

  
    <ul class="sidebar navbar-nav">
      {{--  <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>  --}}
      <li class="nav-item dropdown">
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ route('schedules.index') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>schedule Batch</span></a>
      </li>
     

    </ul>


 @yield('content')
   <!-- Bootstrap core JavaScript-->
   @yield('js')
   <script src="/vendor/jquery/jquery.min.js"></script>
   <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Page level plugin JavaScript-->
   <script src="/vendor/chart.js/Chart.min.js"></script>
   <script src="/vendor/datatables/jquery.dataTables.js"></script>
   <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="/js/sb-admin.min.js"></script>

   <!-- Demo scripts for this page-->
   <script src="/js/demo/datatables-demo.js"></script>
   <script src="/js/demo/chart-area-demo.js"></script>

 </body>

 </html>
