<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'User Login') }}</title>

    <!-- Fonts -->
    <link rel="icon" href="{{asset('student.png')}}" type="image/x-icon">
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
            <div class="border-primary bg-white card mt-4">
                <img class="rounded-circle float-center mx-auto mt-5" src="{{ asset('student_icon.png')}}" width="150px"  height="150px"/>
                <h2 class="text-dark font-weight-bolder card-title mx-auto mt-1"><b>LOGIN</b></h2>
                <p class="fs-10 text-center">Two-Factor Authentication</p>
                <p class="fs-10 text-center">Enter student ID to login.</p>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-5">
                            <label for="studentid" class="col-md-4 col-form-label text-md-end"><b>{{ __('Student ID') }}</b></label>

                            <div class="col-md-6">
                                <input id="studentid" type="studentid" class="form-control @error('studentid') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>

                                @error('studentid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary btn-lg" style="float:right;">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>