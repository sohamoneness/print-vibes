<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

    <title>Admin panel</title>
  </head>
  <body>
    <main class="login">
      <div class="login__left">
        <img src="{{ asset('admin/images/6501.png') }}">
      </div>
      <div class="login__right">
        <div class="login__block">
          <div class="logo__block">
            <img src="{{ asset('admin/images/logo.png') }}">
          </div>

          @if (Session::get('success'))<div class="alert alert-success">{{ Session::get('success') }}</div>@endif
          @if (Session::get('failure'))<div class="alert alert-danger">{{ Session::get('failure') }}</div>@endif

          <form method="POST" action="{{ route('admin.login.post') }}">
          @csrf
            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>
            @error('email') <p class="small text-danger">{{ $message }}</p> @enderror

            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
            @error('password') <p class="small text-danger">{{ $message }}</p> @enderror

            <div class="row mb-3">
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Remember Me
                  </label>
                </div>
              </div>
              <div class="col-6 text-end">
                <a href="">Forgot Password?</a>
              </div>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-lg btn-pink">Login</button>
            </div>
          </form>

          <div class="row mt-3">
              <div class="col-12 text-center">
                <a href="{{ url('/') }}">Back to homepage</a>
              </div>
            </div>
        </div>
      </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>