@extends('site.master')

@section('title', 'Chekout')

@section('sub_page', 'Checkout')

@section('content')

    @include('site.layouts.breadcrumb_inside')

    <!-- start section for checkout page -->
    <section class="checkorder py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="details">
                        <div class="infoLogin">
                            <a href="login.html">
                                Click Here To Login
                            </a>
                        </div>
                        <h4 class="mb-5">
                            Biiling Details
                        </h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <label>
                                    First Name
                                    <span>*</span>
                                </label>
                                <input type="text" required>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label>
                                    Last Name
                                    <span>*</span>
                                </label>
                                <input type="text" required>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label>
                                    Company Name
                                </label>
                                <input type="text">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label>
                                    Country
                                    <span>*</span>
                                </label>
                                <input type="text" required>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label>
                                    Street Address
                                    <span>*</span>
                                </label>
                                <input type="text" required class="mb-3">
                                <input type="text" required>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label>
                                    Postcode / ZIP (optional)
                                </label>
                                <input type="text">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label>
                                    Town / City
                                    <span>*</span>
                                </label>
                                <input type="text" required>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label>
                                    Email Address
                                    <span>*</span>
                                </label>
                                <input type="email" required>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label>
                                    phone
                                    <span>*</span>
                                </label>
                                <input type="text" required>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="creat">
                                    <label>
                                        Creat An Account?
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="orderProd">
                        <div class="coupon">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="order">
                            <h4 class="mb-5">
                                Your Order
                            </h4>
                            <div class="orderTotal">
                                <ul>
                                    <li class="text-uppercase">
                                        Product
                                        <span>Total</span>
                                    </li>
                                    <li class="combination">
                                        Combination X 1
                                        <span>$60.00</span>
                                    </li>
                                    <li class="combination">
                                        Combination X 1
                                        <span>$60.00</span>
                                    </li>
                                    <li class="combination">
                                        Combination X 1
                                        <span>$120.00</span>
                                    </li>
                                    <li class="combination">
                                        Subtotal
                                        <span>$240.00</span>
                                    </li>
                                    <li class="totalPrice">
                                        Total
                                        <span>$240.00</span>
                                    </li>
                                    <div class="clr"></div>
                                </ul>
                                <div class="payment">
                                    <div class="Cheque">
                                        <label>
                                            Cheque payment
                                            <input type="radio" name="pay">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="Cheque">
                                        <label>
                                            PayPal
                                            <input type="radio" name="pay">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="orderBtn my-4 text-center">
                                    <button class="btn btn1 text-uppercase">
                                        place order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section for checkout page -->

@endsection
