@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/contact_responsive.css">

    <div class="contact_form" style="padding-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1"
                    style="border: 1px solid rgb(221, 220, 220); padding: 20px; border-radius: 20px">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center text-primary" style="margin-bottom: 20px;">Sign In</div>
                        <hr>
                        <form action="{{ route('login') }}" class="text-center" method="POST">
                            @csrf
                            <div class="contact_form_inputs">
                                <input name="email" style="width: 400px;" type="text"
                                    class="input_field @error('email') is-invalid @enderror" placeholder="Email Or Phone"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact_form_inputs">
                                <input name="password" style="width: 400px;" type="password"
                                    class="input_field @error('password') is-invalid @enderror"
                                    placeholder="Enter Your Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="button contact_submit_button">Login</button>
                            </div>
                        </form>
                        <br>
                        <a href="{{ route('password.request') }}" class="">i forget my password</a>
                        <br>
                        <h4 class="text-center text-info">OR</h4>
                        <br>
                        <br>
                        <a href="#" class="btn btn-primary text-uppercase btn-block text-light"
                            style="font-weight: 500;"><i class="fab fa-facebook-square"></i> Login With Facebook</a>
                        <a href="#" class="btn btn-danger text-uppercase btn-block text-light"
                            style="font-weight: 500;"><i class="fab fa-google"></i> Login With Google</a>

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1"
                    style="border: 1px solid rgb(221, 220, 220); padding: 20px; border-radius: 20px">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center text-primary" style="margin-bottom: 20px;">Sign Up</div>
                        <hr>
                        <form action="{{ route('register') }}" method="POST" class="text-center">
                            @csrf
                            <div class="contact_form_inputs">
                                <input value="{{ old('name') }}" name="name" style="width: 400px;" type="text"
                                    class="input_field @error('name') is-invalid @enderror"
                                    placeholder="Enter Your FullName">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact_form_inputs">
                                <input value="{{ old('phone') }}" name="phone" style="width: 400px;" type="text"
                                    class="input_field @error('phone') is-invalid @enderror" placeholder="Enter Your Phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact_form_inputs">
                                <input value="{{ old('email') }}" name="email" style="width: 400px;" type="text"
                                    class="input_field @error('email') is-invalid @enderror" placeholder="Enter Your Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact_form_inputs">
                                <input name="password" style="width: 400px;" type="password"
                                    class="input_field @error('password') is-invalid @enderror"
                                    placeholder="Enter Your Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact_form_inputs">
                                <input name="password_confirmation" style="width: 400px;" type="password"
                                    class="input_field" placeholder="Re-Type Password">
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="button contact_submit_button">Register</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
