<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    
    <link rel="icon" href="{{ URL::asset('/images/custom/favicon.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
       .router-link-exact-active {
            /* border: 5px dashed red; */
            color: #d8203b !important;
         }
         ul,
         li {
         list-style: none;
         -webkit-padding-start: 0;
         }

         /* a {
         text-decoration: none;
         color: #ED3E44;
         } */
         .dropdown-main-menu {
            background-color: white;
            display: inline-block !important;
            text-align: left !important;
            /* position: absolute; */
            top: 2.5rem;
            right: -10px;
            display: block !important;
            opacity: 1;
            /* transition: opacity 0.5s ease;  */
            width: 100%;

            a {
               color: black;
            }
         }


         .dropdown-menu-item {
            cursor: pointer !important;
            /* padding: 1em !important; */
            padding: 10px !important;
            /* text-align: center !important; */
            /* border: 1px black solid; */
            border-radius: 5px;
            display: block;
            width: 230px;
            
            /* &:hover {
               background-color: darken(#ED3E44, 5%) !important;
            } */
         }
         
         .dropdown-menu-item:hover {
            background-color: whitesmoke !important;
            text-decoration: none;
            color: #ED3E44;
         }

         @media screen and (max-width: 870px) {
            .tt-color-scheme-01 {
            display: none !important;
         }

         }

         /* ALERTS */
         .alert {
               background-color: #29d2e4;
               border: 1px solid #29d2e4;
               color: #fff;
               padding: 15px 20px;
               }
               .alert .alert-icon {
               float: left;
               margin-right: 15px;
               }
               .alert .alert-info {
               margin: 0 10px 0 0;
               text-transform: uppercase;
               font-weight: normal;
               font-size: 14px;
               }
               .alert .alert-container {
               position: relative;
               max-width: 960px;
               margin: 0 auto;
               }
               .alert .close-icon {
               float: right;
               color: #000;
               margin-top: 0;
               margin-left: 0;
               width: 21px;
               height: 21px;
               position: relative;
               background: none;
               border: none;
               outline: none;
               cursor: pointer;
               text-indent: -999px;
               overflow: hidden;
               white-space: nowrap;
               }
               .alert .close-icon:before, .alert .close-icon:after {
               content: '';
               position: absolute;
               top: 8px;
               width: 15px;
               height: 2px;
               left: 0;
               }
               .alert .close-icon:before {
               background-color: #fff;
               -webkit-transform: rotate(-45deg);
                        transform: rotate(-45deg);
               }
               .alert .close-icon:after {
               background-color: #fff;
               -webkit-transform: rotate(45deg);
                        transform: rotate(45deg);
               }
               .alert.alert-custom {
               background-color: #66615B;
               border: 1px solid #66615B;
               }
               .alert.alert-custom .alert-icon {
               float: left;
               margin-right: 15px;
               }
               .alert.alert-custom .alert-info {
               margin: 0 10px 0 0;
               text-transform: uppercase;
               font-weight: normal;
               font-size: 14px;
               }
               .alert.alert-custom .alert-container {
               position: relative;
               max-width: 960px;
               margin: 0 auto;
               }
               .alert.alert-custom .close-icon {
               float: right;
               color: #000;
               margin-top: 0;
               margin-left: 0;
               width: 21px;
               height: 21px;
               position: relative;
               background: none;
               border: none;
               outline: none;
               cursor: pointer;
               text-indent: -999px;
               overflow: hidden;
               white-space: nowrap;
               }
               .alert.alert-custom .close-icon:before, .alert.alert-custom .close-icon:after {
               content: '';
               position: absolute;
               top: 8px;
               width: 15px;
               height: 2px;
               left: 0;
               }
               .alert.alert-custom .close-icon:before {
               background-color: #fff;
               -webkit-transform: rotate(-45deg);
                        transform: rotate(-45deg);
               }
               .alert.alert-custom .close-icon:after {
               background-color: #fff;
               -webkit-transform: rotate(45deg);
                        transform: rotate(45deg);
               }
               .alert.alert-info {
               background-color: #29d2e4;
               border: 1px solid #29d2e4;
               }
               .alert.alert-info .alert-icon {
               float: left;
               margin-right: 15px;
               }
               .alert.alert-info .alert-info {
               margin: 0 10px 0 0;
               text-transform: uppercase;
               font-weight: normal;
               font-size: 14px;
               }
               .alert.alert-info .alert-container {
               position: relative;
               max-width: 960px;
               margin: 0 auto;
               }
               .alert.alert-info .close-icon {
               float: right;
               color: #000;
               margin-top: 0;
               margin-left: 0;
               width: 21px;
               height: 21px;
               position: relative;
               background: none;
               border: none;
               outline: none;
               cursor: pointer;
               text-indent: -999px;
               overflow: hidden;
               white-space: nowrap;
               }
               .alert.alert-info .close-icon:before, .alert.alert-info .close-icon:after {
               content: '';
               position: absolute;
               top: 8px;
               width: 15px;
               height: 2px;
               left: 0;
               }
               .alert.alert-info .close-icon:before {
               background-color: #fff;
               -webkit-transform: rotate(-45deg);
                        transform: rotate(-45deg);
               }
               .alert.alert-info .close-icon:after {
               background-color: #fff;
               -webkit-transform: rotate(45deg);
                        transform: rotate(45deg);
               }
               .alert.alert-success {
               background-color: #8bc34a;
               border: 1px solid #8bc34a;
               }
               .alert.alert-success .alert-icon {
               float: left;
               margin-right: 15px;
               }
               .alert.alert-success .alert-info {
               margin: 0 10px 0 0;
               text-transform: uppercase;
               font-weight: normal;
               font-size: 14px;
               }
               .alert.alert-success .alert-container {
               position: relative;
               max-width: 960px;
               margin: 0 auto;
               }
               .alert.alert-success .close-icon {
               float: right;
               color: #000;
               margin-top: 0;
               margin-left: 0;
               width: 21px;
               height: 21px;
               position: relative;
               background: none;
               border: none;
               outline: none;
               cursor: pointer;
               text-indent: -999px;
               overflow: hidden;
               white-space: nowrap;
               }
               .alert.alert-success .close-icon:before, .alert.alert-success .close-icon:after {
               content: '';
               position: absolute;
               top: 8px;
               width: 15px;
               height: 2px;
               left: 0;
               }
               .alert.alert-success .close-icon:before {
               background-color: #fff;
               -webkit-transform: rotate(-45deg);
                        transform: rotate(-45deg);
               }
               .alert.alert-success .close-icon:after {
               background-color: #fff;
               -webkit-transform: rotate(45deg);
                        transform: rotate(45deg);
               }
               .alert.alert-warning {
               background-color: #f87d09;
               border: 1px solid #f87d09;
               }
               .alert.alert-warning .alert-icon {
               float: left;
               margin-right: 15px;
               }
               .alert.alert-warning .alert-info {
               margin: 0 10px 0 0;
               text-transform: uppercase;
               font-weight: normal;
               font-size: 14px;
               }
               .alert.alert-warning .alert-container {
               position: relative;
               max-width: 960px;
               margin: 0 auto;
               }
               .alert.alert-warning .close-icon {
               float: right;
               color: #000;
               margin-top: 0;
               margin-left: 0;
               width: 21px;
               height: 21px;
               position: relative;
               background: none;
               border: none;
               outline: none;
               cursor: pointer;
               text-indent: -999px;
               overflow: hidden;
               white-space: nowrap;
               }
               .alert.alert-warning .close-icon:before, .alert.alert-warning .close-icon:after {
               content: '';
               position: absolute;
               top: 8px;
               width: 15px;
               height: 2px;
               left: 0;
               }
               .alert.alert-warning .close-icon:before {
               background-color: #fff;
               -webkit-transform: rotate(-45deg);
                        transform: rotate(-45deg);
               }
               .alert.alert-warning .close-icon:after {
               background-color: #fff;
               -webkit-transform: rotate(45deg);
                        transform: rotate(45deg);
               }
               .alert.alert-danger {
               background-color: #e91e63;
               border: 1px solid #e91e63;
               }
               .alert.alert-danger .alert-icon {
               float: left;
               margin-right: 15px;
               }
               .alert.alert-danger .alert-info {
               margin: 0 10px 0 0;
               text-transform: uppercase;
               font-weight: normal;
               font-size: 14px;
               }
               .alert.alert-danger .alert-container {
               position: relative;
               max-width: 960px;
               margin: 0 auto;
               }
               .alert.alert-danger .close-icon {
               float: right;
               color: #000;
               margin-top: 0;
               margin-left: 0;
               width: 21px;
               height: 21px;
               position: relative;
               background: none;
               border: none;
               outline: none;
               cursor: pointer;
               text-indent: -999px;
               overflow: hidden;
               white-space: nowrap;
               }
               .alert.alert-danger .close-icon:before, .alert.alert-danger .close-icon:after {
               content: '';
               position: absolute;
               top: 8px;
               width: 15px;
               height: 2px;
               left: 0;
               }
               .alert.alert-danger .close-icon:before {
               background-color: #fff;
               -webkit-transform: rotate(-45deg);
                        transform: rotate(-45deg);
               }
               .alert.alert-danger .close-icon:after {
               background-color: #fff;
               -webkit-transform: rotate(45deg);
                        transform: rotate(45deg);
               }

               #overlay {
               color: white;
               position: fixed; /* Sit on top of the page content */
               display: none; /* Hidden by default */
               width: 100%; /* Full width (cover the whole page) */
               height: 100%; /* Full height (cover the whole page) */
               top: 0;
               left: 0;
               right: 0;
               bottom: 0;
               background-color: rgba(0,0,0,0.8); /* Black background with opacity */
               z-index: 99; /* Specify a stack order in case you're using a different order for other elements */
               cursor: pointer; /* Add a pointer on hover */

               /* display: flex; */
               text-align: center;
               vertical-align: middle;
               justify-content: center; /* align horizontal */
               align-items: center; /* align vertical */
            }


    </style>

</head>
<body>
    <div id="app">
        
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
        <div id="overlay" ><p style="margin-top: 20%; color: white;">Please wait...</p>
            <br>
            <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
         </div>
        {{-- Header Starts here --}}
        <header id="tt-header">
            <div class="tt-color-scheme-01">
               <div class="container-fluid">
                  <div class="tt-header-row tt-top-row">
                     <div class="tt-col-left">
                        <div class="tt-box-info">
                           <ul>
                              <li><i class="icon-f-93"></i><a href="tel:+08152372923">@yield('phone')</a></li>
                              <li><i class="icon-f-92"></i>@yield('work_hour')</li>
                           </ul>
                        </div>
                     </div>
                     <div class="tt-col-right ml-auto">
                        <ul class="tt-social-icon">
                           <li><a class="icon-g-64" target="_blank" href="http://@yield('facebook')"></a></li>
                           <li><a class="icon-h-58" target="_blank" href="http://@yield('twitter')"></a></li>
                           <li><a class="icon-g-67" target="_blank" href="http://@yield('instagram')"></a></li>
                           {{-- <li><a class="icon-g-66" target="_blank" href="@yield('twitter')"></a></li>
                           <li><a class="icon-g-70" target="_blank" href="@yield('instagram')"></a></li> --}}
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <!-- tt-mobile menu -->
            <nav class="panel-menu mobile-main-menu">
               <ul>
                  <li>
                     <a href="/">Home</a>
                  </li>
                  <li>
                     <router-link  class="sss" to="/shop-listing">Shop</router-link>
                  </li>
                  <li>
                     <a href="#">Department</a>
                     <ul>
                        <li><router-link class="sss" to="/Supermart">Supermart</router-link></li>
                                 <li><router-link class="sss" to="/Luggagemaster">Luggage Master</router-link></li>
                                 <li><router-link class="sss" to="/Orangecorner">Orange Corner</router-link></li>
                                 {{-- <li><router-link class="sss" to="/Water-and-drink">Water & Drinks</router-link></li> --}}
                                 {{-- <li><router-link class="sss" to="/Fruits">Fruits</router-link></li> --}}
                                 <li><router-link class="sss" to="/Icecream">Ice Cream</router-link></li>
                                 <li><router-link class="sss" to="/Shawarma-and-jollof">Shawarma & Party Jollof</router-link></li>
                                 {{-- <li><router-link class="sss" to="/Phones">Phones</router-link></li> --}}
                     </ul>
                  </li>
                  <li>
                     <router-link  class="sss" to="/Aboutus">About Us</router-link>
                  </li>
                  <li>
                     <router-link class="sss" to="/Contactus">Contact Us</router-link>
                  </li>
                {{-- @guest
                     <li>
                        <a href="#">ACCOUNT</a>
                        <ul>
                           <li><router-link class="sss" to="/Luggagemaster">login</router-link></li>
                           <li><router-link class="sss" to="/Orangecorner">Sign Out</router-link></li>
                        </ul>
                     </li>
                     @else
                     <li>
                        <a href="#">ACCOUNT</a>
                        <ul>
                           <li><router-link class="sss" to="/Luggagemaster">{{ Auth::user()->name }}</router-link></li>
                           <li>
                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>
                           </li>
                        </ul>
                     </li>
                @endguest --}}
               </ul>
               <div class="mm-navbtn-names">
                  <div class="mm-closebtn">Close</div>
                  <div class="mm-backbtn">Back</div>
               </div>
            </nav>
            <!-- tt-mobile-header -->
            <div class="tt-mobile-header">
               <div class="container-fluid">
                  <div class="tt-header-row">
                     <div class="tt-mobile-parent-menu">
                        <div class="tt-menu-toggle" id="js-menu-toggle"><i class="icon-03"></i></div>
                     </div>
                     <!-- search -->
                     <div class="tt-mobile-parent-search tt-parent-box"></div>
                     <!-- /search --><!-- cart -->
                     <div class="tt-mobile-parent-cart tt-parent-box"></div>
                     <!-- /cart --><!-- account -->
                     <div class="tt-mobile-parent-account tt-parent-box"></div>
                     <!-- /account --><!-- currency -->
                     <div class="tt-mobile-parent-multi tt-parent-box"></div>
                     <!-- /currency -->
                  </div>
               </div>
               <div class="container-fluid tt-top-line">
                  <div class="row">
                     <div class="tt-logo-container">
                        <!-- mobile logo --> <a class="tt-logo tt-logo-alignment" href="/"><img style="height: 40px; max-height: unset;" src="images/custom/logo.png" alt=""></a><!-- /mobile logo -->
                     </div>
                  </div>
               </div>
            </div>
            <!-- tt-desktop-header -->
            <div class="tt-desktop-header">
                <div class="container">
                   <div class="tt-header-holder">
                      <div class="tt-col-obj tt-obj-logo">
                         <!-- logo --> <a class="tt-logo tt-logo-alignment" href="/"><img style="height: 40px; max-height: unset;" src="images/custom/logo.png" alt="" class="loading" data-was-processed="true"></a><!-- /logo -->
                      </div>
                      <div class="tt-col-obj tt-obj-menu">
                         <!-- tt-menu -->
                         <div class="tt-desctop-parent-menu tt-parent-box">
                            <div class="tt-desctop-menu tt-hover-03" id="js-include-desktop-menu">
                               <nav>
                                  <ul>
                                     <li class="dropdown">
                                        <a href="/">HOME</a>
                                     </li>
                                     <li class="dropdown">
                                       <router-link  to="/shop-listing">SHOP</router-link>
                                     </li>
                                     <li class="dropdown tt-megamenu-col-01 tt-submenu">
                                       <a>DEPARTMENTS</a>
                                       <div class="dropdown-menu" style="">
                                          <div class="row tt-col-list">
                                             <div class="col">
                                                <ul class="dropdown-main-menu">
                                                   <li><router-link class="dropdown-menu-item" to="/Supermart">Supermart</router-link></li>
                                                   <li><router-link class="dropdown-menu-item" to="/Luggagemaster">Luggage Master</router-link></li>
                                                   <li><router-link class="dropdown-menu-item" to="/Orangecorner">Orange Corner</router-link></li>
                                                   {{-- <li><router-link to="/Water-and-drink">Water & Drinks</router-link></li> --}}
                                                   {{-- <li><router-link to="/Fruits">Fruits</router-link></li> --}}
                                                   <li><router-link class="dropdown-menu-item" to="/Icecream">Ice Cream</router-link></li>
                                                   <li><router-link class="dropdown-menu-item" to="/Shawarma-and-jollof">Shawarma & Party Jollof</router-link></li>
                                                   {{-- <li><router-link to="/Phones">Phones</router-link></li> --}}
                                                </ul>
                                             </div>
                                             {{-- <div class="col">
                                                <h6 class="tt-title-submenu"><a href="portfolio-col-wide-three.html">BOXED WIDE</a></h6>
                                                <ul class="tt-megamenu-submenu">
                                                   <li><a href="portfolio-col-wide-two.html">Two Colums</a></li>
                                                   <li><a href="portfolio-col-wide-three.html">Three Colums</a></li>
                                                   <li><a href="portfolio-col-wide-four.html">Four Colums</a></li>
                                                </ul>
                                             </div> --}}
                                          </div>
                                       </div>
                                    </li>
                                     <li class="dropdown">
                                       <router-link  to="/Aboutus">ABOUT US</router-link>
                                    </li>
                                    <li class="dropdown">
                                       <router-link to="/Contactus">CONTACT US</router-link>
                                    </li>
                                  </ul>
                               </nav>
                            </div>
                         </div>
                         <!-- /tt-menu -->
                      </div>
                      <div class="tt-col-obj tt-obj-options obj-move-right">
                         <!-- tt-search -->
                         <div class="tt-desctop-parent-search tt-parent-box">
                            <div class="tt-search tt-dropdown-obj">
                               <button class="tt-dropdown-toggle" data-tooltip="Search" data-tposition="bottom"><i class="icon-f-85"></i></button>
                               <div class="tt-dropdown-menu">
                                  <div class="container">
                                     <form onsubmit="return search(event)">
                                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                                        <div class="tt-col">
                                           <input type="text" id="searchInput" class="tt-search-input" onkeydown="down()" onkeyup="up()" placeholder="Search Products...">
                                           <button class="tt-btn-search" type="submit" onsubmit="search()"></button>
                                        </div>
                                        <div class="tt-col"><button class="tt-btn-close icon-g-80"></button></div>
                                        <div class="tt-info-text">What are you Looking for?</div>
                                        <div class="search-results" id="s_result"></div>
                                     </form>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <!-- /tt-search --><!-- tt-cart -->
                         <cart-component></cart-component>
                         <!-- /tt-cart --><!-- tt-account -->
                         <div class="tt-desctop-parent-account tt-parent-box">
                            <div class="tt-account tt-dropdown-obj">
                               <button class="tt-dropdown-toggle" data-tooltip="My Account" data-tposition="bottom"><i class="icon-f-94"></i></button>
                               <div class="tt-dropdown-menu signup-dd">
                                  <div class="tt-mobile-add"><button class="tt-close">Close</button></div>
                                  <div class="tt-dropdown-inner">
                                     <ul>
                                       @guest 
                                          <li><router-link class="dropdown-menu-item closeAuthMenu s-item" to="/login"><i class="icon-f-76"></i>Sign In</router-link></li>
                                          <li><router-link class="dropdown-menu-item closeAuthMenu s-item" to="/signup"><i class="icon-f-94"></i>Register</router-link></li>
                                          @else
                                             @if (Auth::user()->isAdmin == 1)
                                             <li><a href="/user" class="dropdown-menu-item s-item"><i class="icon-f-94"></i>{{ Auth::user()->first_name }} - Dashboard</a></li>
                                             <li>
                                                {{-- <a href="#">Sign Out</a> --}}
                                                <a class="dropdown-menu-item s-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                   <i class="icon-f-77"></i>
                                                   {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                   @csrf
                                                </form>
                                             </li>
                                             {{-- <li><a class="dropdown-menu-item" href="#"><i class="icon-n-072"></i>Wishlist</a></li> --}}
                                             @else
                                             <li><a href="/user#/dashboard" class="dropdown-menu-item s-item"><i class="icon-f-94"></i>{{ Auth::user()->first_name }} - Dashboard</a></li>
                                             <li>
                                                {{-- <a href="#">Sign Out</a> --}}
                                                   <a class="dropdown-menu-item s-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                   <i class="icon-f-77"></i>
                                                   {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                   @csrf
                                                </form>
                                             </li>
                                             @endif
                                       </ul>
                                     
                                      @endguest  
                                  </div>
                               </div>
                            </div>
                         </div>
                         <!-- /tt-account --><!-- tt-langue and tt-currency -->
                         @guest
                           <div class="tt-desctop-parent-multi tt-parent-box">
                            <div class="tt-multi-obj" style="margin-top: 11px; padding-top: 4px; padding-bottom: 7px;">
                               <router-link to="/login" class="tt-dropdown-toggle" data-tooltip="Wish List" data-tposition="bottom"><i class="icon-n-072"></i></router-link>
                              </div>
                           </div>
                           @else
                           @if (Auth::user()->isAdmin == 1)
                           <div class="tt-desctop-parent-multi tt-parent-box">
                              <div class="tt-multi-obj tt-dropdown-obj">
                                <a href="/user" class="" style="padding: 5px 8px;  padding-top: 4px; text-decoration: none;" data-tooltip="Wish List" data-tposition="bottom"><i class="icon-n-072"></i></a>
                              </div>
                           </div>
                           @else
                           <div class="tt-desctop-parent-multi tt-parent-box">
                              <div class="tt-multi-obj" style="margin-top: 11px; padding-bottom: 7px;">
                                <a href="/user#/user-wishlist" class="" style="padding: 5px 8px;  padding-top: 4px; text-decoration: none;" data-tooltip="Wish List" data-tposition="bottom"><i class="icon-n-072"></i></a>
                              </div>
                           </div>
                           @endif
                        @endguest  
                         <!-- /tt-langue and tt-currency -->
                      </div>
                   </div>
                </div>
             </div>
            <!-- stuck nav -->
            <div class="tt-stuck-nav" id="js-tt-stuck-nav">
               <div class="container-fluid">
                  <div class="tt-header-row">
                     <div class="tt-stuck-parent-menu"></div>
                     <div class="tt-stuck-parent-search tt-parent-box"></div>
                     <div class="tt-stuck-parent-cart tt-parent-box"></div>
                     <div class="tt-stuck-parent-account tt-parent-box"></div>
                     <div class="tt-stuck-parent-multi tt-parent-box"></div>
                  </div>
               </div>
            </div>
         </header>
         {{-- Heade ends here --}}
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="nomargin" id="tt-footer">
            <footer-component></footer-component>
      </footer>
         {{-- Footer starts here --}}
         {{-- <footer class="nomargin" id="tt-footer">
            
            
 
         </footer> --}}
         {{-- Footer ends here --}}

    </div>

    <script defer="defer" src="{{ asset('js/bundle.js') }}"></script>
    <script src="external/jquery/jquery.min.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
     
    </script>
    <script>
       var timer;

         function down()
         {
            clearTimeout(timer);
         }

         function search(e)
         {
            e.preventDefault();
            var keyword = $('#searchInput').val();
            window.location.href ='/#/shop-listing/'+keyword;
         }

         function up()
         {
            var auth = $('#token').val();
            timer = setTimeout(function()
            {
               var keyword = $('#searchInput').val();

               if(keyword.length > 1)
               {
                  $.ajax({
                     type: "POST",
                     url: '{{ route('search') }}',
                     data: {searchword : keyword ,'_token': auth},
                     success: function (data) { 
                     }
                     })
                     
                     .done(function(data){    
                        $('#s_result').html(data);
                  });

               }
               else if(keyword.length < 2)
               {
                  $('#s_result').html('');
               }
            }, 500);
         }
    </script>
</body>
</html>
