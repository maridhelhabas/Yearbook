
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token --> 
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Yearbook Index') }}</title>

    <!-- Fonts -->
    <link rel="icon" href="{{asset('assets/image/ceclogo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"/>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">


        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
       

    </style>
</head>
<body style="background-image: url('{{ asset('assets/image/loginformbg.png') }}');">
    <div>
        <div class="navbar navbar-expand-md navbar-light bg-transparent shadow-sm">
            <div>
                <img src="{{ asset('assets/image/ceclogo.png')}}" class="container rounded mx-auto d-inline-block float-left" alt="hugenerd" width="80" height="80">            
            </div>
                <p class="p1 display-5  text-uppercase font-weight-bold ">Beyond the Frame</p>
                <p class="display-5 text-warning font-weight-bolder ">  |</p>
                
                <p class="p2">Cristal e-College Interactive Digital Yearbook</p>
        </div>  
    </div> 
          
 <br><br><br><br><br></br>
<div class="container" >
    <div class="row justify-content-center mt-1">
        <div class="col-sm-9 col-md-7 col-lg-5 mt-1">
            <div class="border-primary card mt-2"> 
                <img class="rounded-circle float-center mx-auto mt-5" src="{{ asset('assets/image/ceclogo.png')}}" width="100px"  height="100px"/>
                    <h2 class="p1 text-primary font-weight-bolder card-title mx-auto mt-1"><b>LOGIN<b></h2>
                    

                    <br>
                <div class="card-body mb-5 mt-2">
                    @if(session()->has('login_errors'))
                        <div class="alert alert-danger col-md-9 mx-auto py-1 error-container" style="border-left: 4px solid red;">
                            @foreach(session('login_errors') as $error)
                                <p class="mt-3"><i class="fa-solid fa-triangle-exclamation" style="margin-right: 5px;"></i>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif



                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-floating col-md-9 mx-auto">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Username">
                                <label for="email">{{ __('Username or email address') }}</label>      
                        </div>

                       <div class="form-floating mb-2 col-md-9 mx-auto mt-4">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">
                            <label for="password">{{ __('Password') }}</label>
                            <span id="password1" onclick="togglePasswordVisibility()">
                                <i class="fas fa-eye" id="eye-icon"></i>
                            </span>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-9 mx-auto d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                        {{ __('LOGIN') }}
                                    </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 offset-md-7">
                                @if (Route::has('password.request'))
                                
                                    <a class="btn btn-link  text-primary" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                                
                               
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br>

<br><br><br><br><br></br>
<footer class="footer mt-5 py-1 bg-primary text-white" >
    <div class="container">
        <div class="row mt-2"  style="margin-top:10px !important">
            <div class="col-md-8 mb-0 text-white">
                © A Capstone Project Developed by <a style="color:#85d8ff" href="https://sites.google.com/view/apexyearbook">Apex</a>
            </div>
            <ul class="nav col-md-3 justify-content-end mb-1">
                <li class="nav-item"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Have any concerns? Contact us: <span style="color:#85d8ff">cec.edu.ph</span> </li>
            </ul>
        </div>
    </div>
</footer> 

<script>
        function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var eyeIcon = document.getElementById('eye-icon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}
</script>
</body>
</html>


