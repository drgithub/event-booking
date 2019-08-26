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
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Event Booking - Login</title>
        <!-- Icons-->
        <link rel="stylesheet" href="{{ asset('coreui-icons/css/coreui-icons.min.css') . '?r=' . rand()  }}" />
        <link rel="stylesheet" href="{{ asset('flag-icon-css/css/flag-icon.min.css') . '?r=' . rand()  }}" />
        <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') . '?r=' . rand()  }}" />
        <link rel="stylesheet" href="{{ asset('simple-line-icons/css/simple-line-icons.css') . '?r=' . rand()  }}" />
        <!-- Main styles for this application-->
        <link rel="stylesheet" href="{{ asset('CoreUI/src/css/style.css') . '?r=' . rand()  }}" />
        <link rel="stylesheet" href="{{ asset('CoreUI/src/vendors/pace-progress/css/pace.min.css') . '?r=' . rand()  }}" />
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
    <body class="app flex-row align-items-center">
       <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-group">
                        <div class="card p-4">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <h1>Login</h1>
                                    <p class="text-muted">Sign In to your account</p>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-user"></i>
                                            </span>
                                        </div>
                                        <input 
                                            id="email" 
                                            type="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            name="email" 
                                            value="{{ old('email') }}" 
                                            required 
                                            autocomplete="email" 
                                            autofocus
                                            placeholder="Email Address"
                                        >
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-lock"></i>
                                            </span>
                                        </div>
                                        <input 
                                            id="password" 
                                            type="password" 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            name="password" 
                                            required 
                                            autocomplete="current-password"
                                            placeholder="Password"
                                        >
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                        @if (Route::has('password.request'))    
                                            <div class="col-6 text-right">
                                                <a href="{{ route('password.request') }}" class="btn btn-link px-0">
                                                    {{ __('Forgot password?') }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                            <div class="card-body text-center">
                                <div>
                                    <h2>Sign up</h2>
                                    <p>Don't miss the upcoming event</p>
                                    <a href="{{ route('register') }}" class="btn btn-primary active mt-3">Register Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    </body>
</html>


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
