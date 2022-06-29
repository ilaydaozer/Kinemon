@extends('layouts/auth')

@section('content')
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
        <!-- Background Shape-->
        <div class="background-shape"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                    <img class="big-logo" src="img/core-img/logo-white.png" alt="">
                    <!-- Register Form-->
                    <div class="register-form mt-5 px-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group text-start mb-4"><span>Full Name</span>
                                <label for="name"><i class="lni lni-user"></i></label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="John Doe">
                            </div>
                            <div class="form-group text-start mb-4"><span>Email</span>
                                <label for="email"><i class="lni lni-envelope"></i></label>
                                <input class="form-control" id="email" type="email" name="email" placeholder="help@example.com">
                            </div>
                            <div class="form-group text-start mb-4"><span>Password</span>
                                <label for="password"><i class="lni lni-lock"></i></label>
                                <input class="input-psswd form-control" id="registerPassword" name="password" type="password" placeholder="Password">
                            </div>
                            <button class="btn btn-warning btn-lg w-100" type="submit">Sign Up</button>
                        </form>
                    </div>
                    <!-- Login Meta-->
                    <div class="login-meta-data">
                        <p class="mt-3 mb-0">Already have an account?<a class="ms-1" href="{{ url('login') }}">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
