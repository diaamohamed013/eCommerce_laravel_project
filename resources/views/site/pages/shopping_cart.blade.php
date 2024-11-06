@extends('site.master')

@section('title', 'Shopping Cart')

@section('sub_page', 'Shopping Cart')

@section('content')

    @include('site.layouts.breadcrumb_inside')
    <section class="shopcart py-5">
        <div class="container">
            <div class="row">
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
                                <tr>
                                    <td>
                                        <img src="{{asset('site/img/product-1.jpg')}}">
                                    </td>
                                    <td>
                                        <h5>
                                            Pure Pineapple
                                        </h5>
                                    </td>
                                    <td>
                                        <span>$60.00</span>
                                    </td>
                                    <td>
                                        <form>
                                            <div class="value-button" id="decrease" onclick="decreaseValue()"
                                                value="Decrease Value">-</div>
                                            <input type="number" id="number" value="0" />
                                            <div class="value-button" id="increase" onclick="increaseValue()"
                                                value="Increase Value">+</div>
                                        </form>
                                    </td>
                                    <td>
                                        <span>$60.00</span>
                                    </td>
                                    <td>
                                        <i class="fal fa-times"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-lg-4 col-md-12">
                    <div class="cartbuttons text-uppercase">
                        <button class="btn2">
                            continue shopping
                        </button>
                        <button class="btn3">
                            update cart
                        </button>
                    </div>
                    <div class="discount">
                        <h6>
                            discount codes
                        </h6>
                        <form>
                            <input type="text" placeholder="Enter Your Codes">
                            <button class="discountbtn">
                                APPLY
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-4 col-md-12">
                    <div class="carttotal">
                        <ul>
                            <li>
                                Subtotal
                                <span>$240.00</span>
                            </li>
                            <li>
                                Total
                                <span>$240.00</span>
                            </li>
                        </ul>
                        <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
