@extends('layouts.app')

@section('content')
    <div class="wrapper without_header_sidebar">
        <!-- contnet wrapper -->
        <div class="content_wrapper">
            <!-- page content -->
            <div class="registration_page center_container">
                <div class="center_content">
                    <div class="logo">
                        <img src="{{ asset('panel') }}/assets/images/logo.png" alt="" class="img-fluid">
                    </div>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-group icon_parent">
                            <label for="uname">Username</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Full Name">
                            <span class="icon_soon_bottom_right"><i class="fas fa-user"></i></span>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group icon_parent">
                            <label for="email">E-mail</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Email Address">
                            <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group icon_parent">
                            <label for="password">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Password">
                            <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group icon_parent">
                            <label for="rtpassword">Re-type Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password" placeholder="Confirm Password">
                            <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                        </div>
                        <div class="form-group">
                            <a class="registration" href="{{ route('login') }}">Already have an account</a><br>
                            <button type="submit" class="btn btn-blue">Signup</button>
                        </div>
                    </form>
                    <div class="footer">
                        <p>Copyright &copy; 2022 <a href="https://easylearningbd.com/">easy Learning</a>. All rights
                            reserved.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/ content wrapper -->
    </div>
    <!--/ wrapper -->
@endsection
