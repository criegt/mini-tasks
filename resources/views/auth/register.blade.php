@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card bg-light shadow border-0">
                <div class="card-header bg-white py-4">
                    <div class="text-primary text-center mb-1">
                        <h5>Register</h5>
                    </div>
                </div>
                <div class="card-body px-lg-5 py-lg-5">
                    <form method="POST" action="{{ route('register') }}" role="form">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    placeholder="Name" type="text" name="name" value="{{ old('name') }}" required
                                    autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    placeholder="Email" type="email" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    placeholder="Password" type="password" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input id="password-confirm" class="form-control" placeholder="Confirm Password" type="password"
                                    name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
                        </div>
                    </form>
                    <div class="row mt-3">
                        <div class="col-12 text-right">
                            <a href="{{ route('login') }}">
                                Do you already have an account?
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
