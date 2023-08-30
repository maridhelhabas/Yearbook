<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <title>Registration</title>




    <link rel="icon" href="{{asset('profile.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />




    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
    .p1 {
            font-family: "arial black";
            font-size: 40px;
            letter-spacing: 5px;
            color: white;              
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
        .p4 {
            font-family: "arial";
            font-size: 25px;  
            color: darkblue;              
        }
        nav {
            background-color: #0039a6;
            position:fixed;
        }
        .active{
            background-color: orange;
            border-radius: 5px;
            length: 20;
        }
        .sidebar {
            height: 100%;
            width: 230px;
            position: fixed;            
        }
        .dropdown {
            margin-top: 80%;
        }
        .register {
            position: fixed;
            height: 50%;
            margin-top: 550px;
            margin-left: 250px;
            margin-right: 10px;                
        }
        #grad1 {
            height: 87.9%;
            background-image: linear-gradient(#FFFAF0, #1E90FF);
            background-size: 100%;
            background-position: fixed;    
        }      
    </style>
 </head>
<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-nav shadow-sm">
            <div>
                <img src="csdlogo.png" class="container rounded mx-auto d-inline-block float-left" alt="hugenerd" width="60" height="60">
            </div>
                <h1 class="p1 text-uppercase">Beyond the Frame</h1>
                <p class="display-5 text-primary font-weight-bolder ">|</p>
                <h2 class="p2 font-weight-bold ">Digital Yearbook</h2>
        </nav>
    </div>
    <div id="grad1">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="sidebar col-auto col-md-3 col-xl-2 px-sm-0 px-0 bg-primary">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <div class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                            <br>
                            <img src="profile.png" class="rounded mx-auto ms-5 d-block" alt="hugenerd" width="100" height="100">      
                            </li>
                            <br>
                            <div>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}" class="text-start nav-link text-white btn btn-outline-warning px-5 align-center"><i class="fa-solid fa-chart-area" style="color: #ffffff;"></i> Dasboard</a>
                                </li>
                                <hr>
                                <li class="nav-item active">
                                    <a href="{{ route('registration') }}" class="text-start nav-link text-white btn btn-outline-warning px-5 align-center"><i class="fa-regular fa-address-card" style="color: #ffffff;"></i> Registration</a>
                                </li>
                                <hr>
                                <li class="nav-item">
                                    <a href="{{ route('reports') }}" class="text-start nav-link text-white btn btn-outline-warning px-5 align-center"><i class="fa-regular fa-file-lines" style="color: #ffffff;"></i> Reports</a>
                                </li>
                                <hr>
                               
                                <li>
                                    <a href="#submenu3" data-bs-toggle="collapse" class="text-start nav-link text-white btn btn-outline-warning px-5 align-center dropdown-toggle">
                                    <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>Yearbook</a><hr>
                                    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline"></span> </a>
                                    <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                        <li class="w-100">
                                            <a href="#" class="p3 text-start nav-link text-white btn btn-outline-info px-5"> <span class="d-none d-sm-inline">Upload Content</span></a>
                                        </li>
                                        <li>
                                            <a href="#" class="p3 text-start nav-link text-white btn btn-outline-info px-5"> <span class="d-none d-sm-inline">Create Template</span></a>
                                        </li>
                                   
                                    </ul>
                                </li>
                       
                               
                                <div class="dropdown pb-4">                
                                        <a href="#" class="dropdown d-flex align-items-center text-white  dropdown-toggle text-start nav-link btn btn-outline-dark px-5 align-center" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">                  
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
 


  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="register col-lg-3 col-xl-8">
        <div class="card text-black">
          <div class="card-body p-md-1">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-3 col-xl-5 order-2 order-lg-1">


                <p class="text-center p4 fw-bold mb-5 mx-1 mx-md-4 mt-4">CREATE ACCOUNT</p>


                <form class="mx-1 mx-md-5">


                  <div class="d-flex flex-row align-items-center mb-2">
                 
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="firstname"> <i class="fas fa-user fa-lg me-3 fa-fw"></i>Firstname</label>
                      <input type="text" id="firstname" class="form-control bg-primary-subtle " />                    
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-2">              
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="lastname"> <i class="fas fa-user fa-lg me-3 fa-fw"></i>Lastname</label>
                      <input type="text" id="lastname" class="form-control bg-primary-subtle " />                  
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-2">            
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="email"> <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>Email Address</label>
                      <input type="email" id="email" class="form-control bg-primary-subtle " />                  
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-2">                  
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="username"> <i class="fas fa-lock fa-lg me-3 fa-fw"></i>Username</label>
                      <input type="password" id="username" class="form-control bg-primary-subtle " />
               
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-2">
                   
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="password"> <i class="fas fa-key fa-lg me-3 fa-fw"></i>Password</label>
                      <input type="password" id="password" class="form-control bg-primary-subtle " />
                   
                    </div>
                  </div>
                  <br>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="button" class="btn btn-primary btn-lg">Register</button>
                  </div>
       
                </form>


              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">


              <img src="signup.png" class="rounded mx-auto ms-5 d-block" alt="hugenerd" width="500" height="500">    


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
</div>  




</body>
   
</html>





