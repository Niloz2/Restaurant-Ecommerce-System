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

    {{-- Summernote without using boostrap --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f5f5f5;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            padding: 20px;
            position: fixed;
            height: 100%;
            transition: all 0.3s;
            overflow-y: auto;
        }

        .sidebar h4 {
            color: white;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }

        .sidebar a {
            color: white;
            display: flex;
            align-items: center;
            padding: 12px;
            text-decoration: none;
            font-weight: 500;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: background-color 0.3s, padding-left 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
            padding-left: 20px;
        }

        .sidebar a i {
            margin-right: 10px;
            color: #FF831F;
        }

        .content {
            margin-left: 260px;
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

        .logout-button {
            background-color: #FF831F;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            transition: background-color 0.3s, transform 0.3s;
            font-weight: 600;
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .logout-button i {
            margin-right: 8px;
            /* Adjust the space between icon and text */
        }

        .logout-button:hover {
            background-color: #e65a00;
            transform: scale(1.05);
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
                <div>
                    @if (Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-button">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </nav>

        <div class="wrapper">
            @if (Auth::check())
                <div class="sidebar">
                    <h4>Admin Panel</h4>
                    <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    <a href="{{ route('admin.users.create') }}"><i class="fas fa-users-cog"></i> Admin Management</a>
                    <a href="{{ route('admin.menu') }}"><i class="fas fa-utensils"></i> Menu Management</a>
                    <a href="{{ route('admin.orders') }}"><i class="fas fa-shopping-cart"></i> Order Management</a>
                    <a href="{{ route('admin.blog.index') }}"><i class="fas fa-blog"></i> Blog Management</a>
                    <a href="{{ route('admin.payment') }}"><i class="fas fa-credit-card"></i> Payment</a>
                    <a href="{{ route('admin.subscription') }}"><i class="fas fa-envelope-open-text"></i>Booking</a>
                    <a href="/admin/contact-messages"><i class="fas fa-phone-alt"></i>Contacts</a>
                    <a href="{{ route('admin.suggestions') }}"><i class="fas fa-lightbulb"></i> Setting</a>
                    <a href=""></a>
                    {{-- <a href="{{ route('admin.about') }}"><i class="fas fa-info-circle"></i> About Us Page</a> --}}
                    {{-- <a href="{{ route('admin.foodMenu') }}"><i class="fas fa-concierge-bell"></i> Food Menu
                        Listing</a> --}}
                    {{-- <a href="{{ route('admin.userProfiles') }}"><i class="fas fa-user"></i> User Profile
                            Management</a> --}}
                </div>
            @endif
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

<script>
    $('#summernote').summernote({
        placeholder: 'Enter Blog contents here',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
</html>
