<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
    <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/responsive.css') }}" rel="stylesheet">
    @yield('header')
    <link rel="shortcut icon" href="{{ asset('public/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('public/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('public/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('public/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('public/images/ico/apple-touch-icon-57-precomposed.png') }}">
    <link href="{{ asset('public/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/elegant-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/slicknav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <span><a href="#"><i class="fa fa-phone"></i> 0909090909 </a></span>
                                <span><a href="#"><i class="fa fa-envelope"></i> traicaynhapkhau@gmail.com</a>
                                </span>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        <!--/header_top-->
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="{{ asset('public/images/home/logo100.png') }}"
                                    alt="" /></a>
                        </div>
                    </div>

                    <div class="col-lg-7 text-right col-md-7">
                        <ul class="nav-right">
                            <li class="heart-icon"><a href="#"><i class="fa fa-user"></i> Tài khoản</a></li>
                            <li class="heart-icon"><a href="{{ route('postlogin') }}"><i class="fa fa-lock"></i> Đăng
                                    nhập</a>
                            </li>

                            <li class="cart-icon"><a href="#">

                                    <i class="fa fa-shopping-cart"></i> Giỏ hàng
                                    <span>3</span>

                                </a>
                                <div class="cart-hover">
                                    <div id="change-item-cart">
                                        
                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>₫120.00</h5>
                                        </div>
                                        <div class="select-button">
                                            <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                            <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->
    </header>

    <!--/header-->
    <x-main-menu />
    <section class="maincontent">
        @yield('content')
    </section>

    <footer id="footer">
        <!--Footer-->

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Dịch vụ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Hổ trợ trực tuyến</a></li>
                                <li><a href="#">Liên hệ chúng tôi</a></li>
                                <li><a href="#">Tình trạng đơn hàng</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Tài khoản</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li> <a href="#"> Đăng nhập người dùng </a></li>
                                <li> <a href="#"> Đăng ký người dùng </a></li>
                                <li> <a href="#"> Tạo tài khoản </a></li>
                                <li> <a href="#"> Đơn đặt hàng của tôi </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Chính sách khách hàng</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Chính sách mua hàng</a></li>
                                <li><a href="#">Chính sách bảo hành</a></li>
                                <li><a href="#">Chính sách đổi sản phẩm</a></li>
                                <li><a href="#">Giao hàng- Thanh toán</a></li>
                                <li><a href="#">Bảo mật thông tin</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Giới Thiệu</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Thông tin công ty</a></li>
                                <li><a href="#">Vị trí cửa hàng</a></li>
                                <li><a href="#">Liên hệ</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Thông tin liên hệ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">CSKH</a></li>
                                <li><a href="#">Mua hàng</a></li>
                                <li><a href="#">Email</a></li>

                            </ul>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Email của bạn" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->



    <script src="{{ asset('public/js/jquery.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('public/js/price-range.js') }}"></script>
    <script src="{{ asset('public/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('public/js/main.js') }}"></script>
    <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.slicknav.js') }}"></script>
    @yield('footer')
</body>

</html>
