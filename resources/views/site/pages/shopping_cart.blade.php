@extends('site.master')

@section('title', 'Shopping Cart')

@section('sub_page', 'Shopping Cart')

@section('content')

    @include('site.layouts.breadcrumb_inside')
    @if ($items->count() > 0)
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
                                    @foreach ($items as $item)
                                        <tr>
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
                                                <form style="width: auto; border: unset;" method="POST"
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
                </div>
                <div class="row py-5">
                    <div class="col-lg-4 col-md-12">
                        <div class="cartbuttons d-flex">
                            <a href="{{ route('site.shop') }}" class="btn2 text-capitalize">
                                continue shopping
                            </a>
                            <form method="POST" action="{{route('site.cart.destroy')}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn3 text-capitalize" type="submit">
                                    clear cart
                                </button>
                            </form>
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
                                    <span>
                                        {{ Cart::instance('cart')->subtotal() }}
                                    </span>
                                </li>
                                <li>
                                    VAT
                                    <span>
                                        {{ Cart::instance('cart')->tax() }}
                                    </span>
                                </li>
                                <li>
                                    Total
                                    <span>
                                        {{ Cart::instance('cart')->total() }}
                                    </span>
                                </li>
                            </ul>
                            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-12 col-md-12">
                    <div class="cartbox text-center">
                        <h2>
                            Your Cart is Empty
                        </h2>
                        <p>
                            You have no items in your shopping cart.
                        </p>
                        <a href="{{ route('site.shop') }}" class="btn">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('js')
    <script>
        $(function() {
            $('.decreaseQty').click(function() {
                $(this).closest('form').submit();
            });

            $('.increaseQty').click(function() {
                $(this).closest('form').submit();
            });
        })
    </script>
@endpush
