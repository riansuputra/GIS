<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Pendataan Pura</title>
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
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mb-4 mx-4">
                        <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <h1>Register</h1>
                            <p class="text-medium-emphasis">Create your account</p>
                            
                            <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                                </svg></span>
                                <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Username" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"></use>
                                </svg></span>
                                <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
                                </svg></span>
                                <input id="password" name="password"class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>                            
                            <button class="btn btn-block btn-success" type="submit">Create Account</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{url('/template/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
    <script src="{{url('/template/vendors/simplebar/js/simplebar.min.js')}}"></script>
    <script>
    </script>
</body>
</html>