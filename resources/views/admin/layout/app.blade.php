<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print Vibe</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <link rel="icon" type="image/x-icon type=" href="{{ asset('artist/images/favicon.png') }}" >
    <link rel="stylesheet" href="{{ asset('backend/styles/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/styles/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/styles/bootstrap.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @yield('styles')
    @stack('styles')

</head>

<body class="app sidebar-mini rtl">
  <div class="overlay-sidebar"></div>
    <main class="dashboard-container">

      <!-- Sidebar start -->
      <div class="sidebar">
        <div class="logo">
          <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('backend/images/logo.png')}}" alt="" />
          </a>
        </div>
        <div class="sidebar-list">
          <ul class="list-unstyled p-0 m-0">
            <li>
              <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                <img
                  src="{{ asset('backend/images/clipboard.png')}}"
                  class="list-img list-img-dark"
                  alt=""
                />
                <img
                  src="{{ asset('backend/images/clipboard-white.png')}}"
                  class="list-img list-img-light"
                  alt=""
                />
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.category.index') }}" class="{{ request()->is('admin/category*') ? 'active' : '' }}">
                <img
                  src="{{ asset('backend/images/category.png')}}"
                  class="list-img list-img-dark"
                  alt=""
                />
                <img
                  src="{{ asset('backend/images/category.png')}}"
                  class="list-img list-img-light"
                  alt=""
                />
                <span>Categories</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.design.index') }}" class="{{ request()->is('admin/design*') ? 'active' : '' }}">
                <img
                  src="{{ asset('backend/images/customer-management.png')}}"
                  class="list-img list-img-dark"
                  alt=""
                />
                <img
                  src="{{ asset('backend/images/customer-management-light.png')}}"
                  class="list-img list-img-light"
                  alt=""
                />
                <span>Designs</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.product.index') }}" class="{{ request()->is('admin/product*') ? 'active' : '' }}">
                <img
                  src="{{ asset('backend/images/clipboard-white.png')}}"
                  class="list-img list-img-dark"
                  alt=""
                />
                <img
                  src="{{ asset('backend/images/clipboard-white.png')}}"
                  class="list-img list-img-light"
                  alt=""
                />
                <span>Product Management</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.design.index') }}" class="{{ request()->is('admin/design*') ? 'active' : '' }}">
                <img
                  src="{{ asset('backend/images/customer-management.png')}}"
                  class="list-img list-img-dark"
                  alt=""
                />
                <img
                  src="{{ asset('backend/images/customer-management-light.png')}}"
                  class="list-img list-img-light"
                  alt=""
                />
                <span>Design Categories</span>
              </a>
            </li>
           
            {{-- <li>
              <a href="{{ route('artist.orders') }}" class="">
                <img
                  src="{{ asset('backend/images/customer-management.png')}}"
                  class="list-img list-img-dark"
                  alt=""
                />
                <img
                  src="{{ asset('backend/images/customer-management-light.png')}}"
                  class="list-img list-img-light"
                  alt=""
                />
                <span>Order List</span>
              </a>
            </li>
            <li>
              <a href="{{ route('artist.transactions') }}" class="">
                <img
                  src="{{ asset('backend/images/customer-management.png')}}"
                  class="list-img list-img-dark"
                  alt=""
                />
                <img
                  src="{{ asset('backend/images/customer-management-light.png')}}"
                  class="list-img list-img-light"
                  alt=""
                />
                <span>Transaction List</span>
              </a>
            </li>
            <li>
              <a href="{{ route('artist.followers') }}" class="">
                <img
                  src="{{ asset('backend/images/customer-management.png')}}"
                  class="list-img list-img-dark"
                  alt=""
                />
                <img
                  src="{{ asset('backend/images/customer-management-light.png')}}"
                  class="list-img list-img-light"
                  alt=""
                />
                <span>Follower List</span>
              </a>
            </li>
            <li>
              <a href="{{ route('artist.notifications') }}" class="">
                <img
                  src="{{ asset('backend/images/customer-management.png')}}"
                  class="list-img list-img-dark"
                  alt=""
                />
                <img
                  src="{{ asset('backend/images/customer-management-light.png')}}"
                  class="list-img list-img-light"
                  alt=""
                />
                <span>Notification List</span>
              </a>
            </li> --}}
          </ul>
        </div>
      </div>
      <!-- Sidebar End -->

      <div class="dashboard-right">
        <div class="dashboard-header">
          <div class="dash-header-left">
            <img src="{{ asset('backend/images/bars-icon.png')}}" alt="" />
          </div>
          <div class="dash-header-right">
            <ul class="list-unstyled p-0 m-0">
              <li class="noti header-item">
                <a href="{{ route('artist.notifications') }}"><img src="{{ asset('backend/images/bell-icon.png')}}" alt="" /></a>
              </li>
             
              <li class="profile">
                <a href="javascript:void"
                  ><img src="{{ asset('backend/images/profile.png')}}" alt=""
                /></a>
                <ul class="list-unstyled p-0 m-0 dash-header-sub-menu">
                  <li><a href="">Change Password</a></li>
                  <li><a href="{{ route('admin.logout') }}">log out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>

        @yield('content')

        @yield('scripts')
        @stack('scripts')
      </div>
    </main>
    
    @yield('models')
    @stack('models')


</body>
</html>