<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PokeShuffler</title>

    <!-- Bootstrap -->
    <link href="<?php echo url(''); ?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo url(''); ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo url(''); ?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo url(''); ?>/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo url(''); ?>/assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="<?php echo url(''); ?>/assets/build/css/custom.min.css" rel="stylesheet">
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/3000ffabee.js" crossorigin="anonymous"></script>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="<?php echo url(''); ?>/assets\home_panel_assets\home_style.css">
</head>

<body>

    <!-- Header -->
    <div id="header">

        <div class="background-img"></div>
        <div class="container-fluid">
            <nav>
                <img src="<?php echo url(''); ?>/assets\home_panel_assets\images/logo.png" class="logo" />
                <ul id="sidemenu" class=" navbar-right">
                    <li><a href="{{ route('catalog') }}">Shop</a></li>
                    <li><a href="{{ route('cart') }}">Cart</a></li>
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user() && Auth::user()->role === 'Seller')
                                <li><a href="{{ url('product') }}" class="">Dashboard</a></li>
                            @endif
                            <li style="float:right">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="">{{ __('Log Out') }}</a>
                                </form>
                            </li>
                            <li class="dropdown">
                                <a id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="color:whitesmoke; cursor:pointer">
                                    User Profile
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('customer') }}">Order History</a>
                                </div>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                    <i class="fa-solid fa-xmark" onclick="closeMenu()"></i>
                </ul>
                <i class="fa-solid fa-ellipsis-vertical" onclick="openMenu()"></i>
            </nav>
        </div>

        @yield('content')

        <!-- Contact -->
        <div id="contact">
            <div class="container-fluid contact-bg">
                <div class="row pt-5">
                    <div class="contact-left">
                        <h1 class="subtitle contact-subtitle">Contact Us</h1>
                        <p><i class="fa-solid fa-inbox"></i> pokeshuffler@ps.com</p>
                        <p><i class="fa-solid fa-phone"></i> +62 xxx xxxx xxxx</p>
                        <div class="social-icons">
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                            <a href="{{ route('catalog') }}"><i class="fa-solid fa-bag-shopping"></i></a>
                        </div>
                    </div>
                    <div class="contact-right">
                        <p><iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0566801802433!2d104.0004679758481!3d1.119548462270999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98be09646b351%3A0x36a826082690c786!2sBatam%20International%20University!5e0!3m2!1sen!2sid!4v1733323073190!5m2!1sen!2sid"
                                style="border:0; display:inline" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe></p>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>Copyright © 2024 PokeShuffler. All Rights Reserved</p>
            </div>
        </div>

</body>

<!-- jQuery -->
<script src="<?php echo url(''); ?>/assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo url(''); ?>/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?php echo url(''); ?>/assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo url(''); ?>/assets/vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo url(''); ?>/assets/build/js/custom.min.js"></script>

<!-- Sidemenu -->
<script>
    var sidemenu = document.getElementById("sidemenu");

    function openMenu() {
        sidemenu.style.right = "0";
    }

    function closeMenu() {
        sidemenu.style.right = "-200px";
    }
</script>
