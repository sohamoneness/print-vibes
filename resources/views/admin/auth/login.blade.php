<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Log in</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('backend-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/css/style.css') }}">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('backend-assets/images/logo.png') }}" alt="logo" style="height: 90px; width:40%;">
                <h5>Admin Login</h5>
            </a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form method="POST" action="{{ route('admin.login.post') }}">@csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email" value="{{old('email')}}" autocomplete="email" maxlength="30" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" value="" autocomplete="none" maxlength="30">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('backend-assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend-assets/js/adminlte.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend-assets/js/custom.js') }}"></script>

    <script>
        @if(Session::get('success'))
            toastFire('success', '{{Session::get("success")}}');
        @endif

        @if(Session::get('failure'))
            toastFire('error', '{{Session::get("failure")}}');
        @endif
    </script>
</body>
</html>






