@extends('site.master')

@section('title', 'Register')

@section('sub_page', 'Register')

@section('content')

    @include('site.layouts.breadcrumb_inside')

    <section class="registerForm">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 m-auto">
                    <h2>
                        Register
                    </h2>
                    <form>
                        <label>Username or email address *</label>
                        <input type="text">
                        <label>Password *</label>
                        <input type="password">
                        <label>Confirm Password *</label>
                        <input type="password">
                        <button class="registerBtn btn text-uppercase">
                            Register
                        </button>
                    </form>
                    <div class="loginLink text-center">
                        <a href="login.html" class="text-uppercase">
                            Or Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
