
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Yearbook Index') }}</title>

    <!-- Fonts -->
    <link rel="icon" href="{{asset('ceclogo.png')}}" type="image/x-icon">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
    
        .image {
                background-image: url("backg.png");
                filter: blur(5px); 
                height: 100%;
                background-repeat: no-repeat; 
                background-position:fixed; 
                background-attachment: fixed;
                background-size: cover;
        }
       
        .p1 {
                font-family: "georgia";
                color: darkblue;
        }

        .p2 {
                font-family: "calibri";
                font-size: 30px;
                font-weight: bold;
                color: darkblue;
        }
        .p3 {
                font-family: "arial";
                font-size: 12px;  
                color: white;               
        }
        nav {
                background-color: darkblue;
        }
        .hi{
            background-image: url('{{ asset('loginformbg.png') }}'); 
            background-size: cover;
            background-repeat: no-repeat; 
            background-position:fixed;
            background-attachment: fixed;"
        }
        .active{
            background-color: orange;
            border-radius: 5px;
        }
    </style>

</head>
<body class="hi">
    <div>
         <nav class="navbar navbar-expand-md navbar-light bg-transparent shadow-sm">
            <div>
                <img src="ceclogo.png" class="container rounded mx-auto d-inline-block float-left" alt="hugenerd" width="80" height="80">            
            </div>
                <p class="p1 display-5  text-uppercase font-weight-bold ">Beyond the Frame</p>
                <p class="display-5 text-warning font-weight-bolder ">  |</p>
                
                <p class="p2">Cristal e-College Interactive Digital Yearbook</p>
        </nav>  
    </div> 
          
 <br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="border-primary bg-white card mt-6 "> 
                <img class="rounded-circle float-center mx-auto mt-5" src="{{ asset('profile.png')}}" width="150px"  height="150px"/>
                    <h2 class="p1 text-primary font-weight-bolder card-title mx-auto mt-1"><b>LOGIN<b></h2>
                    <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-dark text-md-end">{{ __('Username') }}</label>
                        <div class="col-md-6">
                            <input id="username" type="username" class="bg-primary-subtle form-control @error('username') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label  text-dark text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6 ">
                                <input id="password" type="password" class="bg-primary-subtle form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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

                        <div class="row mb-5">
                            <div class="col-md-7 offset-md-2">

                                @if (Route::has('password.request'))
                                <li class="nav-item  text-dark text-right" style="list-style-type: none;">
                                    Forgot
                                    <a class="btn btn-link  text-primary " href="{{ route('password.request') }}">{{ __('Username/Password?') }}</a>
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