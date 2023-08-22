<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <link rel="icon" href="{{asset('profile.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
   
        .p1 {
                font-family: "arial black";
                font-size: 40px;  
                color: skyblue;               
        }
        .p2 {
                font-family: "calibri";
                font-size: 20px;  
                color: white;               
        }
        .p3 {
                font-family: "arial";
                font-size: 12px;  
                color: white;               
        }
        nav {
                background-color: darkblue;
        }
        .active{
            background-color: orange;
            border-radius: 5px;
        }
  
    </style>
 </head>
<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-nav shadow-sm">
            <div>
                <img src="csdlogo.png" class="container rounded mx-auto d-inline-block float-left" alt="hugenerd" width="60" height="60">            
            </div>
                <h1 class="p1  text-uppercase">Beyond the Frame</h1>
                <p class="display-5 text-primary font-weight-bolder ">|</p>
                <h2 class="p2 font-weight-bold ">Digital Yearbook</h2>

        </nav>         
    </div>       

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white w-auto p-2">
            	<img src="">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <br><br>
                            <img src="profile.png" class="rounded mx-auto ms-5 d-block" alt="hugenerd" width="120" height="120">                          
            
                        </li>
                        <br><br>
                        <div>                       
                        <li class="nav-item active"> 
                            <a href="{{ route('dashboard') }}" class="text-start nav-link text-white btn btn-outline-warning px-5"><i class="fa-solid fa-chart-area" style="color: #ffffff;"></i> Dasboard</a>
                        </li>
                        <hr>
                         <li class="nav-item"> 
                            <a href="{{ route('registration') }}" class="text-start nav-link text-white btn btn-outline-warning px-5 align-center"><i class="fa-regular fa-address-card" style="color: #ffffff;"></i> Registration</a>
                        </li>
                        <hr>    
                        <li class="nav-item"> 
                            <a href="{{ route('reports') }}" class="text-start nav-link text-white btn btn-outline-warning px-5 align-center"><i class="fa-regular fa-file-lines" style="color: #ffffff;"></i> Reports</a>
                        </li>
                        <hr>
                        <li class="nav-item"> 
                            <a href="#submenu3" data-bs-toggle="collapse" class="text-start nav-link text-white btn btn-outline-warning px-5 align-center dropdown-toggle "><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> Yearbook</a>                  
                         <hr>  
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">                                   
                                    <a href="{{ route('upload') }}" class="p3 nav-link text-white btn btn-outline-info px-5"> <span class="d-none d-sm-inline">Upload Template</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('design') }}" class="p3 nav-link text-white btn btn-outline-info px-5"> <span class="d-none d-sm-inline">Design</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('edit') }}" class="p3 nav-link text-white btn btn-outline-info px-5"> <span class="d-none d-sm-inline">Edit</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('comment') }}" class="p3 nav-link text-white btn btn-outline-info px-5"> <span class="d-none d-sm-inline">Comment</span></a>                           
                                    </li>
                            </ul>
                        </div>
                                
                      <br><br><br><br><br><br><br><br>                  
                    <div class="dropdown pb-4">                 
                    <a href="#" class="d-flex align-items-center text-white  dropdown-toggle text-start nav-link btn btn-outline-dark px-5 align-center" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">                   
                    <i class="fa-solid fa-user-gear fa-2xl" style="color: #ffffff;"></i><h5>{{ __(' ADMIN') }}</h5></a>
                    </a>
                   
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-user-large fa-lg" style="color: #ffae00;"></i> {{ __('User Profile') }}
                                    </a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket fa-lg" style="color: #ffbb00;"></i> {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col py-1">
                <p class="lead text-danger text-center mb-5"><h2 class="text-center">Dashboard</h2></p>
            
        </div>
    </div>
</div>
</body>

</html>
