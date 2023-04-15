
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>AmarInfo</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('frontend/assets/images/logo.png')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/custom-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
</head>
<body id="top-page">

   
    @if(Session::get('coupon'))
    
    @else
    <a class="position-absolute opensidecart" href="javascript:void(0)"  onclick="cartopen()">
        <div id="sitebar-drawar" class="sitebar-drawar">
            <div class="cart-count d-flex align-items-center">
                <i class="fas fa-shopping-basket"></i>
                <div>
                    <span class="countCart"></span>
                    <span class="m-0">Items</span>
                </div>
            </div>
            <div class="total-price cartTotal"></div>
        </div>
    </a>
    @endif

     <!-- admin Modal -->
     <div class="modal fade" id="useradmin1" tabindex="-1" aria-labelledby="useradmin1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="header-top-action-dropdown">
                        <ul>
                            @if(Auth::check())
                
                        <li><a href="{{route('userProfile')}}">My Account</a></li>
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
                    
                  
                    @else
                    <li class="signin-option"><a href="{{route('register')}}" >Register</a></li>
                     <li class="signin-option"><a href="{{route('login')}}"></i>Login</a></li>
                     @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!--siteinfo Modal -->
     <div class="modal fade" id="siteinfo1" tabindex="-1" aria-labelledby="siteinfo1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="header-top-action-dropdown">
                        <ul>
                            <li>
                                <div class="select-search-option">
                                    <form action="{{route('productsearch')}}" class="search-form" method="GET">
                                        <input type="text" name="searchItem" id="searchMobileAjax" onfocus="show_search_div()" onblur="hide_search_div()" placeholder="Search for Products">
                                        <button class="submit-btn" type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="searchItemDiv"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!--search Modal -->
     <div class="modal fade" id="search-select-id" tabindex="-1" aria-labelledby="search-select-id" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="select-search-option">
                        <div class="flux-custom-select">
                            <select>
                              <option value="0">Select Catagory</option>
                              <option value="1">Vegetables</option>
                              <option value="2">Fruits</option>
                              <option value="3">Salads</option>
                              <option value="4">Fish & Seafood</option>
                              <option value="5">Fresh Meat</option>
                              <option value="6">Health Product</option>
                              <option value="7">Butter & Eggs</option>
                              <option value="8">Oils & Venegar</option>
                              <option value="9">Frozen Food</option>
                              <option value="10">Jam & Honey</option>
                            </select>
                        </div>
                        <form action="#" class="search-form">
                            <input type="text" name="search" placeholder="Search for Products">
                            <button class="submit-btn"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- menu modal -->
     {{-- <div class="modal fade" id="menu-id" tabindex="-1" aria-labelledby="menu-id" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <ul class="menu d-xl-flex flex-wrap pl-0 list-unstyled">
                        <li class="item-has-children"><a data-toggle="collapse" href="#mainmenuid1" role="button" aria-expanded="false" aria-controls="catagory-widget1"><span>Home</span> <i class="fas fa-angle-down"></i></a>
                            <ul class="submenu collapse" id="mainmenuid1">
                                <li><a href="home-default.html">Home Default</a></li>
                                <li><a href="index-icon.html">Home Default2</a></li>
                                <li><a href="index.html">Home Sticky Sidebar</a></li>
                                <li><a href="home-search.html">Home Search</a></li>
                                <li><a href="home-slider.html">Home Slider</a></li>
                                 <li><a href="home-slider2.html">Home Slider2</a></li>
                                <li><a href="home7.html">Home Seven</a></li>
                            </ul>
                        </li>
                        <li><a href="#">New Products</a></li>
                        <li><a data-toggle="collapse" href="#megamenu-main" role="button" aria-expanded="false" aria-controls="catagory-widget1"><span>Featured Products</span> <i class="fas fa-angle-down"></i></a>
                            <ul class=" collapse" id="megamenu-main">
                                <li><a data-toggle="collapse" href="#megamenu-main01" role="button" aria-expanded="false" aria-controls="megamenu-main01"><span>Vegetables</span> <i class="fas fa-angle-down"></i></a>
                                    <ul class="submenu collapse" id="megamenu-main01">
                                        <li><a href="product-list.html">Artichoke.</a></li>
                                        <li><a href="product-list.html">Aubergune</a></li>
                                        <li><a href="product-list.html">Asparagus</a></li>
                                        <li><a href="product-list.html">Broccoflower</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" href="#megamenu-main02" role="button" aria-expanded="false" aria-controls="megamenu-main02"><span>Fruits</span> <i class="fas fa-angle-down"></i></a>
                                    <ul class="submenu collapse" id="megamenu-main02">
                                        <li><a href="product-list.html">Artichoke.</a></li>
                                        <li><a href="product-list.html">Aubergune</a></li>
                                        <li><a href="product-list.html">Asparagus</a></li>
                                        <li><a href="product-list.html">Broccoflower</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" href="#megamenu-main03" role="button" aria-expanded="false" aria-controls="megamenu-main03"><span>Salads</span> <i class="fas fa-angle-down"></i></a>
                                    <ul class="submenu collapse" id="megamenu-main03">
                                        <li><a href="product-list.html">Artichoke.</a></li>
                                        <li><a href="product-list.html">Aubergune</a></li>
                                        <li><a href="product-list.html">Asparagus</a></li>
                                        <li><a href="product-list.html">Broccoflower</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" href="#megamenu-main04" role="button" aria-expanded="false" aria-controls="megamenu-main04"><span>Health Care</span> <i class="fas fa-angle-down"></i></a>
                                    <ul class="submenu collapse" id="megamenu-main04">
                                        <li><a href="product-list.html">Artichoke.</a></li>
                                        <li><a href="product-list.html">Aubergune</a></li>
                                        <li><a href="product-list.html">Asparagus</a></li>
                                        <li><a href="product-list.html">Broccoflower</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="item-has-children"><a data-toggle="collapse" href="#mainmenuid2" role="button" aria-expanded="false" aria-controls="mainmenuid2"><span>Pages</span> <i class="fas fa-angle-down"></i></a>
                            <ul class="submenu collapse" id="mainmenuid2">
                                <li><a href="about.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li class="item-has-children"><a data-toggle="collapse" href="#mobile-product1" role="button" aria-expanded="false" aria-controls="mobile-product1"><span>Products</span> <i class="fas fa-angle-down"></i></a>
                                    <ul class="submenu collapse" id="mobile-product1">
                                        <li><a href="product-list.html">Product List</a></li>
                                        <li><a href="product-leftsidebar.html">Product leftsidebar</a></li>
                                        <li><a href="product-fullwidth.html">Product Fullwidth</a></li>
                                        <li><a href="brand-product.html">Brand Page</a></li>
                                        <li><a href="product-detail.html">Product Details</a></li>
                                    </ul>
                                </li>
                                <li class="item-has-children"><a data-toggle="collapse" href="#mobile-dashboard1" role="button" aria-expanded="false" aria-controls="mobile-dashboard1"><span>Dashboard1</span> <i class="fas fa-angle-down"></i></a>
                                    <ul class="submenu collapse" id="mobile-dashboard1">
                                        <li><a href="user-dashbord.html">User Dashboard</a></li>
                                        <li><a href="profile.html">Profile</a></li>
                                        <li><a href="track-order.html">Track Order</a></li>
                                        <li><a href="wishlist.html">Wish List</a></li>
                                    </ul>
                                </li>
                                <li class="item-has-children"><a data-toggle="collapse" href="#mobile-dashboard2" role="button" aria-expanded="false" aria-controls="mobile-dashboard2"><span>Dashboard2</span> <i class="fas fa-angle-down"></i></a>
                                    <ul class="submenu collapse" id="mobile-dashboard2">
                                        <li><a href="dashboard.html">My Orders</a></li>
                                        <li><a href="dashboard-account.html">Accounts</a></li>
                                        <li><a href="dashboard-address-book.html">Address Book</a></li>
                                        <li><a href="dashboard-order-cancel.html">Order Cancel</a></li>
                                        <li><a href="dashboard-order-process.html">Order Process</a></li>
                                        <li><a href="dashboard-password-change.html">Password Change</a></li>
                                        <li><a href="dashboard-wishlist.html">whistlist</a></li>
                                    </ul>
                                </li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="singin.html">SignIn</a></li>
                                <li><a href="signup.html">SignUp</a></li>
                                <li><a href="product-order-success.html">Order Success</a></li>
                                <li><a href="comming-soon.html">Comming Soon</a></li>
                                <li><a href="404-page.html">404 page</a></li>
                            </ul>
                        </li>
                        <li class="item-has-children"><a data-toggle="collapse" href="#mainmenuid3" role="button" aria-expanded="false" aria-controls="mainmenuid3"><span>Blog</span> <i class="fas fa-angle-down"></i></a>
                            <ul class="submenu collapse" id="mainmenuid3">
                                <li><a href="blog.html">Blog full width</a></li>
                                <li><a href="blog-rightsidebar.html">Blog Rightsidebar</a></li>
                                <li><a href="single.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="select-search-option">
                                <form action="#" class="search-form">
                                    <input type="text" name="search" placeholder="Search for Products">
                                    <button class="submit-btn"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}




    <!-- sidebar-cart -->
    @include('frontend.includes.sidecart')
    <!-- header section start -->
    @include('frontend.includes.header')
    <!-- header section end -->


    <div class="page-layout">
        @include('frontend.includes.sidebar')
        <div class="main-content-area">
           @yield('main_content')



            <!-- footer section -->
            @include('frontend.includes.footer')
            <!-- footer section -->
        </div>
    </div>


    


    <!-- login-area -->
    <section id="login-area" class="login-area">
        <div onclick="CloseSignUpForm()" class="overlay"></div>
        <div class="login-body-wrapper">
            <div class="login-body">
                <div class="close-icon" onclick="CloseSignUpForm()">
                    <i class="fas fa-times"></i>
                </div>
                <div class="login-header">
                    <h4>Create Your Account</h4>
                    <p>Login with your email & password</p>
                </div>
                <div class="login-content">
                    <form action="#" class="login-form">
                        <input type="text" name="name" placeholder="Name">
                        <input type="email" name="email" placeholder="Email">
                        <button type="submit" class="submit">Sign Up</button>
                    </form>
                    <div class="text-center seperator">
                        <span>Or</span>
                    </div>
                    <div class="othersignup-option">
                        <a class="facebook" href="#"><i class="fab fa-facebook-square"></i>Continue with Facebook</a>
                        <a class="google" href="#"><i class="fab fa-google-plus"></i>Continue with Google</a>
                    </div>
                    <div class="text-center dont-account py-4">
                        <p class="mb-0">Don't have any account <a href="#">Sing Up</a></p>
                    </div>
                </div>
            </div>
            <div class="forgot-password text-center">
                <p>forgot Passowrd? <a href="#">Reset It</a></p>
            </div>
        </div>
    </section>
    <!-- login-area -->


    <!-- mobile-footer -->
    @include('frontend.includes.mobilefooter')
    <!-- mobile-footer -->


<a href="#top-page" class="to-top js-scroll-trigger"><span><i class="fas fa-arrow-up"></i></span></a>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}'></script>
    <script src='{{asset('frontend/assets/js/swiper.min.js')}}'></script>
    <script src="{{asset('frontend/assets/js/slick.js')}}"></script>
    <script src='{{asset('frontend/assets/js/jquery-easeing.min.js')}}'></script>
    <script src='{{asset('frontend/assets/js/scroll-nav.js')}}'></script>
    <script src="{{asset('frontend/assets/js/jquery.elevatezoom.js')}}"></script>
    <script src='{{asset('frontend/assets/js/price-range.js')}}'></script>
    <script src='{{asset('frontend/assets/js/custom-select.js')}}'></script>
    <script src='{{asset('frontend/assets/js/multi-countdown.js')}}'></script>
    <script src='{{asset('frontend/assets/js/fly-cart.js')}}'></script>
    <script src='{{asset('frontend/assets/js/theia-sticky-sidebar.js')}}'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('frontend/assets/js/functions.js')}}"></script>
   

    {{-- <script>
		
		/*------- LOADER -------*/
		var loader = document.querySelector(".loader")
		window.addEventListener("load", vanish);

		function vanish() {
			loader.classList.add("disppear");
		}

	</script> --}}

<script>

	@if (Session::has('message'))
	var type = "{{ Session::get('alert-type', 'info') }}"
	switch(type){
	case 'info':

	toastr.options.timeOut = 3000;
	toastr.info("{{Session::get('message')}}");
	var audio = new Audio('audio.mp3');
	audio.play();
	break;
	case 'success':

	toastr.options.timeOut = 3000;
	toastr.success("{{Session::get('message')}}");
	var audio = new Audio('audio.mp3');
	audio.play();

	break;
	case 'warning':

	toastr.options.timeOut = 3000;
	toastr.warning("{{Session::get('message')}}");
	var audio = new Audio('audio.mp3');
	audio.play();

	break;
	case 'error':

	toastr.options.timeOut = 3000;
	toastr.error("{{Session::get('message')}}");
	var audio = new Audio('audio.mp3');
	audio.play();

	break;
	}
	@endif
    
</script>
<script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51JhcVtDJxFZ8gsu93Wrnu56pWt8I9UQLxGvPKOxJEwY43Eiwj6TNpSYhbwHZjmC3ayAg6qqnvoerOJfOkLZbtt8P00DJooBWAD');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
            color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
            } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
            }
        });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
        }

</script>
@include('frontend.includes.allajax')
</body>

</html>
