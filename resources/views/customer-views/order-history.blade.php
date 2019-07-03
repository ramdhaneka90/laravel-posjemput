<!DOCTYPE html>
<html lang="en">
<head>
    <title>PostJemput &mdash; The Best Experience for Pickup and Delivery!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">

    <link rel="stylesheet" href="/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="/css/aos.css">

    <link rel="stylesheet" href="/css/style.css">

    <link href="/fontawesome/css/all.css" rel="stylesheet">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner" style="position:fixed; background: #ffffff; box-shadow: 0 5px 5px -5px rgba(0,0,0,.2);">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-xl-2">
                        <h1 class="mb-0 site-logo"><a href="index.html" class="h2 mb-0">PostJemput.</a></h1>
                    </div>

                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">

                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li><a href="/costumer-page" class="nav-link">Home</a></li>
                                <li><a href="#" class="nav-link">Settings</a></li>
                                <li><a href="#" class="nav-link">Logout</a></li>
                            </ul>
                        </nav>
                    </div>


                    <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

                </div>
            </div>

        </header>

        <br>
        <br>
        <br>
        <br>
        <br>


        <div class="container">
            <a href="/costumer-page"><i class="fas fa-long-arrow-alt-left fa-2x" style="color: black;"></i></a>
            <br>
            <br>
            <div class="row">
                @include('customer-views.nav-costumer')
                <div class="col-lg-9">
                    <div class="card list-histo">
                        <div class="card-header">
                            Order History
                        </div>

                        <div class="card-body">

                            <div class="card">
                                <div class="card-header">
                                    Ini judul
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <i class="fa fa-box-open"></i>
                                            Package Name
                                        </div>

                                        <div class="col-md-3">
                                            <i class="fa fa-map-marker-alt"></i>
                                            package destination
                                        </div>

                                        <div class="col-md-3">
                                            <i class="fa fa-balance-scale"></i>
                                            weight
                                        </div>

                                        <div class="col-md-3">
                                            <i class="fa fa-calendar"></i>
                                            date receive
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <nav aria-label="Page navigation example ml-auto">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>

        <!-- Copyright -->
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-5">
                                <h2 class="footer-heading mb-4">About Us</h2>
                                <p>Kami bergerak dibidang jasa</p>
                            </div>
                            <div class="col-md-3 ml-auto">
                                <h2 class="footer-heading mb-4">Quick Links</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="">
                            <h2 class="footer-heading mb-4">Follow Us</h2>
                            <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                        </div>


                    </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <div class="border-top pt-5">
                            <p>
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());

                                </script> All rights reserved
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    
    <!-- End Copyright -->

</body>

</html>


<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.stellar.min.js"></script>
<script src="/js/jquery.countdown.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/jquery.fancybox.min.js"></script>
<script src="/js/jquery.sticky.js"></script>


