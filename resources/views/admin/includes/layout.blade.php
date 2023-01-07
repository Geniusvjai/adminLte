<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin-asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('admin-asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admin-asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('admin-asset/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin-asset/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin-asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('admin-asset/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('admin-asset/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        label.error {
             color: #dc3545;
             font-size: 14px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ Route('dashboard') }}" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-width: 150px;">
                    <span class="dropdown-item dropdown-header">Settings</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{ Route('profile') }}" class="dropdown-item">
                        <i class="fa fa-user mr-2" aria-hidden="true"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ Route('logout') }}" class="dropdown-item mr-3">
                        <i class="fa fa-power-off mr-2" aria-hidden="true"></i>LogOut
                    </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position:fixed">
        <!-- Brand Logo -->
        <a href="{{ Route('dashboard') }}" class="brand-link">
            <img src="{{asset('admin-asset/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('uploads/students/'. Auth::guard('admin')->user()->image)}}"
                        class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ Route('dashboard') }}"
                        class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview ">
                        <a href="{{ Route('dashboard') }}" class="nav-link {{ Request::path() ==  'admin/dashboard' ? 'active' : ''  }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview"> 
                        <a href="{{ Route('category') }}" class="nav-link {{ Request::path() ==  'admin/category'| Request::path() ==  'admin/category/add-category' ? 'active' : ''  }}">
                            <i class="fa fa-user mr-2 ml-2"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview"> 
                        <a href="{{ Route('sub-category') }}" class="nav-link {{ Request::path() ==  'admin/sub-category' | Request::path() ==  'admin/sub-category/add-sub-category' ? 'active' : ''  }}">
                            <i class="fa fa-user mr-2 ml-2"></i>
                            <p>
                               Sub Category
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="{{ Route('product') }}" class="nav-link {{ Request::path() ==  'admin/products' | Request::path() ==  'admin/product/add-product' ? 'active' : ''  }}">
                            <i class="ion ion-bag mr-2 ml-2"></i>
                            <p>
                                Products
                            </p>
                        </a>
                    </li>
                    
                    <li class="nav-item has-treeview ">
                        <a href="{{ Route('users') }}" class="nav-link {{ Request::path() ==  'admin/users' | Request::path() == 'admin/users/add-users' ? 'active' : ''  }}">
                            <i class="fa fa-user mr-2 ml-2"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                    
                    <li class="nav-item has-treeview ">
                        <a href="{{ Route('website-banner') }}" class="nav-link {{ Request::path() ==  'admin/banner'|Request::path() == 'admin/banner/add-banner' ? 'active' : ''  }}">
                            <i class="fa-solid fa-image mr-2 ml-2"></i>
                            <p>
                                Website Banner
                            </p>
                        </a>
                    </li>
                    
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    {{-- page content goes here --}}
    @yield('content')
    {{-- page content ends --}}

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="#">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.4
        </div>
    </footer>
    

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    
    <!-- jQuery -->
    <script src="{{asset('admin-asset/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('admin-asset/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin-asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('admin-asset/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('admin-asset/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('admin-asset/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin-asset/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('admin-asset/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('admin-asset/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin-asset/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('admin-asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('admin-asset/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('admin-asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin-asset/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin-asset/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin-asset/dist/js/demo.js')}}"></script>

    <script src="{{asset('admin-asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin-asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
    <script src="{{asset('include/customjs.js')}}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
    
    @yield('script')

</body>

</html>
