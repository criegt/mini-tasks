@extends('layouts.app')

@section('content')
<div class="container pt-lg-md">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-white pb-2">
                    <div class="text-muted text-center mb-1">
                        <h5>Sign in</h5>
                        <h1><i class="far fa-user-circle"></i></h1>
                    </div>
                </div>
                <div class="card-body px-lg-5 py-lg-5">
                    <form role="form">
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" placeholder="Email" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="Password" type="password">
                            </div>
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                            <label class="custom-control-label" for=" customCheckLogin">
                                <span>Remember me</span>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary my-4">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <a href="#" class="text-light">
                        <small>Forgot password?</small>
                    </a>
                </div>
                <div class="col-6 text-right">
                    <a href="#" class="text-light">
                        <small>Create new account</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
