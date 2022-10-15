@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Change Your Password') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('web.password.update') }}"
                            aria-label="{{ __('Reset Password') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="oldpass"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                                <div class="col-md-6">
                                    <input id="oldpass" type="password"
                                        class="form-control{{ $errors->has('oldpass') ? ' is-invalid' : '' }}"
                                        name="oldpass" value="{{ $oldpass ?? old('oldpass') }}" required autofocus>

                                    @if ($errors->has('oldpass'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('oldpass') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-image-top mt-4" src="{{ asset('backend/img/img1.jpg') }}" alt=""
                        style="height: 90px; width: 90px; margin-left: 35%;">
                    <div class="card-body">
                        <h4 class="card-title text-center">{{ Auth::user()->name }}</h4>
                    </div>
                    <ul class="list-group list-group-flash text-center">
                        <li class="list-group-item"><a href="{{ route('web.password.change') }}">Change Password</a></li>
                        <li class="list-group-item"><a href="">Change Password</a></li>
                        <li class="list-group-item"><a href="">Change Password</a></li>
                        <li class="list-group-item">
                            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-block">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
