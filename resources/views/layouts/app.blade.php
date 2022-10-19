<!DOCTYPE html>
<html lang="en">
@php
    $site_setting = DB::table('sitesetting')->first();
@endphp
<head>
    <title>OneTech</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/bootstrap4/bootstrap.min.css">
    <link href="{{ asset('frontend') }}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend') }}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/plugins/slick-1.8.0/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/cart_responsive.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/cart_styles.css">
    {{-- Blog Style --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/blog_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/blog_responsive.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/blog_single_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/blog_single_responsive.css">

{{--    Contact Style--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/contact_responsive.css">
    {{-- Toster --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    {{-- SweetAlert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="http://js.stripe.com/v3/"></script>
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">

            <!-- Top Bar -->

            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('frontend') }}/images/phone.png" alt="">
                                </div>{{ $site_setting->phone_one }}
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('frontend') }}/images/mail.png" alt="">
                                </div><a href="mailto:fastsales@gmail.com">{{ $site_setting->email }}</a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                @guest()
                                @elseauth()
                                    <div class="top_bar_menu">
                                        <ul class="standard_dropdown top_bar_dropdown">
                                            <li>
                                                <a data-toggle="modal" data-target="#orderTrakingModal">My Order
                                                    Tracking
                                                    <i class="fas fa-chevron-down"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @endguest

                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        @php
                                        $language = Session::get('lang');
                                        @endphp
                                        <li>
                                            @if (Session::get('lang') == 'hindi')
                                            <a href="{{ route('language.english') }}">English
                                                <i class="fas fa-chevron-down"></i>
                                            </a>
                                            @else
                                            <a href="{{ route('language.hindi') }}">Hindi
                                                <i class="fas fa-chevron-down"></i>
                                            </a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <div class="top_bar_user">
                                    @guest
                                    <div class="user_icon"><img src="{{ asset('frontend') }}/images/user.svg" alt="">
                                    </div>
                                    <div><a href="{{ route('login') }}">Register/ Login</a></div>
                                    @else
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="{{ route('home') }}">
                                                <div class="user_icon"><img
                                                        src="{{ asset('frontend') }}/images/user.svg" alt="">
                                                </div> Profile<i class="fas fa-chevron-down"></i>
                                            </a>
                                            <ul>
                                                <li><a href="{{ route('user.wishlish') }}">Wishlist</a></li>
                                                <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                                                <li><a href="{{ 'home' }}">My Order</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="{{ url('/') }}"><img
                                            src="{{ asset('frontend') }}/images/logo.png" alt=""></a></div>
                            </div>
                        </div>
                        @php
                        $categories = DB::table('categories')->get();
                        @endphp
                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix">
                                            <input type="search" required="required" class="header_search_input"
                                                placeholder="Search for products...">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                    <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        @foreach ($categories as $category)
                                                        <li><a class="clc" href="#">{{ $category->category_name }}</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300"
                                                value="Submit"><img src="{{ asset('frontend') }}/images/search.png"
                                                    alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                @guest
                                @else
                                @php
                                $wishlist = DB::table('wishlists')
                                ->where('user_id', Auth::id())
                                ->get();
                                @endphp
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon"><img src="{{ asset('frontend') }}/images/heart.png"
                                            alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="{{ route('user.wishlish') }}">Wishlist</a>
                                        </div>
                                        <div class="wishlist_count">{{ count($wishlist) }}</div>
                                    </div>
                                </div>
                                @endguest

                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <img src="{{ asset('frontend') }}/images/cart.png" alt="">
                                            <div class="cart_count"><span>{{ Cart::count() }}</span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="{{ route('show.cart') }}">Cart</a></div>
                                            <div class="cart_price">${{ Cart::subtotal() }}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->


            @yield('content')

            <!-- Footer -->

            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 footer_col">
                            <div class="footer_column footer_contact">
                                <div class="logo_container">
                                    <div class="logo"><a href="#">{{ $site_setting->company_name }}</a></div>
                                </div>
                                <div class="footer_title">Got Question? Call Us 24/7</div>
                                <div class="footer_phone">{{ $site_setting->phone_one }}</div>
                                <div class="footer_contact_text">
                                    <p>{{ $site_setting->company_address }}</p>
                                </div>
                                <div class="footer_social">
                                    <ul>
                                        <li><a target="_blank" href="https://{{ $site_setting->facebook_link }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a target="_blank" href="https://{{ $site_setting->twitter_link }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a target="_blank" href="https://{{ $site_setting->youtube_link }}"><i class="fab fa-youtube"></i></a></li>
                                        <li><a target="_blank" href="https://{{ $site_setting->instragram_link }}"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 offset-lg-2">
                            <div class="footer_column">
                                <div class="footer_title">Find it Fast</div>
                                <ul class="footer_list">
                                    <li><a href="#">Computers & Laptops</a></li>
                                    <li><a href="#">Cameras & Photos</a></li>
                                    <li><a href="#">Hardware</a></li>
                                    <li><a href="#">Smartphones & Tablets</a></li>
                                    <li><a href="#">TV & Audio</a></li>
                                </ul>
                                <div class="footer_subtitle">Gadgets</div>
                                <ul class="footer_list">
                                    <li><a href="#">Car Electronics</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="footer_column">
                                <ul class="footer_list footer_list_2">
                                    <li><a href="#">Video Games & Consoles</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Cameras & Photos</a></li>
                                    <li><a href="#">Hardware</a></li>
                                    <li><a href="#">Computers & Laptops</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="footer_column">
                                <div class="footer_title">Customer Care</div>
                                <ul class="footer_list">
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Customer Services</a></li>
                                    <li><a href="#">Returns / Exchange</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Product Support</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>

            <!-- Copyright -->

            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div
                                class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                                <div class="copyright_content">
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());

                                    </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                        aria-hidden="true"></i> by <a href="https://colorlib.com"
                                        target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </div>
                                <div class="logos ml-sm-auto">
                                    <ul class="logos_list">
                                        <li><a href="#"><img src="{{ asset('frontend') }}/images/logos_1.png"
                                                    alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('frontend') }}/images/logos_2.png"
                                                    alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('frontend') }}/images/logos_3.png"
                                                    alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('frontend') }}/images/logos_4.png"
                                                    alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="orderTrakingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Track Your Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.order.tracking') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Order Id</label>
                            <input type="text" name="status_code" class="form-control"
                                placeholder="Enter Your Order Id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Track Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('frontend') }}/styles/bootstrap4/popper.js"></script>
    <script src="{{ asset('frontend') }}/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/plugins/greensock/TweenMax.min.js"></script>
    <script src="{{ asset('frontend') }}/plugins/greensock/TimelineMax.min.js"></script>
    <script src="{{ asset('frontend') }}/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="{{ asset('frontend') }}/plugins/greensock/animation.gsap.min.js"></script>
    <script src="{{ asset('frontend') }}/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="{{ asset('frontend') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="{{ asset('frontend') }}/plugins/slick-1.8.0/slick.js"></script>
    <script src="{{ asset('frontend') }}/plugins/easing/easing.js"></script>
    <script src="{{ asset('frontend') }}/js/custom.js"></script>
    <script src="{{ asset('frontend') }}/js/product_custom.js"></script>
    <script src="{{ asset('frontend') }}/js/cart_custom.js"></script>
    <script src="{{ asset('frontend') }}/js/blog_single_custom.js"></script>
    <script src="{{ asset('frontend') }}/plugins/easing/easing.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
    <script src="{{ asset('frontend') }}/js/contact_custom.js"></script>

    {{-- PRODUCT SHOW --}}
    <script src="{{ asset('frontend') }}/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="{{ asset('frontend') }}/plugins/parallax-js-master/parallax.min.js"></script>
    {{-- Toster --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Toster Message Script --}}
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}")
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}")
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}")
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}")
                break;
        }
        @endif

    </script>

    <script>
        $(document).on("click", "#return", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you Want to Return?",
                text: "Once Return, This will be return your Money!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Return Cancel!");
                    }
                });
        });
    </script>

</body>

</html>
