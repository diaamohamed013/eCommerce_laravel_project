<!-- start section of women products -->
<section class="men">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="owl-carousel owl-theme" id="demo-men">
                    @foreach ($productsMen as $product)
                        <div class="item">
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
                                            <a href="{{route('site.single-product', $product->id)}}">
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
            </div>
            <div class="col-lg-3 offset-lg-1 col-md-12">
                <div class="women-pic">
                    <div class="women-pic-text">
                        <h2>
                            Men's
                        </h2>
                        <a href="{{route('site.shop')}}">discover me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section of women products -->
