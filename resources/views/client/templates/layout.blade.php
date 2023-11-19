<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Book Store</title>
        <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('client/assets/img/favicon.ico')}}">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('client/assets/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{ asset('client/assets/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{ asset('client/assets/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{ asset('client/assets/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{ asset('client/assets/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{ asset('client/assets/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{ asset('client/assets/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{ asset('client/assets/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{ asset('client/assets/css/slick.css')}}">
            <link rel="stylesheet" href="{{ asset('client/assets/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{ asset('client/assets/css/style.css')}}">
            {{-- @include('client.templates.link_header') --}}
            @include('client.templates.script_header')
            @yield('css')
   </head>

   <body>


    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">

               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                <div class="logo">
                                    <a class="navbar-brand text-primary logo h5 align-self-center" href="{{ route('client.home') }}">
                                        BookStore Online
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('client.home') }}">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('client.cart') }}">Giỏ hàng</a>
                                            </li>
                                            @if (Auth::check())
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('client.order.list')}}">Hóa đơn</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('logout')}}">Đăng xuất</a>
                                                </li>
                                                @if (Auth::user()->role == 1)
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{route('admin')}}">Admin</a>
                                                    </li>
                                                @endif
                                            @else
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <li class="d-none d-xl-block">
                                        <div class="form-box f-right ">
                                            <form action="{{ route('client.search')}}" method="GET">
                                            <input type="text" name="key_name" placeholder="Search products">
                                            <div class="search-icon">
                                                <button type="submit" ><i class="fas fa-search special-tag"></i></button>

                                            </div>
                                        </form>
                                        </div>
                                     </li>

                                    <li>
                                        <div class="mt-2">
                                            <a class="nav-icon position-relative text-decoration-none" href="{{route('client.cart')}}">
                                                <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                                                <span
                                                    class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                                                    {{ session()->get('cart') != null ? count(session()->get('cart')) : '0' }}
                                                                        </span>
                                            </a>
                                            @if (Auth::check())
                                                <a class=" text-black-50" href="{{ route('client.profile') }}">
                                                    {{-- <img src="{{ asset(Auth::user()->image) }}" width="35" alt="Avatar"
                                                        class="rounded-circle"> --}}
                                                        {{ Auth::user()->name }}
                                                        {{-- <span class="text-black-50">{{ Auth::user()->name }}</span> --}}
                                                </a>
                                            @endif
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>

    <main>

        <!-- slider Area Start -->
        @include('client.templates.error')
       @yield('main')


    </div>
    </main>
   <footer>

       <!-- Footer Start-->
       <div class="footer-area footer-padding">
           <div class="container">
               <div class="row d-flex justify-content-between">
                   <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                      <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                             <!-- logo -->
                             <a class="navbar-brand text-primary logo h5 align-self-center" href="">
                                BookStore Online
                            </a>

                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>It is very important to take care of the patient, to achieve the growth of the patient, but it is done in the same time as the work.</p>
                               </div>
                            </div>
                        </div>
                      </div>
                   </div>
                   <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                       <div class="single-footer-caption mb-50">
                           <div class="footer-tittle">
                               <h4>Quick Links</h4>
                               <ul>
                                   <li><a href="#">About</a></li>
                                   <li><a href="#"> Offers & Discounts</a></li>
                                   <li><a href="#"> Get Coupon</a></li>
                                   <li><a href="#">  Contact Us</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                       <div class="single-footer-caption mb-50">
                           <div class="footer-tittle">
                               <h4>New Products</h4>
                               <ul>
                                   <li><a href="#">Woman Cloth</a></li>
                                   <li><a href="#">Fashion Accessories</a></li>
                                   <li><a href="#"> Man Accessories</a></li>
                                   <li><a href="#"> Rubber made Toys</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                       <div class="single-footer-caption mb-50">
                           <div class="footer-tittle">
                               <h4>Support</h4>
                               <ul>
                                <li><a href="#">Frequently Asked Questions</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Report a Payment Issue</a></li>
                            </ul>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-7">

                </div>
                 <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="footer-copy-right f-right">
                        <!-- social -->
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>
           </div>
       </div>
       <!-- Footer End-->

   </footer>

	<!-- JS here -->

		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ asset('client/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{ asset('client/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{ asset('client/assets/js/popper.min.js')}}"></script>
        <script src="{{ asset('client/assets/js/bootstrap.min.js')}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{ asset('client/assets/js/jquery.slicknav.min.js')}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('client/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('client/assets/js/slick.min.js')}}"></script>

		<!-- One Page, Animated-HeadLin -->
        <script src="{{ asset('client/assets/js/wow.min.js')}}"></script>
		<script src="{{ asset('client/assets/js/animated.headline.js')}}"></script>
        <script src="{{ asset('client/assets/js/jquery.magnific-popup.js')}}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{ asset('client/assets/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{ asset('client/assets/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{ asset('client/assets/js/jquery.sticky.js')}}"></script>

        <!-- contact js -->
        <script src="{{ asset('client/assets/js/contact.js')}}"></script>
        <script src="{{ asset('client/assets/js/jquery.form.js')}}"></script>
        <script src="{{ asset('client/assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{ asset('client/assets/js/mail-script.js')}}"></script>
        <script src="{{ asset('client/assets/js/jquery.ajaxchimp.min.js')}}"></script>

		<!-- Jquery Plugins, main Jquery -->
        <script src="{{ asset('client/assets/js/plugins.js')}}"></script>
        <script src="{{ asset('client/assets/js/main.js')}}"></script>
        {{-- @include('client.templates.footer') --}}
        @include('client.templates.script_footer')
        @yield('script_footer')

    </body>
</html>
