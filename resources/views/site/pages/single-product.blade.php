@extends('site.master')

@section('title', 'Shop')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.0/nouislider.css">
@endpush

@section('page', 'Shop')
@section('content')
    @include('site.layouts.breadcrumb')
    <section class="shop py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="productList">
                        <div class="card mb-3">
                            <div class="shop-card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="shop-pic ">
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                                            <div class="shop-sale">
                                                sale
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="shop-text">
                                                <h5 class="card-title">{{ $product->title }}</h5>
                                                <p class="card-text mb-2">
                                                    {{ $product->category->name }}
                                                </p>
                                                @foreach ($product->tags as $tag)
                                                    <span class="badge bg-warning text-white py-1 my-1">{{ $tag->tag_name }}
                                                    </span>
                                                @endforeach
                                                <p class="mt-2">
                                                    ${{ $product->sale_percentage }}
                                                    <span> ${{ $product->price }}</span>
                                                </p>
                                                <h6 class="mt-2 mb-3">
                                                    {{ $product->brand->name }}
                                                </h6>
                                                @if (Cart::instance('cart')->content()->where('id', $product->id)->count() > 0)
                                                    <a href="{{ route('site.cart.index') }}"
                                                        class="btn mb-3 text-capitalize">
                                                        Go to Cart
                                                    </a>
                                                @else
                                                    <form method="POST" action="{{ route('site.cart.store') }}">
                                                        @csrf
                                                        <div class="d-flex mb-4" style="gap: 10px;">
                                                            <div class="shopcart-qty">
                                                                <div class="value-button" id="decrease"
                                                                    value="Decrease Value">
                                                                    -</div>
                                                                <input type="number" id="number" value="1"
                                                                    min="1" name="stock_quantity" />
                                                                <div class="value-button" id="increase"
                                                                    value="Increase Value">
                                                                    +</div>
                                                            </div>
                                                            <input type="hidden" name="id"
                                                                value="{{ $product->id }}">
                                                            <input type="hidden" name="title"
                                                                value="{{ $product->title }}">
                                                            <input type="hidden" name="price"
                                                                value="{{ $product->sale_percentage == '' ? $product->price : $product->sale_percentage }}">
                                                            <button type="submit" class="btn">
                                                                Add to Cart
                                                            </button>
                                                        </div>
                                                    </form>
                                                @endif
                                                <form method="POST">
                                                    @csrf
                                                    <button class="btn bg-transparent" style="color: #e7ab3c !important;">
                                                        Add to WishList
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <h4>
                        Related Products
                    </h4>
                </div>
                @foreach ($related_products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="shop-card pb-2">
                            <div class="shop-pic ">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                                <div class="shop-pic-icon">
                                    <i class="fal fa-heart"></i>
                                </div>
                                <div class="shop-sale">
                                    sale
                                </div>
                                <ul>
                                    <li>
                                        @if (Cart::instance('cart')->content()->where('id', $product->id)->count() > 0)
                                            <a href="{{ route('site.cart.index') }}">
                                                <i class="fas fa-shopping-basket  text-white"></i>
                                            </a>
                                        @else
                                            <form method="POST" action="{{ route('site.cart.store') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="stock_quantity" value="1">
                                                <input type="hidden" name="title" value="{{ $product->title }}">
                                                <input type="hidden" name="price"
                                                    value="{{ $product->sale_percentage == '' ? $product->price : $product->sale_percentage }}">
                                                <button class="addCart btn p-0" type="submit">
                                                    <i class="fas fa-shopping-cart text-white"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="{{ route('site.single-product', $product->id) }}">
                                            <span>+ Quick View</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="far fa-random"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-text text-center">
                                <h6>
                                    {{-- when no category show no category --}}
                                    {{ $product->category->name }}
                                </h6>
                                @foreach ($product->tags as $tag)
                                    <span class="badge bg-light text-muted py-1 my-1">{{ $tag->tag_name }}</span>
                                @endforeach
                                <a href="{{ route('site.single-product', $product->id) }}">
                                    <h5>
                                        {{ $product->title }}
                                    </h5>
                                </a>
                                <p>
                                    ${{ $product->sale_percentage }}
                                    <span> ${{ $product->price }}</span>
                                </p>
                                <h6>
                                    {{ $product->brand->name }}
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
