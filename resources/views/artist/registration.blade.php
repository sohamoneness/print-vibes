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
                        <h5>By Completing Few Steps...</h5>
                        <p>
                            Aliquam porta, ipsum eu placerat dapibus, nisl turpis dignissim
                            urna, a accumsan nunc metus gravida odio. Ut placerat efficitur
                            pretium. Phasellus semper turpis vel finibus iaculis. Nullam id
                            justo non erat consequat maximus
                        </p>
                    </div>
                </div>

                @php
                    
                    $Category = \App\Models\Category::all();

                @endphp

                <div class="col-12 col-md-5">
                    <div class="signup-form-container">
                        <div class="signup-form-img">
                            <img src="images/form-rect-img.png" alt="" />
                        </div>
                        <div class="signup-form-heading">
                            <h3>Please fill the slots below</h3>
                        </div>
                        <form action="{{ route('artist.register.post') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="signup1">
                                <div class="form-group mb-3">
                                    <div class="icon">
                                        <img src="images/email-icon-signup.png" alt="" />
                                    </div>
                                    <div class="form-info">
                                        <label for="">Name</label>
                                        <input type="text" name="name" placeholder="Enter your name" />
                                        @error('name')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="icon">
                                        <img src="images/email-icon-signup.png" alt="" />
                                    </div>
                                    <div class="form-info">
                                        <label for="">Email Id</label>
                                        <input type="text" name="email" placeholder="Enter your email" />
                                        @error('email')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="icon">
                                        <img src="images/phone-icon-signup.png" alt="" />
                                    </div>
                                    <div class="form-info">
                                        <label for="">Mobile No</label>
                                        <input type="text" name="mobile" placeholder="Enter your phone number" />
                                        @error('mobile')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="icon">
                                        <img src="images/phone-icon-signup.png" alt="" />
                                    </div>
                                    <div class="form-info">
                                        <label for="">Password</label>
                                        <input type="password" name="password" placeholder="Enter your password" />
                                        @error('mobile')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-btn">
                                    <button type="submit" class="continue-btn">Submit Now</button>
                                </div>
                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
@endsection



@push('scripts')
@endpush
