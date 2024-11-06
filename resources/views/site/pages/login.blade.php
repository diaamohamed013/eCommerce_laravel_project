@extends('site.master')

@section('title', 'Login')

@section('sub_page', 'Login')

@section('content')

    @include('site.layouts.breadcrumb_inside')
    <section class="registerForm loginForm">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 m-auto">
                    <h2>
                        LogIn
                    </h2>
                    <form>
                        <label>Username or email address *</label>
                        <input type="text">
                        <label>Password *</label>
                        <input type="password">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="check">
                                    <label for="save">
                                        Save Password
                                        <input type="checkbox" id="save">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="forget">
                                    <a href="#">Forget your Password</a>
                                </div>
                            </div>
                        </div>
                        <button class="registerBtn btn text-uppercase">
                            Sign In
                        </button>
                    </form>
                    <div class="loginLink text-center">
                        <a href="register.html" class="text-uppercase">
                            Or creat an account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
