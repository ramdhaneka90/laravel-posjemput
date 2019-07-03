 <header class="site-navbar py-4 js-sticky-header site-navbar-target coba" style="position:fixed; background: #ffffff; box-shadow: 0 5px 5px -5px rgba(0,0,0,.2);">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-xl-2">
                        <h1 class="mb-0 site-logo"><a href="/costumer-page" class="h2 mb-0 pos-logo">PostJemput.</a></h1>
                    </div>

                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">

                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li><a href="/costumer-page" class="nav-link child">Home</a></li>
                                <li><a href="#" class="nav-link child">Settings</a></li>
                                <li><a href="{{ Route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" class="nav-link child">{{ __('Logout') }}</a></li>

                    <form id="logout-form" action="{{ Route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                            </ul>
                        </nav>
                    </div>


                    <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

                </div>
            </div>

        </header>