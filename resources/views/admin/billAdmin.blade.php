<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bills Dashboard</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('asset/plugins')}}/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('asset/plugins')}}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('asset/plugins')}}/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('asset/plugins')}}/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('asset/css')}}/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('asset/plugins')}}/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('asset/plugins')}}/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('asset/plugins')}}/summernote/summernote-bs4.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .action-btn {
            margin-right: 5px;
        }
        .action-buttons {
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <!-- <p class="nav-link">ADMIN</p> -->
        @if(Auth::check())
                    <li><a class="nav-link" href="#">Hello, {{ Auth::user()->name }}</a></li>
                    <li><a class="nav-link" href="{{ route('loginadmin') }}">LOGOUT</a></li>
                @endif
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
        </li>
    </ul>
</nav>  

<!-- Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="{{asset('assets/image/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Hotel Manager</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <!-- <img  src="{{asset('assets/image/avatar5.png')}}" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
            <a href="#" class="d-block">ADMIN</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item ">
            <a href="{{route('admin.dashboard')}}" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{route('admin.users.index')}}" class="nav-link ">
            <i class="nav-icon fas fa-user"></i>
            <p>
                Users
            </p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{route('admin.tables.index')}}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
            <p>
                Tables
            </p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{route('admin.roomtypes.index')}}" class="nav-link ">
                <i class="nav-icon fas fa-bed"></i>
                <p>
                    Room Types
                </p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{route('admin.rooms.index')}}" class="nav-link ">
                <i class="nav-icon fas fa-book"></i>
            <p>
                Room list
            </p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{route('admin.bookings.index')}}" class="nav-link ">
                <i class="nav-icon fas fa-bars"></i>
                <p>
                    Book room
                </p>
                </a>
            </li>
            <li class="nav-item ">
            <a href="{{route('admin.bills.index')}}" class="nav-link active ">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Bills
              </p>
            </a>
          </li>
            <li class="nav-item ">
                <a href="{{ route('loginadmin') }}" class="nav-link ">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Sign out
                </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content -->
<!-- Content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="container">
            <h1 class="mt-5">Bills</h1>
            <div class="mt-3">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Bill ID</th>
                            <th>Booking ID</th>
                            <th>Room Charge</th>
                            <th>Payment Date</th>
                            <th>Expire Date</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bills as $bill)
                            <tr>
                                <td>{{ $bill->BillID }}</td>
                                <td>{{ $bill->BookingID }}</td>
                                <td>{{ $bill->RoomCharge }}</td>
                                <td>{{ $bill->PaymentDate }}</td>
                                <td>{{ $bill->ExpireDate }}</td>
                                <td>{{ $bill->TotalPrice }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Footer -->
<footer class="main-footer">
    <strong><a href="#">HotelManager</a></strong>
    <div class="float-right d-none d-sm-inline-block">
    <b>Thecappahotel@gmail.com</b>
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('asset/plugins')}}/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('asset/plugins')}}/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
$.widget.bridge('uibutton', $.ui.button)
</script> -->
<!-- Bootstrap 4 -->
<script src="{{asset('asset/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('asset/plugins')}}/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('asset/plugins')}}/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('asset/plugins')}}/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('asset/plugins')}}/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('asset/plugins')}}/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('asset/plugins')}}/moment/moment.min.js"></script>
<script src="{{asset('asset/plugins')}}/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('asset/plugins')}}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('asset/plugins')}}/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('asset/plugins')}}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('asset/js')}}/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('asset/js')}}/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('asset/js')}}/pages/dashboard.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;

function deactivateRoomType(id) {
    if (confirm('Are you sure you want to deactivate this room type?')) {
        axios.put(`/admin/roomtypes/${id}/deactivate`)
            .finally(() => {
                alert('Room type deactivated successfully.');
                window.location.reload();
            });
    }
}

function activateRoomType(id) {
    if (confirm('Are you sure you want to activate this room type?')) {
        axios.put(`/admin/roomtypes/${id}/activate`)
            .then(response => {
                alert('Room type activated successfully.');
                window.location.reload();
            })
            .finally(() => {
                alert('Room type activated successfully.');
                window.location.reload();
            });
    }
}

</script>
</body>
</html> 