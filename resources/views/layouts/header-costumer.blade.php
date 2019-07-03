<div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner" >

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="/costumer-page" class="h2 mb-0">PostJemput.</a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#" class="nav-link">Home {{Auth::user()->id}}</a></li>
                <li><a href="#" class="nav-link">Settings</a></li>
                <li><a href="{{ Route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" class="nav-link">{{ __('Logout') }}</a></li>

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