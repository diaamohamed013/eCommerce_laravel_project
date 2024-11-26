@extends('site.master')

@section('title', $category->name)

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.0/nouislider.css">
@endpush

@section('page', $category->name )

@section('content')
    @include('site.layouts.breadcrumb')
    <section class="shop py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>
                        {{ $category->name }} Products
                    </h2>
                </div>
            </div>
            <div class="row" id="productList">
                @foreach ($products as $product)
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
                                        <a href="#">
                                            <i class="fas fa-shopping-cart text-white"></i>
                                        </a>
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
                                <a href="#">
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
            <div class="row mt-4">
                <div class="col-12">
                    <div class="paginationBox">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
