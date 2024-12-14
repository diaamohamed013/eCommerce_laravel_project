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
                                        <span class="wishlistIcon">
                                            @if (Cart::instance('wishlist')->content()->where('id', $product->id)->count() > 0)
                                                <a href="{{ route('site.wishlist.index') }}">
                                                    <i class="fas fa-heart" style="color: #e7ab3c"></i>
                                                </a>
                                            @else
                                                <form method="POST" action="{{ route('site.wishlist.store') }}"
                                                    class="add-to-wishlist-form">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="stock_quantity" value="1">
                                                    <input type="hidden" name="title" value="{{ $product->title }}">
                                                    <input type="hidden" name="price"
                                                        value="{{ $product->sale_percentage == '' ? $product->price : $product->sale_percentage }}">
                                                    <button class="wishlistBtn btn bg-transparent outline-0 border-0"
                                                        type="submit">
                                                        <i class="fal fa-heart"
                                                            style="color: #e7ab3c; font-size: 22px;"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </span>
                                    </div>
                                    @if (!empty($product->sale_percentage))
                                        <div class="shop-sale">
                                            sale
                                        </div>
                                    @endif
                                    <ul>
                                        <li class="cartIcon">
                                            <form method="POST" action="{{ route('site.cart.store') }}"
                                                class="add-to-cart-form">
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
            <div class="col-lg-3 offset-lg-1 col-md-12">
                <div class="women-pic">
                    <div class="women-pic-text">
                        <h2>
                            Men's
                        </h2>
                        <a href="{{ route('site.shop') }}">discover me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section of women products -->
@push('js')
    <script>
        $(document).on('click', '.addCart', function(e) {
            e.preventDefault();
            let button = $(this);
            let form = button.closest('.add-to-cart-form'); // Find the closest form
            let formData = form.serialize(); // Serialize form data
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('site.cart.store') }}', // Update with your route name
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.status === 'success') {
                        Toastify({
                            text: response.message,
                            className: "success",
                            duration: 3000,
                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "left", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                            onClick: function() {} // Callback after click
                        }).showToast();
                        $('.cartCount').html(response.cartCount); // update cart count in the header
                    }
                },
                error: function(xhr) {
                    let errorMessage = "An error occurred.";
                    if (xhr.status === 400 && xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON
                            .message; // Use the error message from the server
                    } else if (xhr.status === 401) {
                        errorMessage = "Please, login first.";
                    }
                    Toastify({
                        text: errorMessage,
                        className: "error",
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "left", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "#dc3741",
                        },
                        onClick: function() {} // Callback after click
                    }).showToast();
                    console.error(xhr.responseText);
                }
            });
        });
    </script>

    <script>
        $(document).on('click', '.wishlistBtn', function(e) {
            e.preventDefault();
            let button = $(this);
            let form = button.closest('.add-to-wishlist-form'); // Find the closest form
            let formData = form.serialize(); // Serialize form data
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('site.wishlist.store') }}', // Update with your route name
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.status === 'success') {
                        Toastify({
                            text: response.message,
                            className: "success",
                            duration: 3000,
                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "left", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                            onClick: function() {} // Callback after click
                        }).showToast();
                        $('.wishlistCount').html(response
                            .wishlistCount); // update cart count in the header
                        button.closest('.wishlistIcon').html(`
                            <a href="{{ route('site.wishlist.index') }}">
                                <i class="fas fa-heart" style="color: #e7ab3c"></i>
                            </a>
                        `);
                    }
                },
                error: function(xhr) {
                    Toastify({
                        text: "Someting went wrong, Please try again !",
                        className: "success",
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "left", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "#dc3741",
                        },
                        onClick: function() {} // Callback after click
                    }).showToast();
                    button.closest('.wishlistIcon').html(`
                            <form method="POST" action="{{ route('site.wishlist.store') }}"
                                                        class="add-to-wishlist-form">
                                                        @csrf
                                                        @if (!empty($product->id))
                                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                                        <input type="hidden" name="stock_quantity" value="1">
                                                        <input type="hidden" name="title" value="{{ $product->title }}">
                                                        <input type="hidden" name="price"
                                                            value="{{ $product->sale_percentage == '' ? $product->price : $product->sale_percentage }}">
                                                        @endif
                                                            <button class="wishlist btn bg-transparent outline-0 border-0" type="submit">
                                                            <i class="fal fa-heart" style="color: #e7ab3c; font-size: 22px;"></i>
                                                        </button>
                                                    </form>
                    `);
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
@endpush
