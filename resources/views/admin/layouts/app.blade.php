<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
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
    {{-- Pages Custom Styles --}}
    @yield('custom')
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
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
      <span class="navbar-brand-full">EventBooking</span>
      <span class="navbar-brand-minimized">EB</span>
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img class="img-avatar"  src="{{ asset('img/default2.png') }}" alt="admin@bootstrapmaster.com"> Admin&nbsp;&nbsp;&nbsp;&nbsp;
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Settings</strong>
          </div>
          <a class="dropdown-item" href="#">
            <i class="fa fa-user"></i> Profile
          </a>
          <a class="dropdown-item" href="#">
            <i class="fa fa-lock"></i> Logout
          </a>
        </div>
      </li>
    </ul>
    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('root') }}">
                <i class="nav-icon icon-speedometer"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('events.index') }}">
                <i class="nav-icon icon-speedometer"></i> Event
              </a>
            </li>
            <li class="divider"></li>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Admin</li>
				  @yield('breadcrumb')
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <h1 class="mb-5 mt-4">@yield('title2')</h1>
            @yield('content')
          </div>
        </div>
      </main>
    </div>
    <footer class="app-footer">
      <div>
        <a href="#">Event Booking</a>
        <span>&copy; 2019</span>
      </div>
      <div class="ml-auto">
        <span>Powered by</span>
        <a href="https://www.facebook.com/ralph.kirito">CoreUI</a>
      </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/jquery-3.4.1.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('js/popper.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('js/moment.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('bootstrap-4.3.1/dist/js/bootstrap.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('js/pace.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('perfect-scrollbar/dist/perfect-scrollbar.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('js/coreui.min.js') . '?r=' . rand() }}"></script>
    <script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      function notificationAlert(data) {
        $(data.container).prepend('<div class="alert alert-' + data.status + '">' + data.message + '</div>');
      };
    </script>
    @yield('scritps')
  </body>
</html>
