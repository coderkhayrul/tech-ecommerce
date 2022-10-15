@extends('admin.admin_layouts')

@section('admin_content')
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">One Tech <span class="tx-info tx-normal">Admin</span>
            </div>
            <div class="tx-center mg-b-60">Login Panel</div>

            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="form-group">
                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter your Email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- form-group -->
                <div class="form-group">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Enter your password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (Route::has('admin.forget-password'))
                        <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                    @endif
                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">Sign In</button>
            </form>
            @if (Route::has('admin.register'))
                <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a>
                </div>
            @endif
        </div>
        {{-- login-wrap --}}
    </div>
@endsection
