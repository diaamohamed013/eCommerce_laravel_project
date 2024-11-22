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
                <div class="col-lg-3 col-md-6 order-2 order-lg-1 pt-3">
                    <div class="blog-category">
                        <h4>
                            categories
                        </h4>
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="#">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="shop-brand">
                        <h4>
                            brand
                        </h4>
                        <div class="brand-item">
                            @foreach ($brands as $brand)
                                <div class="item">
                                    <label for="calvin">
                                        {{ $brand->name }}
                                        <input type="checkbox" id="calvin">
                                        <span></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="shop-price">
                        <h4>
                            price
                        </h4>
                        <!-- start code of price range slider -->
                        <div class="filter">
                            <div class="filter__label">
                                <input type="text" class="filter__input">
                                <input type="text" class="filter__input">
                            </div>
                            <div id="sliderPrice" class="filter__slider-price" data-min="33" data-max="98" data-step="1">
                            </div>
                        </div>
                        <!-- end code of price range slider -->
                        <div class="price-btn">
                            <button class="btn">filter</button>
                        </div>
                    </div>
                    <div class="shop-color">
                        <h4>
                            color
                        </h4>
                        <div class="color-item">
                            <div class="item">
                                <input type="radio" id="black">
                                <label for="black">
                                    black
                                </label>
                            </div>
                            <div class="item">
                                <input type="radio" id="violet">
                                <label class="violet" for="violet">
                                    violet
                                </label>
                            </div>
                            <div class="item">
                                <input type="radio" id="blue">
                                <label class="blue" for="blue">
                                    blue
                                </label>
                            </div>
                            <div class="item">
                                <input type="radio" id="yellow">
                                <label class="yellow" for="yellow">
                                    yellow
                                </label>
                            </div>
                            <div class="item">
                                <input type="radio" id="red">
                                <label class="red" for="red">
                                    red
                                </label>
                            </div>
                            <div class="item">
                                <input type="radio" id="green">
                                <label class="green" for="green">
                                    green
                                </label>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </div>
                    <div class="shop-size">
                        <h4>
                            size
                        </h4>
                        <div class="size-item">
                            <label for="small">s
                                <input type="radio" id="small">
                            </label>

                            <label for="medium">m
                                <input type="radio" id="medium">
                            </label>

                            <label for="larg">l
                                <input type="radio" id="larg">
                            </label>

                            <label for="xlarg">xs
                                <input type="radio" id="xlarg">
                            </label>

                        </div>
                    </div>
                    <div class="blog-tags">
                        <h4>
                            product tags
                        </h4>
                        @foreach ($tags as $tag)
                            <a href="#">{{$tag->tag_name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 order-1 order-lg-2">
                    <div class="row pb-4 pt-5">
                        <div class="col-lg-7 col-md-7">
                            <select class="sorting">
                                <option value>Default Sorting</option>
                            </select>
                            <!-- <div class="sorting default">
                                        <span>Default Sorting</span>
                                        <ul>
                                            <li>
                                                Default Sorting
                                            </li>
                                        </ul>
                                    </div> -->
                            <select class="show">
                                <option value>Show: </option>
                            </select>
                            <!-- <div class="show default">
                                        <span>Show:</span>
                                        <ul>
                                            <li>
                                                Show:
                                            </li>
                                        </ul>
                                    </div> -->
                            <div class="clr"></div>
                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                            <div class="list-text">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="shop-card pb-2">
                                <div class="shop-pic ">
                                    <img src="{{ asset('site/img/shop1.jpg') }}" alt="product-1">
                                    <div class="shop-pic-icon">
                                        <i class="fal fa-heart"></i>
                                    </div>
                                    <div class="shop-sale">
                                        sale
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fal fa-clipboard"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
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
                                        towel
                                    </h6>
                                    <a href="#">
                                        <h5>
                                            Pure Pineapple
                                        </h5>
                                    </a>
                                    <p>
                                        $14.00
                                        <span> $35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="shop-card pb-2">
                                <div class="shop-pic ">
                                    <img src="{{ asset('site/img/shop 2.jpg') }}" alt="product-2">
                                    <div class="shop-pic-icon">
                                        <i class="fal fa-heart"></i>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fal fa-clipboard"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
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
                                        coat
                                    </h6>
                                    <a href="#">
                                        <h5>
                                            Guangzhou sweater
                                        </h5>
                                    </a>
                                    <p>
                                        $13.00
                                        <span> $35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="shop-card pb-2">
                                <div class="shop-pic ">
                                    <img src="{{ asset('site/img/shop 3.jpg') }}" alt="product-3">
                                    <div class="shop-pic-icon">
                                        <i class="fal fa-heart"></i>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fal fa-clipboard"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
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
                                        shoes
                                    </h6>
                                    <a href="#">
                                        <h5>
                                            Guangzhou sweater
                                        </h5>
                                    </a>
                                    <p>
                                        $34.00
                                        <span> $35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="shop-card pb-2">
                                <div class="shop-pic ">
                                    <img src="{{ asset('site/img/shop 5.jpg') }}" alt="product-5">
                                    <div class="shop-pic-icon">
                                        <i class="fal fa-heart"></i>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fal fa-clipboard"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
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
                                        shoes
                                    </h6>
                                    <a href="#">
                                        <h5>
                                            Men's Painted Hat
                                        </h5>
                                    </a>
                                    <p>
                                        $44.00
                                        <span> $35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="loading-more">
                                <i class="fad fa-spinner"></i>
                                <a href="#">
                                    loading more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.0/nouislider.js"></script>
@endpush
