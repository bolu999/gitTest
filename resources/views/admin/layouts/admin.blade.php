<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '2K Supermart') }}</title>
    <!-- Scripts -->
    {{-- <script type="text/javascript">
          document.getElementById("myBtn").addEventListener("click", function(){
            console.log("hereer");
            $("body").addClass("sidebar-enable");
            
        });
        $("#myBtn").on("click", function(){
          alert("The paragraph was clicked.");
        });
    </script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="cms/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" /> 
    <link href="cms/assets/css/icons.min.css" rel="stylesheet" type="text/css" /> 
    <link href="cms/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" /> 
    <link rel="icon" href="{{ URL::asset('/images/custom/favicon.png') }}" type="image/x-icon"/>

    <style>
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

    </style>
</head>
<body data-sidebar="dark">
    <div id="app">
  
        {{-- Header Starts here --}}
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex"  >
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="/" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="images/custom/logo.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="images/custom/logo.png" alt="" height="17">
                            </span>
                        </a>

                        <a href="/" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="images/custom/logo.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="images/custom/logo.png" alt="" height="19">
                            </span>
                        </a>
                    </div>

                    <button  type="button" id="myBtn" class="btn btn-sm px-3 font-size-16 header-item waves-effect">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    {{-- <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bx bx-search-alt"></span>
                        </div>
                    </form> --}}

                    <div class="dropdown dropdown-mega d-none d-lg-block ml-2">
                        {{-- <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            Mega Menu
                            <i class="mdi mdi-chevron-down"></i> 
                        </button> --}}
                        <div class="dropdown-menu dropdown-megamenu">
                            <div class="row">
                                <div class="col-sm-8">
            
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="font-size-14 mt-0">UI Components</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li>
                                                    <a href="javascript:void(0);">Lightbox</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Range Slider</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Sweet Alert</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Rating</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Forms</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Tables</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Charts</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-4">
                                            <h5 class="font-size-14 mt-0">Applications</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li>
                                                    <a href="javascript:void(0);">Ecommerce</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Calendar</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Email</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Projects</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Tasks</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Contacts</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-4">
                                            <h5 class="font-size-14 mt-0">Extra Pages</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li>
                                                    <a href="javascript:void(0);">Light Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Compact Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Horizontal layout</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Maintenance</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Coming Soon</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Timeline</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">FAQs</a>
                                                </li>
                                    
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h5 class="font-size-14 mt-0">UI Components</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li>
                                                    <a href="javascript:void(0);">Lightbox</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Range Slider</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Sweet Alert</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Rating</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Forms</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Tables</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Charts</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-sm-5">
                                            <div>
                                                <img src="cms/assets/images/megamenu-img.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <h4 style="margin-top: 20px; margin-bottom: auto;" btn header-item noti-icon waves-effect>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>

                    <div class="dropdown d-inline-block d-lg-none ml-2">
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-search-dropdown">
                        </div>
                    </div>

                  
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{-- <h4 class="d-none d-xl-inline-block ml-1">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4> --}}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle mr-1"></i> My Wallet</a>
                            <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle mr-1"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header> 
        
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">
        
                @if (Auth::check())
                    @if (Auth::user()->isAdmin == 1)
                    {{-- Admin Dashboard --}}

                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>
            
                            <li>
                                <router-link to="/admin" class="waves-effect closemenu">
                                    <i class="bx bx-home-circle"></i>
                                    <span>Dashboards</span>
                                </router-link>
                            </li>
            
                            <li>
                                <router-link to="/admin-orders" class="waves-effect closemenu">
                                    <i class="bx bx-store"></i>
                                    <span>Orders</span>
                                </router-link>
                            </li>
    
                            <li>
                                <router-link to="/admin-products" class="waves-effect closemenu">
                                    <i class="bx bx-briefcase-alt-2"></i>
                                    <span>Products</span>
                                </router-link>
                            </li>
    
                            <li>
                                <router-link to="/admin-categories" class="waves-effect closemenu">
                                    <i class="bx bx-list-minus"></i>
                                    <span>Categories</span>
                                </router-link>
                            </li>
    
                            <li>
                                <router-link to="/admin-departments" class="waves-effect closemenu">
                                    <i class="bx bx-building-house"></i>
                                    <span>Departments</span>
                                </router-link>
                            </li>
    
                            <li>
                                <router-link to="/admin-users" class="waves-effect closemenu">
                                    <i class="bx bxs-user-detail"></i>
                                    <span>Users</span>
                                </router-link>
                            </li>
    
                            <li>
                                <router-link to="/coupons" class="waves-effect closemenu">
                                    <i class="bx bxs-user-detail"></i>
                                    <span>coupons</span>
                                </router-link>
                            </li>
                           
                            <li>
                                <router-link to="/admin-site-settings" class="waves-effect closemenu">
                                    <i class="bx bx-cog"></i>
                                    <span>Site Settings</span>
                                </router-link>
                            </li>
    
                            <li>
                                <a  class="waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bx bx-power-off"></i>
                                    {{ __('Logout') }}
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                 </form>
                            </li>
              
                        </ul> 
                    </div>
                    @else
                    {{-- User dashboard --}}
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>
            
                            <li>
                                <router-link to="/dashboard" class="waves-effect closemenu">
                                    <i class="bx bx-home-circle"></i>
                                    <span>Dashboards</span>
                                </router-link>
                            </li>
            
                            <li>
                                <router-link to="/user-orders" class="waves-effect closemenu">
                                    <i class="bx bx-store"></i>
                                    <span>My Orders</span>
                                </router-link>
                            </li>
    
                            <li>
                                <router-link to="/user-wishlist" class="waves-effect closemenu">
                                    <i class="bx bx-briefcase-alt-2"></i>
                                    <span>My Wishlist</span>
                                </router-link>
                            </li>
    
                            <li>
                                <router-link to="/settings" class="waves-effect closemenu">
                                    <i class="bx bx-cog"></i>
                                    <span>Settings</span>
                                </router-link>
                            </li>
    
                            <li>
                                <a href="/" class="waves-effect closemenu">
                                    <i class="bx bx-building-house"></i>
                                    <span>Return To Shop</span>
                                </a>
                            </li>
    
                           
    
                            <li>
                                <a  class="waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bx bx-power-off"></i>
                                    {{ __('Logout') }}
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                 </form>
                            </li> 
                        </ul> 
                    </div>
                    @endif
                @endif
                <!--- Sidemenu -->
               
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        
         {{-- Heade ends here --}}
        <main>
            @yield('content')
        </main>
       
         {{-- Footer starts here --}}
        
         {{-- Footer ends here --}}

    </div>

    <!-- JAVASCRIPT -->
    <script src="cms/assets/libs/jquery/jquery.min.js"></script>
    <script src="cms/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="cms/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="cms/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="cms/assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="cms/assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="cms/assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="cms/assets/js/app.js"></script>

    <script>
      
    </script>

    <script src="https://js.paystack.co/v1/inline.js"></script>
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
    @stack('customjs')
</body>
</html>
