@extends('site.master')

@section('title', 'Checkout')

@section('sub_page', 'Checkout')

@section('content')

    @include('site.layouts.breadcrumb_inside')

    <!-- start section for checkout page -->
    <section class="checkorder py-5">
        <div class="container">
            <div class="row">
            <form method="POST" class="d-flex flex-wrap w-100" action="{{ route('site.cart.place.order') }}">
    @csrf
    <div class="col-lg-6 col-md-12">
        <div class="details">
            <h4 class="mb-5">Billing Details</h4>
            @if ($address)
                <div class="row">
                    <div class="col-12">
                        <div class="address-details">
                            <p>{{ $address->name }}</p>
                            <p>{{ $address->email }}</p>
                            <p>{{ $address->phone }}</p>
                            <p>{{ $address->country }}</p>
                            <p>{{ $address->city }}</p>
                            <p>{{ $address->street_address }}</p>
                            <p>{{ $address->zip }}</p>
                            <p>{{ $address->state }}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <label>Full Name <span>*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <label>Email Address <span>*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <label>Phone <span>*</span></label>
                        <input type="text" name="phone" value="{{ old('phone') }}">
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <label>Country <span>*</span></label>
                        <input type="text" name="country" value="{{ old('country') }}">
                        @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <label>Town / City <span>*</span></label>
                        <input type="text" name="city" value="{{ old('city') }}">
                        @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <label>Street Address <span>*</span></label>
                        <input type="text" name="street_address" class="mb-3" value="{{ old('street_address') }}">
                        @error('street_address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <label>State<span>*</span></label>
                        <input type="text" name="state" class="mb-3" value="{{ old('state') }}">
                        @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <label>Postcode / ZIP (optional)</label>
                        <input type="text" name="zip" value="{{ old('zip') }}">
                        @error('zip') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="orderProd">
            <div class="discount coupon">
                <!-- Coupon Section -->
                @if (!Session::has('coupon'))
                    <h6>Discount Codes</h6>
                    <form method="POST" action="{{ route('site.cart.coupon.apply') }}">
                        @csrf
                        <input type="text" placeholder="Enter Your Codes" name="coupon_code">
                        <button type="submit" class="discountbtn">APPLY</button>
                    </form>
                @else
                    <form class="position-relative bg-body" method="POST" action="{{ route('site.cart.coupon.remove') }}">
                        @csrf
                        @method('DELETE')
                        <input type="text" name="coupon_code" placeholder="Coupon Applied" value="{{ session()->get('coupon')['code'] }} Applied!" readonly>
                        <button type="submit" class="discountbtn">REMOVE COUPON</button>
                    </form>
                @endif
            </div>

            <div class="order">
                <h4 class="mb-5">Your Order</h4>
                <div class="orderTotal">
                    <ul>
                        @foreach (Cart::instance('cart')->content() as $item)
                            <li>Item: {{ $item->name }} <span class="item-price">${{ $item->price }}</span> x {{ $item->qty }}</li>
                        @endforeach
                        <li>Subtotal <span id="subtotal">${{ Cart::instance('cart')->subtotal() }}</span></li>
                        @if (session()->has('discounts'))
                            <li>Discount ({{ session('coupon')['code'] }}) <span id="discount">${{ session('discounts')['discount'] }}</span></li>
                            <li>Subtotal After Discount <span id="subAfterDiscount">${{ session('discounts')['subtotal'] }}</span></li>
                            <li>VAT <span id="vat">${{ session('discounts')['tax'] }}</span></li>
                            <li>Total <span id="total">${{ session('discounts')['total'] }}</span></li>
                        @else
                            <li>VAT <span id="vat">${{ Cart::instance('cart')->tax() }}</span></li>
                            <li>Total <span id="total">${{ Cart::instance('cart')->total() }}</span></li>
                        @endif
                    </ul>

                    <div class="payment">
                        <div class="Cheque">
                            <label>COD <input type="radio" name="mode" value="cod" checked><span class="checkmark"></span></label>
                        </div>
                        <div class="Cheque">
                            <label>Card <input type="radio" name="mode" value="card"><span class="checkmark"></span></label>
                        </div>
                        <div class="Cheque">
                            <label>Stripe <input type="radio" name="mode" value="stripe"><span class="checkmark"></span></label>
                        </div>
                        @error('mode') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="orderBtn my-4 text-center">
                        <button type="submit" class="btn btn1 text-uppercase">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

            </div>
        </div>
    </section>
    <!-- end section for checkout page -->
@endsection
