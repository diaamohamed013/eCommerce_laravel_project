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
                        <h4>All Categories</h4>
                        <div class="category-item brand-item">
                            @foreach ($categories as $category)
                                <div class="item">
                                    <label for="category-{{ $category->id }}">
                                        {{ $category->name }} ({{ $category->products ? $category->products->count() : 0 }})
                                        <input type="checkbox" class="category-filter" value="{{ $category->id }}" id="category-{{ $category->id }}">
                                        <span></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="shop-brand">
                        <h4>Brand</h4>
                        <div class="brand-item">
                            @foreach ($brands as $brand)
                                <div class="item">
                                    <label for="brand-{{ $brand->id }}">
                                        {{ $brand->name }} ({{ $brand->products ? $brand->products->count() : 0 }})
                                        <input type="checkbox" class="brand-filter" value="{{ $brand->id }}" id="brand-{{ $brand->id }}">
                                        <span></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="shop-price">
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
                    </div> --}}
                    <div class="shop-price">
                        <h4>price</h4>
                        <div class="filter">
                            <div class="filter__label">
                                <input type="text" class="filter__input min-price" readonly>
                                <input type="text" class="filter__input max-price" readonly>
                            </div>
                            <div id="sliderPrice" class="filter__slider-price" 
                                data-min="0" 
                                data-max="1000" 
                                data-step="1">
                            </div>
                        </div>
                        <div class="price-btn">
                            <button class="btn price-filter-btn">Filter</button>
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
                            <a href="#" class="tag-link" data-value="{{ $tag->tag_name }}">{{$tag->tag_name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 order-1 order-lg-2">
                    <div class="row pb-4 pt-5">
                        <div class="col-lg-7 col-md-7">
                            <select class="sorting">
                                <option value>Default Sorting</option>
                            </select>
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
                    <div class="row" id="productList">
                        @foreach ($products as $product )
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="shop-card pb-2">
                                <div class="shop-pic ">
                                    <img src="{{ $product->image }}" alt="{{ $product->title }}">
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
                                        {{-- when no category show no category --}}
                                        {{ $product->category->name }}
                                    </h6>
                                    <h6>
                                        {{ $product->tags->pluck('tag_name') }}
                                    </h6>
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
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.0/nouislider.js"></script>

    <script>
            document.addEventListener('DOMContentLoaded', function () {

            const slider = document.getElementById('sliderPrice');

            // Check if slider is already initialized
            if (slider.noUiSlider) {
                slider.noUiSlider.destroy(); // Destroy existing slider instance
            }

            noUiSlider.create(slider, {
                start: [0, 1000],
                connect: true,
                range: {
                    'min': 0,
                    'max': 1000
                },
                step: 1
            });

            slider.noUiSlider.on('update', function (values, handle) {
                if (handle === 0) {
                    document.querySelector('.filter__input.min-price').value = Math.round(values[0]);
                } else {
                    document.querySelector('.filter__input.max-price').value = Math.round(values[1]);
                }
            });

            // Function to render products
            function renderProducts(products) {
                const productList = document.getElementById('productList');
                let html = '';
                products.data.forEach(product => {
                    html += `
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="shop-card pb-2">
                                <div class="shop-pic">
                                    <img src="${product.image}" alt="${product.title}">
                                    <div class="shop-pic-icon">
                                        <i class="fal fa-heart"></i>
                                    </div>
                                    <div class="shop-sale">sale</div>
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
                                    <h6>${product.category ? product.category.name : 'No Category'}</h6>
                                    <h6>${product.tags ? product.tags.map(tag => tag.tag_name).join(', ') : 'No Tags'}</h6>
                                    <a href="#">
                                        <h5>${product.title}</h5>
                                    </a>
                                    <p>
                                        $${product.sale_percentage}
                                        <span>$${product.price}</span>
                                    </p>
                                    <h6>${product.brand ? product.brand.name : 'No Brands'}</h6>
                                </div>
                            </div>
                        </div>`;
                });



                productList.innerHTML = html;
            }

            // Function to fetch filtered products
            function fetchFilteredProducts(selectedTag = null) {
                let categories = [];
                let brands = [];
                let priceRange = {};

                // Collect selected categories
                document.querySelectorAll('.category-filter:checked').forEach(function (category) {
                    categories.push(category.value);
                });

                // Collect selected brands
                document.querySelectorAll('.brand-filter:checked').forEach(function (brand) {
                    brands.push(brand.value);
                });


                    // Collect price range
            const minPrice = document.querySelector('.filter__input.min-price').value;
            const maxPrice = document.querySelector('.filter__input.max-price').value;

            if (minPrice && maxPrice) {
                priceRange = {
                    min: parseFloat(minPrice),
                    max: parseFloat(maxPrice)
                };
            }


                // Create the request body
                const requestBody = {
                    categories: categories,
                    brands: brands,
                    price_range: priceRange
                };

                // Add tag to request body if selected
                if (selectedTag) {
                    requestBody.tag = selectedTag;
                }

                // AJAX request
                fetch('{{ route('site.filter') }}', {  // Update this URL to match your route
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(requestBody)
                })
                .then(response => response.json())
                .then(data => {
                    renderProducts(data);
                })
                .catch(error => console.error('Error:', error));
            }

            // Event listener for category filter
            document.querySelectorAll('.category-filter').forEach(function (categoryFilter) {
                categoryFilter.addEventListener('change', function () {
                    fetchFilteredProducts();
                });
            });

            // Event listener for brand filter
            document.querySelectorAll('.brand-filter').forEach(function (brandFilter) {
                brandFilter.addEventListener('change', function () {
                    fetchFilteredProducts();
                });
            });

            document.querySelector('.price-filter-btn').addEventListener('click', function () {
            fetchFilteredProducts();
        });


            // Event listener for tag links
            document.querySelectorAll('.tag-link').forEach(function (tagLink) {
                tagLink.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    // Remove active class from all tags
                    document.querySelectorAll('.tag-link').forEach(link => {
                        link.classList.remove('active');
                    });
                    
                    // Add active class to clicked tag
                    this.classList.add('active');
                    
                    const tagValue = this.getAttribute('data-value');
                    fetchFilteredProducts(tagValue);
                });
            });
        });
    </script>

@endpush








