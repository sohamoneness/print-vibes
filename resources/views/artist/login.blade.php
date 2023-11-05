@extends('artist.layout.app2')
@section('content')
@include('artist.partials.flash')
<div class="banner signup-banner">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-7 mb-4 mb-md-0">
          <div class="signup-banner-content banner-content">
            <h4>Listing Company</h4>
            <h1>
              Let’s <span>Become</span> <br />
              LC. Member Now
            </h1>
            <br />
            <p>
              Aliquam porta, ipsum eu placerat dapibus, nisl turpis dignissim
              urna, a accumsan nunc metus gravida odio. Ut placerat efficitur
              pretium. Phasellus semper turpis vel finibus iaculis. Nullam id
              justo non erat consequat maximus
            </p>
          </div>
        </div>

        <div class="col-12 col-md-5">
          <div class="signup-form-container">
            <div class="signup-form-img">
              <img src="images/form-rect-img.png" alt="" />
            </div>
            <div class="signup-form-heading">
              <h3>Please fill the slots below</h3>
              
            </div>
            <form class="mt-4" action="{{ route('artist.login.post') }}" method="POST">
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