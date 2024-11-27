<!-- start div that contain the logo and text input -->
<div class="lowHead">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <a href="{{ route('site.home') }}">
                    <img src="{{ asset('site/img/logo.png') }}">
                </a>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="cate">
                            <button class="btn text-left">
                                all category
                                <i class="fal fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-12">
                        <div class="input-group" style="position: relative;">
                            <input type="text" class="form-control" id="global-search" placeholder="What do you need?">
                            <div class="input-group-append">
                                <button class="btn" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Dropdown for search results -->
                        <div class="search-results" id="global-search-results" style="display:none;"></div>
                    </div>
                </div>
            </div>
            @auth
                <div class="col-lg-3 col-md-3 text-center p-2">
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
                                        <div class="lg-2 col-md-2 col-sm-2 col-2">
                                            <div class="pic">
                                                <img src="{{ asset('site/img/download.webp') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                            <div class="txt">
                                                <span>
                                                    $60.00 x 1
                                                </span>
                                                <p>
                                                    Kabino Bedside Table
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                            <div class="icon">
                                                <i class="fal fa-times"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row py-3">
                                        <div class="lg-2 col-md-2 col-sm-2 col-2">
                                            <div class="pic">
                                                <img src="{{ asset('site/img/download (1).webp') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                            <div class="txt">
                                                <span>
                                                    $60.00 x 1
                                                </span>
                                                <p>
                                                    Kabino Bedside Table
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                            <div class="icon">
                                                <i class="fal fa-times"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="selectTotal py-3">
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
                                        <a class="btn1 viewCard" href="#">
                                            View Card
                                        </a>
                                        <a class="btn1 checkOut" href="#">
                                            Check Out
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- end div that will be showen when hover over shopping bag icon -->

                        </i>
                        <span>$150.00</span>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>
<!-- end dic that contain the logo and text input -->