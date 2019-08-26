<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="Event Booking">
        <meta name="author" content="Ralph Michael Cuevas">
        <meta name="keyword" content="Event,Booking">
        <meta name="csrf-token" content="{{ csrf_token()  }}">
        <title>@yield('title')</title>
        <!-- Icons-->
        <link rel="stylesheet" href="{{ asset('coreui-icons/css/coreui-icons.min.css') . '?r=' . rand()  }}" />
        <link rel="stylesheet" href="{{ asset('flag-icon-css/css/flag-icon.min.css') . '?r=' . rand()  }}" />
        <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') . '?r=' . rand()  }}" />
        <link rel="stylesheet" href="{{ asset('simple-line-icons/css/simple-line-icons.css') . '?r=' . rand()  }}" />
        <!-- Main styles for this application-->
        <link rel="stylesheet" href="{{ asset('CoreUI/src/css/style.css') . '?r=' . rand()  }}" />
        <link rel="stylesheet" href="{{ asset('CoreUI/src/vendors/pace-progress/css/pace.min.css') . '?r=' . rand()  }}" />
        <!-- Pages Styles -->
        @yield('styles')
        <!-- Custom -->
        <link rel="stylesheet" href="{{ asset('css/custom.css') . '?r=' . rand()  }}" />
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
    <body class="app header-fixed">
        <header class="app-header navbar">
        <a class="navbar-brand" href="#">
            <span class="navbar-brand-full">EventBooking</span>
            <span class="navbar-brand-minimized">EB</span>
        </a>
        <ul class="nav navbar-nav ml-auto">
            @guest
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @else
                <li class="nav-item dropdown px-3">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="display: flex;align-items: center">
                      <img class="img-avatar" src="{{ asset('img/default2.png') }}" alt="{{ Auth::user()->email }}"> <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-center">
                            <strong>Settings</strong>
                        </div>
                        <a class="dropdown-item" href="{{ route('account.profile') }}">
                            <i class="fa fa-user"></i> Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-lock"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
        </header>
        <div class="app-body">
        <main class="main">
            <div class="container-fluid">
                <div class="animated fadeIn">
                    @yield('content')
                </div>
            </div>
        </main>
        </div>
        <!-- CoreUI and necessary plugins-->
        <script src="{{ asset('js/jquery-3.4.1.min.js') . '?r=' . rand() }}"></script>
        <script src="{{ asset('js/popper.min.js') . '?r=' . rand() }}"></script>
        <script src="{{ asset('js/moment.js') . '?r=' . rand() }}"></script>
        <script src="{{ asset('bootstrap-4.3.1/dist/js/bootstrap.min.js') . '?r=' . rand() }}"></script>
        <script src="{{ asset('js/pace.min.js') . '?r=' . rand() }}"></script>
        <script src="{{ asset('perfect-scrollbar/dist/perfect-scrollbar.min.js') . '?r=' . rand() }}"></script>
        <script src="{{ asset('js/coreui.min.js') . '?r=' . rand() }}"></script>
        @yield('scripts')
    </body>
</html>


{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html> --}}
