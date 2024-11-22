<!-- start navbar that displayed in responsive mood -->
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-brand" href="{{ route('site.home') }}">
            <div class="shopping">
                <i class="fal fa-heart ml-3">
                    <span class="one">1</span>
                </i>
                <i class="fal fa-shopping-bag ml-3 mr-3">
                    <span class="one">3</span>

                    <!-- start div that will be showen when hover over shopping bag icon -->
                    <div class="shoppingHover">
                        <div class="container border-bottom">
                            <div class="row">
                                <div class="lg-2 col-md-2 col-sm-4 col-4">
                                    <img src="{{ asset('site/img/download.webp') }}">
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-6 col-6">
                                    <span>
                                        $60.00 x 1
                                    </span>
                                    <p class="text-wrap">
                                        Kabino Bedside Table
                                    </p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <i class="fal fa-times"></i>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="lg-2 col-md-2 col-sm-4 col-4">
                                    <img src="{{ asset('site/img/download (1).webp') }}">
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-6 col-6">
                                    <span>
                                        $60.00 x 1
                                    </span>
                                    <p class="text-wrap">
                                        Kabino Bedside Table
                                    </p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <i class="fal fa-times"></i>
                                </div>
                            </div>
                        </div>
                        <div class="selectTotal p-3">
                            <div class="container">
                                <span>
                                    TOTAL:
                                </span>
                                <span>
                                    $120.00
                                </span>
                            </div>
                        </div>
                        <div class="selectButton">
                            <div class="container">
                                <div class="row">
                                    <div class="cl-sm-12 col-12">
                                        <a class="btn1 viewCard" href="#">
                                            View Card
                                        </a>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <a class="btn1 checkOut" href="#">
                                            Check Out
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end div that will be showen when hover over shopping bag icon -->

                </i>
                <span>$150.00</span>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span>MENU</span>
            <span>
                <i class="fal fa-bars"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('site.home') }}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.html">Shop</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        All Department
                        <div class='fa fa-caret-right right'></div>
                    </a>
                    <ul>
                        <li>
                            <a href="#" class="active nav-link1">
                                T-shirts
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link1">
                                Shoes
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link1">
                                Shirts
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link1">
                                Bags
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link1">
                                Dresses
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Collection
                        <div class='fa fa-caret-right right'></div>
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                Men's
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Women's
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Kid's
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('site.contact') }}">Contact</a>
                </li>
                @auth
                    <li class="nav-item ">
                        <a class="nav-link" href="">Shopping Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">CheckOut</a>
                    </li>
                @endauth
                @if (Auth::check() && Auth::user()->hasRole(['super-admin', 'admin']))
                    <li class="nav-item1 ">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
<!-- end navbar that displayed in responsive mood -->
