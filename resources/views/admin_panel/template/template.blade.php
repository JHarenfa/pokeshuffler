<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <link rel="stylesheet" href="<?php echo url(''); ?>/assets\home_panel_assets\home_style.css">


    <style>
        @font-face {
            font-family: Croissant;
            src: url("<?php echo url(''); ?>/assets/font/CroissantOne-Regular.ttf");
        }

        @font-face {
            font-family: Mate;
            src: url("<?php echo url(''); ?>/assets/font/Mate-Regular.ttf");
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f5f5;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='0' x2='0' y1='0' y2='100%25' gradientTransform='rotate(0,960,476)'%3E%3Cstop offset='0' stop-color='%23F5F5F5'/%3E%3Cstop offset='1' stop-color='%23F5F5F5'/%3E%3C/linearGradient%3E%3Cpattern patternUnits='userSpaceOnUse' id='b' width='400' height='333.3' x='0' y='0' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='0.04'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect x='0' y='0' fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect x='0' y='0' fill='url(%23b)' width='100%25' height='100%25'/%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: contain;
            color: #121212;
        }

        html {
            scroll-behavior: smooth;
            overflow-y: scroll;
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* Internet Explorer 10+ */
            height: 100vh;
        }

        #header {
            height: auto;
        }

        .list-menu {
            list-style: none;
            margin: 0;
            padding-left: 0;
        }

        .list-menu a {
            color: #343a40;
        }

        .card-product-grid .info-wrap {
            overflow: hidden;
            padding: 18px 20px;
        }

        [class*='card-product'] a.title {
            color: #212529;
            display: block;
        }

        .card-product-grid:hover .btn-overlay {
            opacity: 1;
        }

        .card-product-grid .btn-overlay {
            -webkit-transition: .5s;
            transition: .5s;
            opacity: 0;
            left: 0;
            bottom: 0;
            color: #fff;
            width: 100%;
            padding: 5px 0;
            text-align: center;
            position: absolute;
            background: rgba(0, 0, 0, 0.5);
        }

        .img-wrap {
            overflow: hidden;
            position: relative;
        }

        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }
    </style>


</head>

<body>
    <!-- Nav -->
    <div id="header">
        <div class="container-fluid bg-dark contact-bg">
            <nav>
                <img src="<?php echo url(''); ?>/assets\home_panel_assets\images/logo.png" class="logo" />
                <ul id="sidemenu" class=" navbar-right" style="text-decoration: none">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('product') }}">Product</a></li>
                    <li><a href="{{ route('users') }}">Users</a></li>
                    <li class="dropdown">
                        <a id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" style="color:whitesmoke; cursor:pointer">
                            Order Details
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('orders') }}">Orders</a>
                            <a class="dropdown-item" href="{{ route('order_items') }}">Order Items</a>
                            <a class="dropdown-item" href="{{ route('customer_address') }}">Customer Address</a>
                        </div>
                    </li>

                    <li><a href="{{ route('type') }}">Type</a></li>
                    <li><a href="{{ route('rarity') }}">Rarity</a></li>
                    <li><a href="{{ route('category') }}">Category</a></li>
                    <li><a href="{{ route('admin.invoices.index') }}">Invoices</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li style="float:right">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="">{{ __('Log Out') }}</a>
                                </form>
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
    </div>
    <!-- Nav -->

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
                        <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    </div>
                </div>
                <div class="contact-right">
                    <p><iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0566801802433!2d104.0004679758481!3d1.119548462270999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98be09646b351%3A0x36a826082690c786!2sBatam%20International%20University!5e0!3m2!1sen!2sid!4v1733323073190!5m2!1sen!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy"
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

<!-- Print Invoice -->
<script>
    function printCard(cardId) {
        var cardContent = document.getElementById(cardId).innerHTML;
        var originalContent = document.body.innerHTML;

        // Replace body content with the card content
        document.body.innerHTML = cardContent;
        window.print();

        // Restore the original content
        document.body.innerHTML = originalContent;
        window.location.reload(); // Reload the page to restore events
    }
</script>

<!-- Print All Invoice -->
<script>
    document.getElementById('print-all').addEventListener('click', function() {
        // Create a new window for printing
        const printWindow = window.open('', '', 'height=800,width=1000');

        // Get the invoice container
        const invoicesContainer = document.getElementById('invoices-container');

        // Write the HTML structure to the print window
        printWindow.document.write('<html><head><title>Print Invoices</title>');
        printWindow.document.write('<style>body { font-family: Arial, sans-serif; margin: 20px; }</style>');

        // Add page-break styles to each invoice
        printWindow.document.write(
            '<style>@media print { .invoice-card { page-break-after: always; } }</style>');

        printWindow.document.write('</head><body>');

        // Loop through all the invoices and append each to the new window
        printWindow.document.write(invoicesContainer.innerHTML);

        printWindow.document.write('</body></html>');

        // Ensure that the new window is fully loaded before triggering the print dialog
        printWindow.document.close(); // Close the document for the print window

        // Add a small delay to ensure the content is rendered before printing
        setTimeout(function() {
            printWindow.print(); // Trigger the print dialog
            printWindow.close(); // Close the print window after printing
        }, 500); // 500ms delay to ensure content is loaded
    });
</script>



</html>
