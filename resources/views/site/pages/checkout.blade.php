@extends('site.master')

@section('title', 'Chekout')

@section('sub_page', 'Checkout')

@section('content')

    @include('site.layouts.breadcrumb_inside')

    <!-- start section for checkout page -->
    <section class="checkorder py-5">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="carttable">
                        <table>
                            <thead class="text-uppercase">
                                <tr>
                                    <th>image</th>
                                    <th>product name</th>
                                    <th>price</th>
                                    <th>quantity</th>
                                    <th>total</th>
                                    <th><i class="fal fa-times"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr class="cart-item">
                                        <td>
                                            <img src="{{ asset($item->model->image) }}" alt="{{ $item->name }}"
                                                width="120px" height="120px">
                                        </td>
                                        <td>
                                            <h5>
                                                {{ $item->name }}
                                            </h5>
                                        </td>
                                        <td>
                                            <span>${{ $item->price }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <form style="width: auto; margin: unset;" method="POST"
                                                    action="{{ route('site.cart.qty.decrease', ['rowId' => $item->rowId]) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="value-button decreaseQty" id="decrease"
                                                        value="Decrease Value">-
                                                    </div>
                                                </form>
                                                <input type="number" id="number" value="{{ $item->qty }}"
                                                    min="1" name="stock_quantity" />
                                                <form style="width: auto; margin: unset;" method="POST"
                                                    action="{{ route('site.cart.qty.increase', ['rowId' => $item->rowId]) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="value-button increaseQty" id="increase"
                                                        value="Increase Value">+
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <span>${{ $item->subtotal() }}</span>
                                        </td>
                                        <td>
                                            <form class="remove-item-form" style="width: auto; border: unset;"
                                                method="POST"
                                                action="{{ route('site.cart.item.remove', ['rowId' => $item->rowId]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger bg-danger">
                                                    <i class="fal fa-times px-3"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="details">
                        {{-- <div class="infoLogin">
                            <a href="login.html">
                                Click Here To Login
                            </a>
                        </div> --}}
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
                        <div class="discount coupon">
                            @if (!Session::has('coupon'))
                                <h6>
                                    discount codes
                                </h6>
                                <form method="POST" action="{{ route('site.cart.coupon.apply') }}">
                                    @csrf
                                    <input type="text" placeholder="Enter Your Codes" name="coupon_code">
                                    <button type="submit" class="discountbtn">
                                        APPLY
                                    </button>
                                </form>
                            @else
                                <form class="position-relative bg-body" method="POST"
                                    action="{{ route('site.cart.coupon.remove') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="text" name="coupon_code" placeholder="Enter Your Codes"
                                        value="{{ session()->get('coupon')['code'] }} Applied!" readonly>
                                    <button type="submit" class="discountbtn">
                                        REMOVE COUPON
                                    </button>
                                </form>
                            @endif
                            @if (Session::has('error'))
                                <p class="text-danger">
                                    {{ Session::get('error') }}
                                </p>
                            @endif
                        </div>
                        <div class="order">
                            <h4 class="mb-5">
                                Your Order
                            </h4>
                            @if (Session::has('discounts'))
                            <div class="orderTotal">
                                <ul>
                                    <li>
                                        Subtotal
                                        <span id="subtotal">
                                            ${{ Cart::instance('cart')->subtotal() }}
                                        </span>
                                    </li>
                                    <li>
                                        Discount {{ Session('coupon')['code'] }}
                                        <span id="discount">
                                            ${{ Session('discounts')['discount'] }}
                                        </span>
                                    </li>
                                    <li>
                                        Subtotal After Discount
                                        <span id="subAfterDiscount">
                                            ${{ Session('discounts')['subtotal'] }}
                                        </span>
                                    </li>
                                    <li>
                                        VAT
                                        <span id="vat">
                                            ${{ Session('discounts')['tax'] }}
                                        </span>
                                    </li>
                                    <li>
                                        Total
                                        <span id="total">
                                            ${{ Session('discounts')['total'] }}
                                        </span>
                                    </li>
                                </ul>
                                <div class="payment">
                                    <div class="Cheque">
                                        <label>
                                            COD
                                            <input type="radio" name="pay">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="Cheque">
                                        <label>
                                            Card
                                            <input type="radio" name="pay">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="Cheque">
                                        <label>
                                            Stipe
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
                            @else
                            <div class="orderTotal">
                                <ul>
                                    <li>
                                        Subtotal
                                        <span id="subtotal">
                                            ${{ Cart::instance('cart')->subtotal() }}
                                        </span>
                                    </li>
                                    <li>
                                        VAT
                                        <span id="vat">
                                            ${{ Cart::instance('cart')->tax() }}
                                        </span>
                                    </li>
                                    <li>
                                        Total
                                        <span id="total">
                                            ${{ Cart::instance('cart')->total() }}
                                        </span>
                                    </li>
                                    <div class="clr"></div>
                                </ul>
                                <div class="payment">
                                    <div class="Cheque">
                                        <label>
                                            COD
                                            <input type="radio" name="pay">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="Cheque">
                                        <label>
                                            Card
                                            <input type="radio" name="pay">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="Cheque">
                                        <label>
                                            Stipe
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section for checkout page -->
@endsection
