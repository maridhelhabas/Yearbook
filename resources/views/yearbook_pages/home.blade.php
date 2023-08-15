<html>
<head>
    <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
 </head>
<body style="background-image: url('{{ asset('apex.bg.png') }}'); background-size: cover; 
 background-repeat: no-repeat; 
 background-position:fixed 
 background-attachment: fixed;">

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            	<img src="">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                    <br><br>
                    <img src="profile.icon.png" class="rounded mx-auto ms-5 d-block" alt="hugenerd" width="100" height="100">
 
                           
                    <br><br>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link text-white btn btn-outline-warning px-5 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline "><h4>Home</h4></span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link text-white btn btn-outline-warning px-5 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline "><h4>Dashboard</h4></span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('registration') }}" class="nav-link  text-white btn btn-outline-warning px-5 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline "><h4>Registration</h4></span></a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('reports') }}" class="nav-link  text-white btn btn-outline-warning px-5 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline"><h4>Reports</h4></span> </a>
                    </li>
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link text-white btn btn-outline-warning px-5 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline"><h4>Yearbook</h4></span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link text-white btn btn-outline-warning px-5"> <span class="d-none d-sm-inline">Upload</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white btn btn-outline-warning px-5"> <span class="d-none d-sm-inline">Design</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white btn btn-outline-warning px-5"> <span class="d-none d-sm-inline">Edit</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white btn btn-outline-warning px-5"> <span class="d-none d-sm-inline">Comment</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="log.png" alt="hugenerd" width="45" height="40" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">ADMIN</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col py-1">
                <p class="lead text-danger text-center mb-5"><h2 class="text-center">Cristal e- College Web-Based Interactive Digital Yearbook using Student ID Access</h2></p>
            
        </div>
    </div>
</div>
</body>

</html>