@extends('website.layout.app')
@section('content')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-sm-5 my-5">
            <form class="mt-4" action="{{ route('register.post') }}" method="POST">
                @csrf
                <h2 class="text-center">Create an account</h2>
                <p class="text-center">Please enter your details to create your account.</p>

                <div class="form-group">
                    <button type="submit" class="btn btn-pink btn-block">Sign Up as artist</button>
                </div>
                <div class="or_text">
                    <span>or</span>
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                    @error('name')
                        <p class="small text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}">
                    @error('email')
                        <p class="small text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    @error('password')
                        <p class="small text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                        <p class="small text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <p class="text-center">By clicking Sign Up, you agree to our User Agreement</p>
                <div class="form-group">
                    <button type="submit" class="btn btn-theme btn-block">Sign Up</button>
                </div>
                <p class="text-center">Have an account? <a href="{{route('login')}}">Log In</a></p>
            </form>            
        </div>
    </div>
</section>

@endsection

@push('scripts')

@endpush