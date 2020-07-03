<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hatirpal.com : Online Wholesale Marketplace In Bangladesh</title>
    <meta name="keywords" content="hatirpal.com,hatirpal,shopping" />
    <meta name="description" content="Hatirpal.com is the largest online wholesale marketplace in Bangladesh.Hatirpal.com has been experimenting with and out to win the trust of buyers" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/icofont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bundle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('bazarbaarifront/css/bootstrap/css/bootstrap.min.css')}}">
<style>
.electronics-login-register ul li a{
color: white;
}
.electronics-login-register ul li a i{
color: white;
}

.header-contact-info ul li a{
    color: white;
}
.header-contact-info ul li a i{
    color:white;
}
.categories-search-wrapper {
    background-color: white;
}
.same-style-text a{
    color: white;
}
</style>
</head>
<body>
<div id="app">
<header style="background:cadetblue">
    <div class="header-top-wrapper-2 border-bottom-2">
        <div class="header-info-wrapper pl-200 pr-200" >
            <div class="header-contact-info">
                <ul>
                    <li><a href="#"><i class="pe-7s-call"></i> +8801400560808</a></li>
                    <li><a href="#"><i class="pe-7s-mail"></i> admin@hatirpal.com</a></li>
                </ul>
            </div>
            <div class="electronics-login-register">
                <ul>
                    <li style="font-color:white"><a href="#"><i class="pe-7s-repeat"></i>Compare</a></li>
                    <li><a href="#"><i class="pe-7s-like"></i>Wishlist</a></li>
                    <li><a href="#"><i class="pe-7s-flag"></i>Bangladesh</a></li>
                    <li><a class="border-none" href="#">$ USD</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-bottom pt-40 pb-30 clearfix" style="padding:5px">
        <div class="header-bottom-wrapper pr-200 pl-200">
            <div class="logo-3">
                <a href='/'>
                    <img src="/storage/default/logo.png" alt="" style="width: 150px;height:50px">
                </a>
            </div>
            <div class="categories-search-wrapper">
                <h3>Welcome to Hatirpal.com</h3>
            </div>
            <div class="trace-cart-wrapper">
                <div class="trace same-style">
                    @if (Route::has('login'))
                    @auth
                    @else
                    <div class="same-style-text">
                        <a href="/register"><h4>Register</h4></a>
                    </div>
                    <div class="same-style-text">
                        <a href="/login"><h4>Login</h4></a>
                    </div>
                    @endauth
                    @endif
                </div>
            </div>
            <div class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><router-link to='/'>HOME</router-link>

                            </li>
                            <li><a href="#">BLOG</a>

                            </li>
                            <li><a href="#"> Contact </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
@yield('content')
@include('layouts.includes.footer')
</div>
<script src="{{asset('js/app.js')}}"></script>
<!-- all js here -->
<script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('assets/js/popper.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/ajax-mail.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('bazarbaarifront/js/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bazarbaarifront/js/bootstrap.min.js')}}"></script>
{{-- <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
<script>paypal.Buttons().render('body');</script> --}}

</body>

</html>
