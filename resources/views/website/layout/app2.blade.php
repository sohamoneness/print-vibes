<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print Vibe</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" type="image/x-icon type=" href="{{ asset('backend/images/favicon.png') }}" >
    <link rel="stylesheet" href="{{ asset('backend/styles/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/styles/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/styles/bootstrap.min.css') }}" />
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
    <script src="{{ asset('backend/js/app.js') }}" defer></script>


    @yield('styles')
    @stack('styles')

</head>

<body class="app sidebar-mini rtl">
    
    {{-- @include('admin.partials.header') --}}

    <main class="app-content" id="app">

        @yield('content')

    </main>

    @include('admin.partials.footer')

    @stack('scripts')
    


</body>
</html>