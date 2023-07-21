<?php
    require_once(__DIR__.'/Config/config.php');
    require_once(__DIR__.'/Config/function.php');
    $title = 'Hệ thống dịch vụ mạng xã hội Facebook | Instagram | Youtube | Tiktok';
    require_once(__DIR__.'/Theme/HeaderLanding.php');
?>
<body>
    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div></div>
            <hr />
        </div>
    </div>
    <!-- preloader area end -->
    <div class="header-style-01">
        <!-- support bar area end -->
        <nav class="navbar navbar-area navbar-expand-lg nav-style-02">
            <div class="container nav-container utility-nav">
                <div class="responsive-mobile-menu">
                    <div class="logo-wrapper">
                        <a href="<?=BASE_URL('home');?>" class="logo">
                            <img src="<?=BASE_URL('Assets/images/logo-web-dark.png');?>" alt="">
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                    <ul class="navbar-nav">
                        <li><a href="<?=BASE_URL('home');?>">Trang chủ</a></li>
                        <li class="menu-item-has-children">
                            <a href="#">Dịch vụ nổi bật</a>
                            <ul class="sub-menu">
                                <li><a href="<?=BASE_URL('home');?>">Facebook</a></li>
                                <li>
                                    <a href="<?=BASE_URL('home');?>">Instagram </a>
                                </li>
                                <li><a href="<?=BASE_URL('home');?>">Youtube </a></li>
                                <li><a href="<?=BASE_URL('home');?>">Tiktok</a></li>
                                <li>
                                    <a href="<?=BASE_URL('home');?>">Một số dịch vụ khác</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Liên hệ hỗ trợ</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="https://www.facebook.com/hvl2k3.it/">Facebook</a>
                                </li>
                                <li><a href="#">https://zalo.me/0862667899</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="nav-right-content">
                    <div class="btn-wrapper">
                        <a href="<?=BASE_URL('auth/login/');?>" class="boxed-btn utility-btn style-01">Đăng nhập</a>
                        <a href="<?=BASE_URL('auth/register/');?>" class="boxed-btn utility-btn">Đăng kí</a>
                    </div>
                </div>
        </nav>
        <!-- navbar area end -->
    </div>
    <div class="header-area header-bg-04  header-utility"
        style="background-image:url(/landing-page/img/header-slider/utility/bg.png);">
        <div class="utility-bg-img wow animate__animated animate__zoomIn" data-parallax='{"x": 100, "y": 60}'
            style="background-image:url(/landing-page/img/header-slider/utility/01.png);"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-inner">
                        <!-- header inner -->
                        <h1 class="title wow animate__animated animate__fadeInUp">Tạo hiệu ứng cho sự nổi tiếng của bạn
                        </h1>
                        <p class="utility-para">Hệ thống chuyên cung cấp các dịch vụ tăng Like, Follow, Share,
                            Comment, View Video,... cho các Mạng xã hội như Facebook, Instagram, Tiktok...</p>
                        <div class="btn-wrapper padding-top-30">
                            <a href="<?=BASE_URL('home');?>" class="btn-startup style-01 boxed-btn reverse-color">Bắt
                                đầu ngay</a>
                        </div>
                    </div>
                    <!-- //.header inner -->
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom-area padding-top-100">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-12">
                    <div class="single-app-item padding-bottom-55">
                        <div class="content">
                            <div class="icon">
                                <i class="flaticon-followers"></i>
                            </div>
                            <h3 class="title wow animate__animated animate__fadeInUp">Công nghệ</h3>
                            <p class="utility-para wow animate__animated animate__fadeInUp animated">Hệ thống được vận
                                hành hoàn toàn tự động 24/24.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="single-app-item padding-bottom-55">
                        <div class="content">
                            <div class="icon">
                                <i class="fa fa-lock"></i>
                            </div>
                            <h3 class="title wow animate__animated animate__fadeInUp">Bảo mật
                            </h3>
                            <p class="utility-para wow animate__animated animate__fadeInUp animated">Chúng tôi cam kết
                                sẽ bảo mật thông tin người dùng 1 cách tốt nhất.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="single-app-item padding-bottom-55">
                        <div class="content">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <h3 class="title wow animate__animated animate__fadeInUp">Hỗ trợ</h3>
                            <p class="utility-para wow animate__animated animate__fadeInUp animated">Đội ngũ hỗ trợ luôn
                                lắng nghe ý khiến khách hàng để phát triển hệ thống.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How to Get Started -->
    <div class="price-plan-area price-bg padding-bottom-120"
        style="background-image: url(/landing-page/img/bg/utility/bg.png);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title brand desktop-center padding-bottom-50">
                        <h3 class="title">Cấp bậc ưu đãi khách hàng
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-price-plan-02 wow animate__animated animate__fadeInUp animated">
                        <div class="price-header">
                            <h4 class="title">Thành viên</h4>
                        </div>
                        <div class="price-wrap">
                            <span class="price">0đ</span>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li>Không có ưu đãi</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <div class="btn-wrapper">
                                <a href="<?=BASE_URL('home');?>/" class="boxed-btn btn-startup">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-price-plan-02 wow animate__animated animate__fadeInUp animated">
                        <div class="price-header">
                            <h4 class="title">Cộng tác viên </h4>
                        </div>
                        <div class="price-wrap">
                            <span class="price">500,000<sup>đ</sup></span>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li>Có ưu đãi giá dịch vụ cộng tác viên.</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <div class="btn-wrapper">
                                <a href="<?=BASE_URL('home');?>/" class="boxed-btn btn-startup">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="single-price-plan-02 wow animate__animated animate__fadeInUp animated">
                        <div class="price-header">
                            <h4 class="title">Đại lý </h4>
                        </div>
                        <div class="price-wrap">
                            <span class="price">20,000,000<sup>đ</sup></span>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li>Có rất nhiều ưu đãi giá dịch vụ đại lý.</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <div class="btn-wrapper">
                                <a href="<?=BASE_URL('home');?>/" class="boxed-btn btn-startup">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Supports Content-->
    <div class="tracks-manages-area padding-top-120 padding-bottom-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="tracks-content-area padding-bottom-50">
                        <div class="section-title wow animate__animated animate__fadeInUp animated">
                            <h4 class="title">Bạn còn chờ đợi gì nữa?
                            </h4>
                            <p class="tracks-pera">Hãy sử dụng thử dịch vụ của chúng tôi nhé.

                            </p>
                            <div class="btn-wrapper padding-top-30">
                                <a href="<?=BASE_URL('auth/login');?>"
                                    class="btn-startup style-01 boxed-btn reverse-color text-white">Đăng nhập</a>
                                <a href="<?=BASE_URL('auth/register');?>"
                                    class="btn-startup style-01 boxed-btn reverse-color text-white">Đăng kí</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="supports-img bg-image wow animate__animated animate__backInUp"
                        data-parallax='{"x": -50, "y": 0}'
                        style="background-image: url(/landing-page/img/tracks/01.png);"></div>
                </div>
            </div>
        </div>
    </div>
 <?php
    require_once(__DIR__.'/Theme/FooterLanding.php');
 ?>