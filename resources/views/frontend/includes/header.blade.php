<header class="header">
    <div class="header-top">
        <div class="mobile-header d-flex justify-content-between align-items-center d-xl-none">
            
            <a href="{{route('userHome')}}" class="logo"><img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo"></a>

            <div class="all-catagory-option mobile-device">
                <a class="bar-btn"><i class="fas fa-bars"></i><span class="ml-2 d-none d-md-inline">All Catagories</span></a>
                <a class="close-btn"><i class="fas fa-times"></i><span class="ml-2 d-none d-md-inline">All Catagories</span></a>
            </div>
            
            <!-- search select -->
            {{-- <div class="text-center mobile-search">
                <button type="button" data-toggle="modal" data-target="#search-select-id"><i class="fas fa-search"></i></button>
            </div> --}}

            <!-- menubar -->
            {{-- <div>
                <button class="menu-bar" type="button" data-toggle="modal" data-target="#menu-id">
                    Home<i class="fas fa-caret-down"></i>
                </button>
            </div> --}}

        </div>
        <div class="d-none d-xl-flex row align-items-center">

            <div class="col-5 col-md-9 col-lg-2">
                <a href="{{route('userHome')}}" class="logo"><img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo"></a>
            </div>
            <div class="col-5 col-md-9 col-lg-5">
                <div class="select-search-option d-none d-md-flex justify-content-end">
                    <form action="{{route('productsearch')}}" class="search-form" method="GET">
                        <input type="text" name="searchItem" id="searchboxClass"  onfocus="show_search_div()" onblur="hide_search_div()" placeholder="Search for Products">
                        <button class="submit-btn" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <div class="searchItemDiv"></div>
                </div>
            </div>
            <div class="col-2 col-md-1 col-lg-5">
                <ul class="site-action d-none d-lg-flex align-items-center justify-content-between  ml-auto">
                    
                     @if(Auth::check())
                  
                     <li class="my-account item-has-children">
                        <a href="#"><i class="fas fa-user mr-1"></i> My Account</a>
                        <ul class="submenu">
                            <li><a href="{{route('userProfile')}}">Profile</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="signin-option"><a href="{{route('register')}}" >Register</a></li>
                     <li class="signin-option"><a href="{{route('login')}}"></i>Login</a></li>
                     @endif
                </ul>
            </div>

        </div>
    </div>
    <hr>
    <div class="header-bottom">
        <div class="row m-0 align-items-center mega-menu-relative">
            <div class="col-md-2 p-0 d-none d-xl-block">
                <div class="all-catagory-option">
                    <a class="bar-btn"><i class="fas fa-bars"></i>All Catagories</a>
                    <a class="close-btn"><i class="fas fa-times"></i>All Catagories</a>
                </div>
            </div>
            <div class="col-md-8">
               
            </div>
            <div class="col-md-2 p-0 d-none d-xl-block">
                <div class="menu-area d-flex justify-content-end">
                    <ul class="menu-action d-none d-lg-block">
                        <li class="cart-option"><a  href="{{route('cartPage')}}"><span class="cart-icon"><i class="fas fa-shopping-cart"></i><span class="count countCart"></span></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
