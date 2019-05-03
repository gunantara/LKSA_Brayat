<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LKSA | BRAYAT PINUJI </title>
    <!-- Favicons -->
    <link href="img/logo.jpg" rel="icon">
    <link rel="stylesheet" href="/css/app.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-primary navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/" target="_blank"><i class="fas fa-home"></i></a>
                </li>
            </ul>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Log Out User -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button class="btn btn-danger elevation-3" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <strong>
                            KELUAR
                        </strong>
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-3">
            <!-- Brand Logo -->
            <div class="brand-link">
                <img src="./img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-5" style="opacity: .8">
                <span class="brand-text font-weight-light">BRAYAT PINUJI</span>

            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="./img/profile/{{Auth::user()->photo}}" class="img-circle elevation-3" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="/profile" class="d-block">
                            {{Auth::user()->name}}
                            <p>{{Auth::user()->type}}</p>
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <router-link to="/dashboard" class="nav-link">
                                <i class="nav-icon fa fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Pengelolaan Profile
                                    <i class="right fa fa-angle-left "></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/profile-lksa" class="nav-link">
                                        <i class="fas fa-building nav-icon"></i>
                                        <p>Profile LKSA</p>
                                    </router-link>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/galeri" class="nav-link">
                                        <i class="fas fa-images nav-icon"></i>
                                        <p>Galeri</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Pengelolaan Data
                                    <i class="right fa fa-angle-left "></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/data-anak" class="nav-link">
                                        <i class="fas fa-child nav-icon green"></i>
                                        <p>Data Anak</p>
                                    </router-link>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/data-anak-keluar" class="nav-link">
                                        <i class="fas fa-archive nav-icon red"></i>
                                        <p>Arsip Anak</p>
                                    </router-link>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/data-karyawan" class="nav-link">
                                        <i class="fas fa-user-tie nav-icon yellow"></i>
                                        <p>Data Karyawan</p>
                                    </router-link>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/inventaris" class="nav-link">
                                        <i class="fas fa-warehouse nav-icon purple"></i>
                                        <p>Data inventaris</p>
                                    </router-link>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/pengguna" class="nav-link">
                                        <i class="fas fa-users-cog nav-icon cyan"></i>
                                        <p>Data Pengguna</p>
                                    </router-link>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-sliders-h"></i>
                                <p>
                                    Pengaturan
                                    <i class="right fa fa-angle-left "></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/profile" class="nav-link">
                                        <i class="nav-icon fas fa-user yellow"></i>
                                        <p>
                                            Profile
                                        </p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/developer" class="nav-link">
                                        <i class="nav-icon fas fa-cogs"></i>
                                        <p>
                                            Developer
                                        </p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <router-view></router-view>
                    <vue-progress-bar></vue-progress-bar>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                LKSA Brayat Pinuji
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2019 <a href="https://lksa-bryatpinuji.com.com">LKSA Brayat Pinuji</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @auth
    <script>
        window.user = @json(auth() -> user())
    </script>
    @endauth
    <script src="/js/app.js"></script>

</body>


</html>