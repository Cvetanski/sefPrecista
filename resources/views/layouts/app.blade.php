<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="" rel="icon">
    <link href="" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Tps-Fonts:837" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/888b63cb31.js" crossorigin="anonymous"></script>

    <style type="text/css">
        @font-face {
            font-family: mr_Miroslav;
            src: url('{{('/fonts/837-font.otf') }}');
        }
    </style>

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet" type="text/css" >

    <!-- =======================================================
    * Template Name: Restaurantly - v3.1.0
    * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

        <div class="contact-info d-flex align-items-center">
        </div>

        <div class="languages d-none d-md-flex align-items-center">
            <ul>
            </ul>
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0 timer count-title count-number" >
            <a href="{{url("/")}}" style="text-decoration: none;font-size: 22px">
{{--                <div class="logoPrecista">--}}
{{--                    <img src="{{asset("/images/logo.png")}}">--}}
{{--                </div>--}}
{{--                <img src="{{asset('/images/logo.png')}}">--}}
                Свештена Пречистанска Обител
            </a>
        </h1>
        <!-- Uncomment below if you prefer to use an image2 logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="{{url("")}}">Почетна</a></li>
                <li class="dropdown"><a href="#" style="text-decoration: none"><span>Манастир</span><i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach($categories as $category)
                            @if($category->section_id == 1)
                            @if(count(array($category->subCategories))>0)
                        <li class="dropdown">
                              @if(count($category->subCategories) > 0)
                                <a class="nav-link disabled-link" href="{{ route('manastir',$category->slug) }}" style="text-decoration: none" >{{$category->title}}
                              @else
                                <a class="nav-link" href="{{ route('manastir',$category->slug) }}" style="text-decoration: none" >{{$category->title}}
                              @endif
                                @if(count($category->subCategories) > 0)
                                <i class="bi bi-chevron-right"></i>
                                @endif
                            </a>
                            <ul class="custom-menu-box-shadow">
                                @foreach($category->subCategories as $subCat)
                                <li class="dropdown">
                                    <a href="{{route('manastir',$subCat->slug) }}" style="text-decoration: none"><span>{{$subCat->title}}</span></a>
                                @endforeach
                            </ul>
                        </li>
                            @endif
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown"><a href="#" style="text-decoration: none"><span>Новости</span><i class="bi bi-chevron-down"></i></a>
                    <ul class="custom-menu-box-shadow">
                        @foreach($categories as $category)
                            @if($category->section_id == 2)
                                @if(count(array($category->subCategories))>0)
                                    <li class="dropdown">
                                        <a class="nav-link " href="{{route('manastir',$category->slug)}}" style="text-decoration: none">{{$category->title}}
                                            @if(count($category->subCategories) > 0)
                                                <i class="bi bi-chevron-right"></i>
                                            @endif
                                        </a>
                                        <ul class="custom-menu-box-shadow">
                                            @foreach($category->subCategories as $subCat)
                                                <li class="dropdown">
                                                    <a href="{{route('manastir',$subCat->slug) }}" style="text-decoration: none"><span>{{$subCat->title}}</span></a>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown"><a href="#" style="text-decoration: none"><span>Поучни Слова</span><i class="bi bi-chevron-down"></i></a>
                    <ul class="custom-menu-box-shadow">
                        @foreach($categories as $category)
                            @if($category->section_id == 3)
                                @if(count(array($category->subCategories))>0)
                                    <li class="dropdown">
                                        <a class="nav-link " href="{{route('manastir',$category->slug)}}" style="text-decoration: none">{{$category->title}}
                                            @if(count($category->subCategories) > 0)
                                                <i class="bi bi-chevron-right"></i>
                                            @endif
                                        </a>
                                        <ul class="custom-menu-box-shadow">
                                            @foreach($category->subCategories as $subCat)
                                                <li class="dropdown">
                                                    <a href="{{route('manastir',$subCat->slug) }}" style="text-decoration: none"><span>{{$subCat->title}}</span></a>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown"><a href="#" style="text-decoration: none"><span>Медија</span><i class="bi bi-chevron-down"></i></a>
                    <ul class="custom-menu-box-shadow">
                        @foreach($categories as $category)
                            @if($category->section_id == 4)
                                @if(count(array($category->subCategories))>0)
                                    <li class="dropdown">
                                        <a class="nav-link " href="{{route('manastir',$category->slug)}}" style="text-decoration: none">{{$category->title}}
                                            @if(count($category->subCategories) > 0)
                                                <i class="bi bi-chevron-right"></i>
                                            @endif
                                        </a>
                                        <ul class="custom-menu-box-shadow">
                                            @foreach($category->subCategories as $subCat)
                                                <li class="dropdown">
                                                    <a href="{{route('manastir',$subCat->slug) }}" style="text-decoration: none"><span>{{$subCat->title}}</span></a>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown"><a href="#" style="text-decoration: none"><span>Наши Производи</span><i class="bi bi-chevron-down"></i></a>
                    <ul class="custom-menu-box-shadow">
                        @foreach($categories as $category)
                            @if($category->section_id == 5)
                                @if(count(array($category->subCategories))>0)
                                    <li class="dropdown">
                                        <a class="nav-link " href="{{route('manastir',$category->slug)}}" style="text-decoration: none">{{$category->title}}
                                            @if(count($category->subCategories) > 0)
                                                <i class="bi bi-chevron-right"></i>
                                            @endif
                                        </a>
                                        <ul class="custom-menu-box-shadow">
                                            @foreach($category->subCategories as $subCat)
                                                <li class="dropdown">
                                                    <a href="{{route('manastir',$subCat->slug) }}" style="text-decoration: none"><span>{{$subCat->title}}</span></a>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{url('/')}}#contact">Контакт</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

    @yield('section')

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>Света Пречиста</h3>
                        <p><br><br>
                            <strong>Телефон:</strong> +389784520<br>
                            <strong>Е-пошта:</strong>svetaprecista@gmail.com <br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="https://www.facebook.com/SvBogorodicaPrecista" class="facebook"><i class="bx bxl-facebook"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Мени</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Почетна</a></li>


                        <li>
                            <i class="bx bx-chevron-right">

                            </i>
                            <a href="{{url('/')}}#events">Новости</a>
                        </li>

                        <li>
                            <i class="bx bx-chevron-right">

                            </i>
                            <a href="{{url('/')}}#contact">Контакт</a>
                        </li>

                        <li>
                            <i class="bx bx-chevron-right">

                            </i>
                            <a href="{{url('/')}}#contact">Продукти</a>
                        </li>
                    </ul>
                </div>


{{--                <div class="col-lg-3 col-md-6 footer-links">--}}
{{--                    <h4>Our Services</h4>--}}
{{--                    <ul>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Света Пречиста Богородица</span></strong>. Ги поседува сите права
        </div>
{{--        <div class="credits">--}}
{{--            <!-- All the links in the footer should remain intact. -->--}}
{{--            <!-- You can delete the links only if you purchased the pro version. -->--}}
{{--            <!-- Licensing information: https://bootstrapmade.com/license/ -->--}}
{{--            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->--}}
{{--            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>--}}
{{--        </div>--}}
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="{{asset('js/main.js')}}"></script>
    @yield('script')
</body>

</html>

