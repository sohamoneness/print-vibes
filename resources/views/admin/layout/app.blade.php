<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Portal</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('backend-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/css/style.css') }}">

    @yield('style')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" class="nav-link" target="_blank">Website</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
         
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
                </a>
            </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ url('/') }}" class="brand-link text-center" target="_blank">
                <img src="{{ asset('backend-assets/images/logo-text.svg') }}" alt="AdminLTE Logo" class="elevation-3" style="height: 45px;opacity: .8">
                {{-- <span class="brand-text font-weight-light">Admin</span> --}}
            </a>

            <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ Auth::guard('manager')->user()->profile_photo? asset(Auth::guard('manager')->user()->profile_photo): asset('backend-assets/images/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::guard('manager')->user()->first_name?Auth::guard('manager')->user()->first_name:"MBS Portal"}}</a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                  <li class="nav-item">
                        {{-- <a href="{{ route('manger.event.list') }}" class="nav-link {{ (request()->is('mbs/event*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Event Management</p>
                        </a> --}}
                    </li>
                      {{-- 
                    <li class="nav-item">
                        <a href="{{ route('admin.product.list.all') }}" class="nav-link {{ (request()->is('admin/product*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Product</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.case-study.list.all') }}" class="nav-link {{ (request()->is('admin/case-study*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Case studies</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.service.list.all') }}" class="nav-link {{ (request()->is('admin/service*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>Service</p>
                        </a>
                    </li> --}}
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1 class="m-0">@yield('page-title')</h1> --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">@yield('page-title')</li>
                        </ol>
                    </div>
                    </div>
                </div>
            </div>

            @yield('section')

        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>

        {{-- <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                &copy; {{ $settings[3]->content }} All rights reserved
            </div>
            <strong>{{ date('Y') }} - <a href="{{ url('/') }}" target="_blank">{{ $settings[3]->content }}</a></strong>
        </footer> --}}
    </div>

    <form action="{{ route('admin.logout') }}" id="logout-form" method="post" class="d-none">@csrf</form>

    <script src="{{ asset('backend-assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend-assets/js/adminlte.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend-assets/js/custom.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <script>
        @if(Session::get('success'))
            toastFire('success', '{{Session::get("success")}}');
        @endif

        @if(Session::get('failure'))
            toastFire('error', '{{Session::get("failure")}}');
        @endif
    </script>

    @yield('script')
</body>
</html>