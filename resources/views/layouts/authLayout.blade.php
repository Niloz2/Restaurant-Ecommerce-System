<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Selah Kitchen') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

       <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('css/solid.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f5f5f5;
        }

        

        .content {
            /* margin-left: 260px; */
            padding: 30px;
            transition: margin-left 0.3s;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: white;
            margin-bottom: 20px;
            width: 100%;
        }

        .card-header {
            background-color: #FF831F;
            color: white;
            font-weight: 600;
            padding: 15px 20px;
            border-bottom: none;
        }

        .card-body {
            padding: 20px;
        }

        .btn-custom {
            background-color: #FF831F;
            color: white;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #e65a00;
            color: white;
        }

        .logoAdmin {
            height: 100%;
            width: auto;
        }

        .logoContainer {
            display: flex;
            align-items: center;
        }

        .logoContainer .text {
            margin-left: 15px;
        }

        .logoContainer .text .one {
            font-weight: bolder;
            font-size: 1.5rem;
        }

        .logoContainer .text .two {
            font-weight: normal;
            font-size: 1rem;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar h4 {
                margin-top: 10px;
            }

            .sidebar a {
                padding: 10px;
                justify-content: center;
            }

            .content {
                margin-left: 0;
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .logoAdmin {
                width: 60%;
            }

            .logoContainer {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .logoContainer .text {
                margin-left: 0;
                margin-top: 10px;
            }
        }

    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container logoContainer">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logoAdmin" src="{{ asset('img/logo.png') }}" alt="">
                </a>
                <div class="text-center">
                    <h1 class="one">SELAH KITCHEN</h1>
                    <h6 class="two">Eat, Breathe, Repeat</h6>
                </div>
                <div></div>
            </div>
        </nav>

        <div class="wrapper#">
            <div class="content">
                @yield('content')
            </div>
        </div>

    </div>
     <!-- Bootstrap 5 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
    <!-- Your other scripts -->
    @stack('scripts')
</body>
</html>
