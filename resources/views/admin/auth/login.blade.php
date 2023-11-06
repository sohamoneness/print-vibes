@extends('admin.layout.app2')
@section('content')
@include('artist.partials.flash')
<style>
    .signup-banner{
        padding: 104px 0 100px;
    }
</style>
<div class="banner signup-banner">
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-12 col-md-6">
          <div class="signup-form-container">
            <div class="signup-form-img">
              <img src="images/form-rect-img.png" alt="" />
            </div>
            <div class="signup-form-heading row justify-content-center">
              <h3 class="text-center">Admin Portal</h3>
              
            </div>
            <form class="mt-4" action="{{ route('admin.login.post') }}" method="POST">
                @csrf
              <div class="form-group mb-3">
                <div class="icon">
                  <img src="images/email-icon-signup.png" alt="" />
                </div>
                <div class="form-info">
                  <label for="">email id</label>
                  <input type="email" name="email" id="email" placeholder="Enter your email" />
                  @error('email')
                      <p class="small text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group mb-3">
                <div class="icon">
                  <img src="images/password-icon.png" alt="" />
                </div>
                <div class="form-info">
                  <label for="">password</label>
                  <input type="password" name="password" id="password" placeholder="Enter your password" />
                  @error('password')
                      <p class="small text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-btn mt-4">
                <button type="submit">Login</button>
              </div>
              <a href="javascript:void(0);"><h6 style="margin: 10px;">Forgot Password</h6></a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection

  @push('scripts')
  @endpush