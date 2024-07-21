@extends('frontend.layouts.main')

@section('content')
<section id="registration" class="registration section-bg">
    <div class="container">
        <div class="row">
            <div class="card-group mt-5"> <!-- Added margin-top to card-group -->
                <div class="card p-4">
                    <div class="card-body">
                        <div class="col-md-5 mx-auto">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                               
                                <h5 class="text-center">Register</h5>
                                <p class="text-muted" style="font-size: 12px;">Create a new account</p>
                                
                                <!-- Name Input -->
                                <div class="input-group mb-3" style="font-size: 12px;">
                                    <!-- Icon for name -->
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Full Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                     @enderror
                                </div>

                                <!-- Email Input -->
                                <div class="input-group mb-3" style="font-size: 12px;">
                                    <!-- Icon for email -->
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                     @enderror
                                </div>

                                <!-- Password Input -->
                                <div class="input-group mb-4" style="font-size: 12px;">
                                    <!-- Icon for password -->
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Confirm Password Input -->
                                <div class="input-group mb-4" style="font-size: 12px;">
                                    <!-- Icon for confirm password -->
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Register Button -->
                                <div class="col-12 text-center"> <!-- Changed from col-6 to col-12 -->
                                    <button type="submit" class="btn btn-primary btn-rounded">Register</button>
                                </div>

                                <!-- Link to Login Page -->
                                <div class="col-12 text-center mt-3" style="font-size: 12px;">
                                    <p>Already have an account? 
                                    <a href="{{ route('login') }}">Login here</a></p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
