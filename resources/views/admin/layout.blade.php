<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('admin_asset/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('admin_asset/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('admin_asset/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/icon/themify-icons/themify-icons.css')}}">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/css/font-awesome-n.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/css/font-awesome.min.css')}}">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/css/jquery.mCustomScrollbar.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
</head>

</head>

<body>
  
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/">
                            <h4>Admin Panel</h4>
                            <!-- <img class="img-fluid" src="{{asset('admin_asset/images/logo.png')}}" alt="Theme-Logo" /> -->
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                          
                        </ul>
                        <ul class="nav-right">
                            
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <img src="{{asset('admin_asset/images/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image">
                                    <span>                                 
                                           {{ Auth::user()->name }}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                <!--     <li class="waves-effect waves-light">
                                        <a href="#!">
                                            <i class="ti-settings"></i> Settings
                                        </a>
                                    </li>-->
                                    <li class="waves-effect waves-light">
                                        <a href="{{url('Profile')}}">
                                            <i class="ti-user"></i>View Profile
                                        </a>
                                    </li> 
                                    
                                      <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                  <i class="ti-layout-sidebar-left"></i>  {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
                <div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
            <div class="pcoded-inner-navbar main-menu">
                <div class="">
                    <div class="main-menu-header">
                       <img class="img-80 img-radius" src="{{asset('admin_asset/images/avatar-4.jpg')}}" alt="User-Profile-Image"> 
                        <div class="user-details">
                            <span id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></span>
                        </div>
                    </div>
                    <div class="main-menu-content">
                        <ul>
                            <li class="more-details">
                                <a href="{{url('Profile')}}"><i class="ti-user"></i>View Profile</a>
                                <!-- <a href="#!"><i class="ti-settings"></i>Settings</a> -->
                                 <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                  <i class="ti-layout-sidebar-left"></i>  {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                             {{--    <a href="logout"><i class="ti-layout-sidebar-left"></i>Logout</a> --}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="p-15 p-b-0">
                    <form class="form-material">
                        <div class="form-group form-primary">
                            <input type="text" name="footer-email" class="form-control">
                            <span class="form-bar"></span>
                            <label class="float-label"><i class="fa fa-search m-r-10"></i>Search...</label>
                        </div>
                    </form>
                </div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="active">
                        <a href="admin/" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext">Dashboard</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
     <!--            <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>BC</b></span>
                            <span class="pcoded-mtext">Basic</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="breadcrumb.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Breadcrumbs</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            
                          
                        </ul>
                    </li>
                </ul> -->
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="{{ Request::is('admin/logo')? 'active' : '' }}">
                        <a href="{{url('admin/logo')}}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext">Logo</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/users')? 'active' : '' }}">
                        <a href="{{url('admin/users')}}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext">Users</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
         
                    <li class="{{ Request::is('admin/assets')? 'active' : '' }}">
                        <a href="{{url('admin/assets')}}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext">Assets</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
 
                    <li class="{{ Request::is('admin/links')? 'active' : '' }}">
                        <a href="{{url('admin/links')}}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext">Links</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
             </div>
        </nav>

@section('content')
@show


			   <script type="text/javascript" src="{{asset('admin_asset/js/jquery/jquery.min.js')}} "></script>
    <script type="text/javascript" src="{{asset('admin_asset/js/jquery-ui/jquery-ui.min.js')}} "></script>
    <script type="text/javascript" src="{{asset('admin_asset/js/popper.js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin_asset/js/bootstrap/js/bootstrap.min.js')}} "></script>
    <!-- waves js -->
    <script src="{{asset('admin_asset/pages/waves/js/waves.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('admin_asset/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- slimscroll js -->
    <script src="{{asset('admin_asset/js/jquery.mCustomScrollbar.concat.min.js')}} "></script>

    <!-- menu js -->
    <script src="{{asset('admin_asset/js/pcoded.min.js')}}"></script>
    <script src="{{asset('admin_asset/js/vertical/vertical-layout.min.js')}} "></script>

    <script type="text/javascript" src="{{asset('admin_asset/js/script.js')}} "></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
</body>

</html>
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>