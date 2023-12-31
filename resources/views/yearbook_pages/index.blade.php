<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Yearbook Index') }}</title>

    <!-- Fonts -->
    <link rel="icon" href="{{asset('profile.png')}}" type="image/x-icon">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    <style>
        * {
            font-family: georgia;
       
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-image: url('{{ asset('loginformbg.png') }}'); background-size: cover; 
 background-repeat: no-repeat; 
 background-position:fixed 
 background-attachment: fixed;">
    <div>
         <nav class="navbar navbar-expand-md navbar-light bg-transparent shadow-sm">
            <div>
                <img src="ceclogo.png" class="container rounded mx-auto d-inline-block float-left" alt="hugenerd" width="80" height="80">            
            </div>
                <p class="display-5 text-primary text-uppercase font-weight-bold ">Beyond the Frame</p>
                <p class="display-5 text-warning text-uppercase font-weight-bolder ">|</p>
                <h2 class="text-arial text-warning font-weight-bold ">Cristal e-College Interactive Digital Yearbook</h2>
        </nav>  
    </div> 

<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="border-primary bg-white card mt-6 ">
                <img class="rounded-circle float-center mx-auto mt-5" src="{{ asset('profile.png')}}" width="150px"  height="150px"/>
                <h2 class="text-primary font-weight-bolder card-title mx-auto mt-1"><b>LOGIN<b></h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" style="float:right;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8 offset-md-2 ms-6">

                                @if (Route::has('password.request'))
                                <li class="nav-item text-center" style="list-style-type: none;">
                                    Forgot
                                    <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Username/Password?') }}</a>
                                </li>
                                <li class="nav-item text-center" style="list-style-type: none;">
                                    Don't have an account?
                                    <a class="btn btn-link" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                                </li>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#password').password()
    })
</script>
    
</body>
</html>