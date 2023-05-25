<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>@yield('title') - Pendataan Pura</title>
    <link rel="apple-touch-icon" href="{{url('/template/assets/favicon/pura-icon.png')}}">
    <link rel="icon" type="image/png" href="{{url('/template/assets/favicon/pura-icon.png')}}">
    <link rel="manifest" href="{{url('/template/assets/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{url('/template/assets/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{url('/template/vendors/simplebar/css/simplebar.css')}}">
    <link rel="stylesheet" href="{{url('/template/css/vendors/simplebar.css')}}">
    <!-- Main styles for this application-->
    <link href="{{url('/template/css/style.css')}}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="{{url('/template/css/examples.css')}}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    /> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/template/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/template/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <link rel="stylesheet" href="{{url('/css/leaflet.css')}}" />
    <link rel="stylesheet" href="{{url('/css/style.css')}}" />
    <script src="{{url('/js/leaflet_.js')}}"></script>
    <script src="{{url('/js/leaflet.markercluster.js')}}"></script>
    <link rel="stylesheet" href="{{url('/css/MarkerCluster.css')}}" />
    <link rel="stylesheet" href="{{url('/css/MarkerCluster.Default.css')}}" /> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"
    />

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
</head>
<body>
    @guest
    @else
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{url('/template/assets/brand/coreui.svg#full')}}"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="{{url('/template/assets/brand/coreui.svg#signet')}}"></use>
            </svg>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{url('/')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-map')}}"></use>
                    </svg> Map
                </a>
            </li>
            <li class="nav-title">Data Pura</li>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tambahpura*') ? 'active' : '' }}" href="{{ route('tambahpura') }}"> 
                            <svg class="nav-icon">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                            </svg>
                            Tambah Pura
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('daftarpura*') ? 'active' : '' }}" href="{{ route('daftarpura') }}"> 
                            <svg class="nav-icon">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-bank')}}"></use>
                            </svg>
                            Daftar Pura
                        </a>
                    </li>
                </ul>
            <li class="nav-title">Data Pelinggih</li>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tambahpelinggih*') ? 'active' : '' }}" href="{{ route('tambahpelinggih') }}"> 
                            <svg class="nav-icon">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                            </svg>
                            Tambah Pelinggih
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('daftarpelinggih*') ? 'active' : '' }}" href="{{ route('daftarpelinggih') }}"> 
                            <svg class="nav-icon">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-bank')}}"></use>
                            </svg>
                            Daftar Pelinggih
                        </a>
                    </li>
                </ul>
            <li class="nav-title">Data Pengurus</li>       
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tambahpengurus*') ? 'active' : '' }}" href="{{ route('tambahpengurus') }}"> 
                            <svg class="nav-icon">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                            </svg>
                            Tambah Pengurus
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('daftarpengurus*') ? 'active' : '' }}" href="{{ route('daftarpengurus') }}"> 
                            <svg class="nav-icon">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                            </svg>
                            Daftar Pengurus
                        </a>
                    </li>
                </ul>
        </ul>
        
    </div>
    @endguest
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
                    </svg>
                </button>
                <a class="header-brand d-md-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="{{url('/template/assets/brand/coreui.svg#full')}}"></use>
                    </svg>
                </a>
                <ul class="header-nav d-none d-md-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pendataan Pura</a>
                    </li>
                </ul>
                <ul class="header-nav ms-auto">
                    
                </ul>
                <ul class="header-nav ms-3">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link py-0 dropdown-toggle" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <a class="dropdown-item" href="{{ route('signout') }}">
                                    
                                <svg class="icon me-2">
                                    <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>
                                </svg> Logout
                                
                            </a>
                            <form id="logout-form" action="" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </ul>
            </div>
            <div class="header-divider"></div>
            <div class="container-fluid">
                <nav aria-label="breadcrumb" >
                    <ol class="breadcrumb my-0 ms-2" style="background-color: transparent;">
                        @yield('breadcrumb')
                    </ol>
                </nav>
            </div>
        </header>
        
        <div class="body flex-grow-1 px-3">
            <div class="container-fluid">
                @yield('content')
                
            </div>
        </div>

        <footer class="footer">
            <div></div>
            <div class="ms-auto">©2023</div>
        </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{url('/template/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
    <script src="{{url('/template/vendors/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{url('/js/bootstrap.bundle.min.js')}}"></script>
    <script>
		@if (Session::has('success'))
			toastr.options = {
				"closeButton" : true,
				"progressBar" : true
			}
			toastr.success("{{ Session::get('success') }}");
		@endif
		@if (Session::has('error'))
			toastr.options = {
				"closeButton" : true,
				"progressBar" : true
			}
			toastr.error("{{ Session::get('error') }}",);
		@endif
    </script>
</body>
</html>