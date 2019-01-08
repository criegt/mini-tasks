@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card bg-light shadow border-0">
                <div class="card-header bg-white py-4">
                    <div class="text-primary text-center mb-1">
                        <h1><i class="far fa-user-circle"></i></h1>
                        <h5>Login</h5>
                    </div>
                </div>
                <div class="card-body px-lg-5 py-lg-5">
                    <form method="POST" action="{{ route('login') }}" role="form">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" type="email"
                                    name="email" value="{{ old('email') }}" required autofocus>
                                
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" type="password"
                                    name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" type="checkbox"
                                name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">
                                <span>Remember me</span>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block mt-4">Go</button>
                        </div>
                    </form>
                    <div class="row mt-3">
                        <div class="col-6">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    Forgot password?
                                </a>
                            @endif
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('register') }}">
                                Create new account
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
