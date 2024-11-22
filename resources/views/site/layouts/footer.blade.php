    <!-- start footer section -->
    <footer>
        <!-- start section of logos -->
        <section class="logos">
            <div class="container">
                <div class="owl-carousel owl-theme" id="logos">
                    <div class="item pic1">
                        <img src="{{ asset('site/img/logo-1.png') }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('site/img/logo-2.png') }}" alt="">
                    </div>
                    <div class="item pic3">
                        <img src="{{ asset('site/img/logo-3.png') }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('site/img/logo-4.png') }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('site/img/logo-5.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- end section of logos -->
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="footerLogo pb-5">
                        <a href="{{ route('site.home') }}">
                            <img src="{{ asset('site/img/footer-logo.png') }}" alt="logo">
                        </a>
                    </div>
                    <div class="footerAddress">
                        <span>
                            Address: 60-49 Road 11378 New York
                        </span>
                    </div>
                    <div class="footerPhone">
                        <span>
                            Phone: +65 11.188.888
                        </span>
                    </div>
                    <div class="footerMail">
                        <span>
                            Email: hello.test@gmail.com
                        </span>
                    </div>
                    <div class="footerSocial pt-5">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </div>

                </div>
                <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                    <div class="information">
                        <h4>Information</h4>
                        <ul>
                            <li>
                                <a href="#">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    CheckOut
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Contact
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Serivius
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                    <div class="information">
                        <h4>My Account</h4>
                        <ul>
                            <li>
                                <a href="#">
                                    My Account
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Contact
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Shopping Cart
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Shop
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="joinNow">
                        <h4>
                            Join Our Newsletter Now
                        </h4>
                        <span>
                            Get E-mail updates about our latest shop and
                            special offers.
                        </span>
                        <form>
                            <input type="text" placeholder="Entet Your Mail">
                            <button class="text-uppercase">subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="lowFooter py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <span>
                            Copyright ©2020 All rights reserved | This template is made with
                            <span>
                                <i class="fal fa-heart"></i>
                            </span>
                            by <a href="#">Colorlib</a>
                        </span>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="payment">
                            <img src="{{ asset('site/img/payment-method.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer section -->



    <script src="{{ asset('site/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('site/js/popper.min.js') }}"></script>
    <script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/js/select2.min.js"></script>
    @stack('js')
    <script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('site/js/main.js') }}"></script>
    </body>

    </html>
