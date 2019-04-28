<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token()  }}">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') . '?r=' . rand()  }}" />
		@yield('styles')
		<link rel="stylesheet" href="{{ asset('css/custom.css') . '?r=' . rand()  }}" />
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
    		<ul class="nav navbar-nav ml-auto pr-3">
    			<li class="nav-item dropdown">
    				<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
    					<img class="img-avatar mr-1" src="{{ asset('storage/default2.png') }}">
						<span class="d-none d-sm-inline">Admin</span>
    				</a>
    				<div class="dropdown-menu dropdown-menu-right">
    					<a class="dropdown-item" href="#">
    						<i class="fa fa-bell-o"></i> Updates
    						<span class="badge badge-info">42</span>
    					</a>
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
							<a class="nav-link" href="/admin">
								<i class="nav-icon icon-speedometer"></i> Dashboard
								{{-- <span class="badge badge-primary">NEW</span> --}}
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/admin/events">
								<i class="nav-icon icon-calendar"></i> Events
							</a>
						</li>
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
					<div class="ui-view">
						<div>
							<div class="animated fadeIn">
								<h1 class="mb-5 mt-4">@yield('title2')</h1>
								@yield('content')
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>

        <footer class="app-footer">
            <div>
                <a href="#">EventBooking</a>
                <span>&copy; 2019</span>
            </div>
            <div class="ml-auto">
                <span>Powered by</span>
                <a href="#">Laravel</a>
            </div>
        </footer>

        <script src="{{ asset('js/app.js') . '?r=' . rand() }}"></script>
		@yield('scripts')
    </body>
</html>
