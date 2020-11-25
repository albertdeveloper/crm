<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


    <link rel="stylesheet" href="{{ asset('AdminLTE-3.0.5/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('AdminLTE-3.0.5/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.0.5/dist/css/adminlte.min.css') }}">
@stack('styles')
<!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
<!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @livewireStyles
    <style>
        .pagination {
            float: right !important;
            margin-top: 10px;
        }


    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('AdminLTE-3.0.5/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                 class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('AdminLTE-3.0.5/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                 class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('AdminLTE-3.0.5/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                 class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                        class="fas fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{ asset('AdminLTE-3.0.5/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">CRM</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{auth()->user()->defaultProfilePicture()}}"/>
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                           class="nav-link {{ (Route::currentRouteName() == 'admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home "></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    @can('user_management_access')
                        <li class="nav-item has-treeview {{ (in_array(Route::currentRouteName(),['admin.permissions.index','admin.roles.index','admin.users.index'])) ? 'menu-open' : '' }}">
                            <a href="#"
                               class="nav-link {{ (in_array(Route::currentRouteName(),['admin.userManagement.permissions','admin.userManagement.roles','admin.userManagement.users'])) ? 'active' : '' }}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>
                                    User Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                @can('permission_access')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.permissions.index') }}"
                                           class="nav-link {{ (in_array(Route::currentRouteName(),['admin.permissions.index'])) ? 'active' : '' }}">
                                            <i class="fas fa-user-lock nav-icon"></i>
                                            <p>Permission</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('roles_access')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.roles.index') }}"
                                           class="nav-link {{ (in_array(Route::currentRouteName(),['admin.roles.index'])) ? 'active' : '' }}">
                                            <i class="fas fa-briefcase nav-icon"></i>
                                            <p>Roles</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('users_access')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.users.index') }}"
                                           class="nav-link {{ (in_array(Route::currentRouteName(),['admin.users.index'])) ? 'active' : '' }} ">
                                            <i class="fas fa-user nav-icon"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('leads_access')
                        <li class="nav-item has-treeview {{ (in_array(Route::currentRouteName(),['admin.leads.index'])) ? 'menu-open' : '' }}">
                            <a href="#"
                               class="nav-link {{ (in_array(Route::currentRouteName(),['admin.leads.index'])) ? 'active' : '' }}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>
                                    Leads
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ route('admin.leads.index') }}"
                                           class="nav-link {{ (in_array(Route::currentRouteName(),['admin.leads.index'])) ? 'active' : '' }}">
                                            <i class="fas fa-globe nav-icon"></i>
                                            <p>Manage Leads</p>
                                        </a>
                                    </li>


                            </ul>
                        </li>
                    @endcan

                    @can('profile_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.profile') }}"
                               class="nav-link {{ (Route::currentRouteName() == 'admin.profile') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    My Profile
                                </p>
                            </a>
                        </li>
                    @endcan

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chevron-left"></i>
                <p>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a   href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </form>
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->
{{--        <div class="content-header">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row mb-2">--}}
{{--                    <div class="col-sm-6">--}}
{{--                        --}}{{--                        <h1 class="m-0 text-dark">Starter Page</h1>--}}
{{--                    </div><!-- /.col -->--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            --}}{{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                            --}}{{--                            <li class="breadcrumb-item active">Starter Page</li>--}}
{{--                        </ol>--}}
{{--                    </div><!-- /.col -->--}}
{{--                </div><!-- /.row -->--}}
{{--            </div><!-- /.container-fluid -->--}}
{{--        </div>--}}
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content ">
                {{ $slot }}
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            {{--                Anything you want--}}
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{date('Y')}} <a href="https://adminlte.io">{{ config('app.name') }}</a>.</strong> All
        rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="{{ asset('AdminLTE-3.0.5/plugins/moment/moment.min.js')}}"></script>
<!-- jQuery -->
<script src="{{ asset('AdminLTE-3.0.5/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE-3.0.5/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('AdminLTE-3.0.5/plugins/select2/js/select2.full.min.js') }}"></script>

@stack('scripts')
@livewireScripts

</body>
</html>
