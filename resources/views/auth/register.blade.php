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
        <title>Event Booking - Register</title>
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
                <div class="col-md-6">
                    <div class="card mx-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="card-body p-4">
                                <h1>Register</h1>
                                <p class="text-muted">Create your account</p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-user"></i>
                                        </span>
                                    </div>
                                    <input 
                                        id="name" 
                                        type="text" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        name="name" 
                                        value="{{ old('name') }}" 
                                        required 
                                        autocomplete="name" 
                                        autofocus
                                        placeholder="Username"
                                    >
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input 
                                        id="email" 
                                        type="email" 
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        required
                                        autocomplete="email"
                                        placeholder="Email Address"
                                    >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
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
                                        autocomplete="new-password"
                                        placeholder="Password"
                                    >
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-lock"></i>
                                        </span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat password">
                                </div>
                                <button class="btn btn-block btn-success" type="submit">Create Account</button>
                            </div>
                        </form>
                        {{-- <div class="card-footer p-4">
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-block btn-facebook" type="button">
                                        <span>facebook</span>
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-block btn-twitter" type="button">
                                        <span>twitter</span>
                                    </button>
                                </div>
                            </div>
                        </div> --}}
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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
