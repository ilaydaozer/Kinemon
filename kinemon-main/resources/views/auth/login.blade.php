@extends('layouts/auth')

@section('content')
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
        <!-- Background Shape-->
        <div class="background-shape"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                    <img class="big-logo" src="img/core-img/logo-white.png">
                    <!-- Register Form-->
                    <div class="register-form mt-5 px-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group text-start mb-4"><span>Username</span>
                                <label for="email"><i class="lni lni-user"></i></label>
                                <input class="form-control" id="email" type="email" name="email"
                                       placeholder="info@example.com">
                            </div>
                            <div class="form-group text-start mb-4"><span>Password</span>
                                <label for="password"><i class="lni lni-lock"></i></label>
                                <input class="form-control" id="password" type="password" placeholder="Password"
                                       name="password">
                            </div>
                            <button class="btn btn-warning btn-lg w-100" type="submit">Log In</button>
                        </form>
                    </div>
                    <div class="login-meta-data">
                        <p class="mb-0 mt-3">Didn't have an account?<a class="ms-1" href="{{ url('register') }}">Register Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
