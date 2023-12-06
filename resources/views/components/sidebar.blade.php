@vite(['resources/sass/app.scss', 'resources/js/app.js'])


                            <!-- ADMIN SIDEBAR -->
                            @if ($isAdmin)
                             <div class="container-fluid">
        <div class="row flex-nowrap ">
            <div class="sidebar mx-auto mt-5" style="background-color:#191970; position: fixed; height: 100vh; width: 22vh;">
                <div class="d-flex flex-column align-items-center mx-auto   align-items-sm-start pt-2 text-white mt-5 min-vh-100">
                    <div class=" text-left d-flex align-items-center mb-md-0 me-md-auto text-white text-decoration-none">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center ms-1 me-1 pl-5" id="menu">
                            <li class="mx-auto justify-content-center align-items-center mt-2">
                           
                                @php
                                    $user = auth()->user();
                                @endphp


                                @if (auth()->check() && $isAdmin && $user->user_image)
                                    <img src="{{ asset('assets/image/ceclogo.png')}}" alt="Admin Picture" class="rounded-circle mx-auto ms-2 d-block" width="100" height="100">
                                @elseif (auth()->check() && $isStaff && $user->user_image)
                                    <img src="{{ asset('assets/image/ceclogo.png')}}" alt="Staff Picture" class="rounded-circle mx-auto ms-2 d-block" width="100" height="100">
                                @else
                                    <img src="{{ asset('assets/uploaded_image/' . $user->user_image) }}" alt="User Picture" class="rounded-circle mx-auto ms-2 d-block" width="100" height="100">
                                @endif




                            </li>


                            <div class="col mx-auto d-flex justify-content-center align-items-center mt-3">
                                @if ($isAdmin)
                                <span >Welcome <span class="text-warning font-weight-bold text-decoration-underline">{{$user->role }}</span></span>
                                @elseif ($isStaff)
                                <span >Welcome <span class="text-warning font-weight-bold text-decoration-underline">{{$user->role }}</span></span>
                                @else
                                <span >Welcome <span class="text-warning font-weight-bold text-decoration-underline">{{$user->role }}</span></span>
                                @endif
                            </div>
                          
                            <div class="px-3">
                                <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}" id="dashboard">
                                    <a href="{{ route('dashboard') }}" class="text-start nav-link text-white btn btn-outline-warning  align-center"><i class="fa-solid fa-chart-area" style="color: #ffffff;"></i> Dashboard</a>
                                </li>
                                <hr>

                                <li id="toggleTitle"  class=" text-white btn nav-link btn-outline-warning text-start dropdown-toggle" ><i class="fa-solid fa-address-card"></i> &nbsp;Register </li>
                                    <li class=" projects  {{ request()->is('registration*') ? 'active' : '' }} projectsClass" id="registration"><a href="{{ route('staff.index') }}" class=" p3 text-start nav-link text-white btn btn-outline-info px-2 "><i class="fa-sharp fa-solid fa-users"></i> Staff</a></li>
                                    <li class="projects projectsClass"><a href="{{ route('alumni.index') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-2"><i class="fa-sharp fa-solid fa-users"></i> Alumni</a></li>
                                    <li class="projects projectsClass"><a href="{{ route('batch.index') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-2"><i class="fa-solid fa-medal"></i> Year Batch</a></li>
                                    <li class="projects projectsClass"><a href="{{ route('department.index') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-2"><i class="fa-solid fa-house-user"></i></i> Department</a></li>
                                    <li class="projects projectsClass"><a href="{{ route('program.index') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-2"><i class="fa-solid fa-house-user"></i></i> Program</a></li>

                                    <!-- <li class="projects projectsClass"><a href="{{ route('batch.index') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-4"> &nbsp; Batch</a></li>
                                    <li class="projects projectsClass"><a href="{{ route('department.index') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-4">&nbsp;Department</a></li> -->

                                <hr>
                                <li class="nav-item {{ request()->is('message*') ? 'active' : '' }}" id="message">
                                    <a href="{{ route('message.index') }}" class="text-start nav-link text-white btn btn-outline-warning  align-center"><i class="fa-solid fa-message" style="color: #ffffff;"></i> Messages</a>
                                </li>
                                <hr>
                                <li class="nav-item {{ request()->is('official*') ? 'active' : '' }}" id="official">
                                    <a href="{{ route('official.index') }}" class="text-start nav-link text-white btn btn-outline-warning  align-center"><i class="fa-solid fa-users" style="color: #ffffff;"></i> Officials</a>
                                </li>
                                <hr>
                
                                

                                <!-- <li class="nav-item {{ request()->is('yearbook*') ? 'active' : '' }}" id="yearbook" > -->
                                    <li id="toggleTitle2"  class=" text-white btn nav-link btn-outline-warning text-start dropdown-toggle" ><i class="fa-solid fa-address-card"></i> &nbsp;&nbsp; Alumni </li>
                                        <!-- <li id="toggleTitle2" class="text-white btn nav-link btn-outline-warning text-start dropdown-toggle"><i class="fa-solid fa-book-open-reader" style="color: #ffffff;"></i> &nbsp;Yearbook &nbsp;</li> -->
                                        <li class=" project2 projectsClass2"><a href="{{ route('alumni.add.form-attribute') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-2"><i class="fa-sharp fa-solid fa-file-circle-plus"></i> Form Attribute</a></li>
                                        <li class=" project2 projectsClass2"><a href="{{ route('memories') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-2"><i class="fa-solid fa-images" style="color: #ffffff;"></i> Department Memories</a></li>
                                        <li class=" project2 projectsClass2"><a href="{{ route('gradshots.index') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-2"><i class="fa-solid fa-images" style="color: #ffffff;"></i>Graduation Shots</a></li>
                                          
                                       <!-- <li class=" project2 projectsClass2"><a href="" class="p3 text-start nav-link text-white btn btn-outline-info px-2"><i class="fa-sharp fa-solid fa-file-circle-plus"></i> View Form</a></li> -->
                                <!-- </li> -->
                                <hr>
                                <li class="nav-item {{ request()->is('records*') ? 'active' : '' }}" id="records">
                                    <a href="{{ route('records') }}" class="text-start nav-link text-white btn btn-outline-warning align-center"><i class="fa-regular fa-file-lines" style="color: #ffffff;"></i> &nbsp; Records</a>
                                </li>
                                <hr>
                                <li class=" nav-item">
                                    <div class="dropdown">                
                                            <a href="#" class="dropdown text-white  d-flex align-items-center dropdown-toggle text-start nav-link btn btn-outline-dark px-3 align-center" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">                 
                                            <i class="fa-solid fa-user-gear" style="color: #ffffff;"></i>&nbsp;{{ __(' Settings') }}</a>
                                            </a>
                                            <hr>          
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                        <a class="dropdown-item" href="{{ route('chat') }}">
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
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
                        
                        @elseif ($isStaff )
                     <input type="checkbox" id="check">
                                        <!--header area start-->
                                            <header>
                                                <label for="check">
                                                    <i class="fas fa-bars" id="sidebars_btn"></i>
                                                </label>
                                                <div class="left_area">
                                                    <h3>BEYOND THE<span> FRAME</span></h3>
                                                </div>
                                                
                                            </header>
                                        <!--header area end-->
                                        <!--mobile navigation bar start-->
                                            <div class="mobile_nav">
                                                <div class="nav_bars">
                                                    <img src="{{ asset('assets/image/spike cuizon.png')}}" class="mobile_profile_image" alt="">
                                                    <i class="fa fa-bars nav_btn"></i>
                                                </div>
                                                <div class="mobile_nav_items">
                                                    <a href="{{ route('staff_home') }}" class="text-start nav-link text-white"><i class="fa-solid fa-house" style="color: #ffffff;"></i> &nbsp; Home</a>
                                                    <a href="{{ route('contents') }}" class="text-start nav-link text-whit"><i class="fa-solid fa-book-open-reader" style="color: #ffffff;"></i> &nbsp;&nbsp;Yearbook</a>
                                                    <a href="{{ route('reports') }}" class="text-start nav-link text-white"><i class="fa-regular fa-file-lines" style="color: #ffffff;"></i> &nbsp;&nbsp; Reports</a>
                                                    <a href="{{ route('staffprofile') }}" class="text-start align-center"><i class="fa-solid fa-user-large" style="color: #ffffff;"></i> &nbsp; Profile</a>

                                                   
                                                </div>
                                            </div>
                                            <!--mobile navigation bar end-->
                                            <!--sidebar start-->
                                            <div class="sidebars">
                                                <div class="profile_info">
                                                    <img src="{{ asset('assets/image/spike cuizon.png')}}" class="profile_image" alt="">
                                                     <span class="font-weight-bold text-white">{{ Auth::user()->first_name }}<span class="font-weight-bold text-white">&nbsp; {{ Auth::user()->last_name }}</span></span>
                                                </div>
                                                <br>
                                     
                                                            <a href="{{ route('staff_home') }}" class="text-start nav-link text-white"><i class="fa-solid fa-house" style="color: #ffffff;"></i> &nbsp; Home</a>
                                                            <a href="{{ route('contents') }}" class="text-start nav-link text-white"><i class="fa-solid fa-book-open-reader" style="color: #ffffff;"></i> &nbsp;&nbsp;Yearbook</a>
                                                            <a href="{{ route('reports') }}" class="text-start nav-link text-white"><i class="fa-regular fa-file-lines" style="color: #ffffff;"></i> &nbsp;&nbsp; Reports</a>
                                                            <a href="{{ route('staffprofile') }}" class="text-start align-center"><i class="fa-solid fa-user-large" style="color: #ffffff;"></i> &nbsp; Profile</a>
     
                                                        <div class="logout" style="background-color:blue;">                
                                                            <a class="logout" href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                                                <i class="fa-solid fa-right-from-bracket fa-lg" style="color: #ffffff;"></i></i> &nbsp;  {{ __(' Logout') }}
                                                            </a>

                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                               
                                                
                                            </div>
                                            </div>
                                            <!--sidebar end-->
                              



                        <!-- <div class="container-fluid">
                            <div class="row flex-nowrap ">
                                <div class="sidebar mx-auto mt-5" style="background-color:#191970; position: fixed; height: 100vh; width: 22vh;">
                                    <div class="d-flex flex-column align-items-center mx-auto   align-items-sm-start pt-2 text-white mt-5 min-vh-100">
                                        <div class=" text-left d-flex align-items-center mb-md-0 me-md-auto text-white text-decoration-none">
                                            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center ms-1 me-1 pl-5" id="menu">
                                                <li class="mx-auto justify-content-center align-items-center mt-2">
                                                    @php
                                                        $user = auth()->user();
                                                    @endphp


                                                    @if (auth()->check() && $isAdmin && $user->user_image)
                                                        <img src="{{ asset('assets/image/ceclogo.png')}}" alt="Admin Picture" class="rounded-circle mx-auto ms-2 d-block" width="100" height="100">
                                                    @elseif (auth()->check() && $isStaff && $user->user_image)
                                                        <img src="{{ asset('assets/image/ceclogo.png')}}" value="{{ Auth::user()->first_name }}" alt="Staff Picture" class="rounded-circle mx-auto ms-2 d-block" width="100" height="100">
                                                    @else
                                                        <img src="{{ asset('assets/uploaded_image/' . $user->user_image) }}" alt="User Picture" class="rounded-circle mx-auto ms-2 d-block" width="100" height="100">
                                                    @endif
                                                </li>
                                                <div class="col mx-auto d-flex justify-content-center align-items-center mt-3">
                                                    @if ($isAdmin)
                                                     <span >{{ Auth::user()->first_name }}<span class="font-weight-bold ">&nbsp; {{ Auth::user()->last_name }}</span></span>
                                                    @elseif ($isStaff)
                                                    <span >{{ Auth::user()->first_name }}<span class="font-weight-bold ">&nbsp; {{ Auth::user()->last_name }}</span></span>
                                                    @else
                                                     <span >{{ Auth::user()->first_name }}<span class="font-weight-bold ">&nbsp; {{ Auth::user()->last_name }}</span></span>
                                                    @endif
                                                </div>
                                                    <li class="nav-item " id="yearbook\" >
                                                        <li class=" project2 projectsClass2"><a href="{{ route('template.view') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-4"><i class="fa-solid fa-user-group"></i> &nbsp;Edit Content</a></li>
                                                           
                                                   
                                                             <br>                                                                                                   
                                                        <li class="nav-item {{ request()->is('staff_home*') ? 'active' : '' }}" id="staff_home">
                                                            <a href="{{ route('staff_home') }}" class="text-start nav-link text-white btn btn-outline-warning align-center"><i class="fa-solid fa-house" style="color: #ffffff;"></i> &nbsp;Home</a>
                                                        </li>
                                                        <hr>
                                                        <li class="nav-item {{ request()->is('yearbook*') ? 'active' : '' }}" id="contents">
                                                            <a href="{{ route('contents') }}" class="text-start nav-link text-white btn btn-outline-warning align-center"><i class="fa-solid fa-book-open-reader" style="color: #ffffff;"></i> &nbsp;Yearbook</a>
                                                        </li>
                                                        <hr>
                                                        <li class="nav-item {{ request()->is('reports*') ? 'active' : '' }}" id="reports">
                                                            <a href="{{ route('reports') }}" class="text-start nav-link text-white btn btn-outline-warning align-center"><i class="fa-regular fa-file-lines" style="color: #ffffff;"></i> &nbsp;Reports</a>
                                                        </li>
                                                        <hr>                                              
                                                        <li class=" nav-item">
                                                            <div class="dropdown">                
                                                                <a href="#" class="dropdown text-white  d-flex align-items-center dropdown-toggle text-start nav-link btn btn-outline-dark px-3 align-center" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">                 
                                                                    <i class="fa-solid fa-user-gear" style="color: #ffffff;"></i>&nbsp;{{ __(' Settings') }}</a>
                                                                </a>
                                                                <hr>          
                                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                                    <a class="dropdown-item" href="{{ route('staffprofile') }}">
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
                                                        </li>
                                               
                                            </ul>                                               
                                        </div>  
                                    </div>
                                </div>
                            </div>     -->
                                    
                            
                            @else
            
                            <input type="checkbox" id="check">
                            <!--header area start-->
                                <header>
                                    <label for="check">
                                        <i class="fas fa-bars" id="sidebars_btn"></i>
                                    </label>
                                    <div class="left_area">
                                        <h3>BEYOND THE<span> FRAME</span></h3>
                                    </div>
                                </header>
                            <!--header area end-->
                            <!--mobile navigation bar start-->
                                <div class="mobile_nav">
                                    <div class="nav_bars">
                                        <img src="{{ asset('assets/image/spike cuizon.png')}}" class="mobile_profile_image" alt="">
                                        <i class="fa fa-bars nav_btn"></i>
                                    </div>
                                    <div class="mobile_nav_items">
                                        <a href="{{ route('alumni_home') }}" class="text-start align-center"><i class="fa-solid fa-house" style="color: #ffffff;"></i> Home</a>
                                        <a href="{{ route('alumniprofile') }}" class="text-start align-center"><i class="fa-solid fa-comment-dots" style="color: #ffffff;"></i> &nbsp;Profile</a>
                                    
                                    </div>
                                </div>
                                <!--mobile navigation bar end-->
                                <!--sidebar start-->
                                <div class="sidebars">
                                    <div class="profile_info">
                                        <img src="{{ asset('assets/image/spike cuizon.png')}}" class="profile_image" alt="">
                                            <span class="font-weight-bold text-white">{{ Auth::user()->first_name }}<span class="font-weight-bold text-white">&nbsp;{{ Auth::user()->last_name }}</span></span>
                                    </div>
                                    <br>
                                        <a href="{{ route('alumni_home') }}" class="text-start align-center"><i class="fa-solid fa-house" style="color: #ffffff;"></i> &nbsp;  Home</a>
                                        <a href="{{ route('alumniprofile') }}" class="text-start align-center"><i class="fa-solid fa-user-large fa-lg" style="color: #ffffff;"></i> &nbsp;  Profile</a>

                                            <div class="logout" style="background-color:blue;">                
                                                <a class="logout " href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    <i class="fa-solid fa-right-from-bracket fa-lg" style="color: #ffffff;"></i></i> &nbsp;  {{ __(' Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    
                                    
                                </div>
                                </div>
                                <!--sidebar end-->
                    
                    
                            @endif
     </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <style>
   
body {
    margin: 0;
    padding: 0;
    font-family: "Roboto", sans-serif;
}

header {
    z-index: 1;
    position: fixed;
    background:#000080;
    padding: 20px;
    width: calc(100% - 0%);
    top: 0;
    height: 70px;
    opacity:25px;
}

.left_area h3 {
    color: #fff;
    margin: 0;
    text-transform: uppercase;
    font-size: 22px;
    font-weight: 900;
}

.left_area span {
    color: #19B3D3;
}

.logout_btn {
    padding: 5px;
    background: #19B3D3;
    text-decoration: none;
    float: right;
    margin-top: -30px;
    margin-right: 40px;
    border-radius: 2px;
    font-size: 15px;
    font-weight: 600;
    color: #fff;
    transition: 0.5s;
    transition-property: background;
}

.logout_btn:hover {
    background: #0B87A6;
}

.sidebars {
    z-index: 1;
    top: 0;
    background-image: linear-gradient(180deg, #000080, black );
    margin-top: 70px;
    padding-top: 30px;
    position: fixed;
    left: 0;
    width: 250px;
    height: 100%;
    transition: 0.5s;
    transition-property: left;
    overflow-y: auto;
}

.profile_info {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.sidebars .profile_info .profile_image {
    width: 100px;
    height: 100px;
    border-radius: 100px;
    margin-bottom: 10px;
}

.sidebars .profile_info h4 {
    color: #ccc;
    margin-top: 0;
    margin-bottom: 20px;
}

.sidebars a {
    color: #fff;
    display: block;
    width: 100%;
    line-height: 60px;
    text-decoration: none;
    padding-left: 40px;
    box-sizing: border-box;
    transition: 0.5s;
    transition-property: background;
}

.sidebars a:hover {
    background: #19B3D3;
}

.sidebars i {
    padding-right: 10px;
}

label #sidebars_btn {
    z-index: 1;
    color: #fff;
    position: fixed;
    cursor: pointer;
    left: 300px;
    font-size: 20px;
    margin: 5px 0;
    transition: 0.5s;
    transition-property: color;
}

label #sidebars_btn:hover {
    color: #19B3D3;
}

#check:checked~.sidebars {
    left: -185px;
}

#check:checked~.sidebars a span {
    display: none;
}

#check:checked~.sidebars a {
    font-size: 20px;
    margin-left: 165px;
    width: 100%;
}

.content {
    width: (100% - 250px);
    margin-top: 60px;
    padding: 20px;
    margin-left: 250px;
    background: url(background.png) no-repeat;
    background-position: center;
    background-size: cover;
    height: 100vh;
    transition: 0.5s;
}

#check:checked~.content {
    margin-left: 60px;
}

#check:checked~.sidebars .profile_info {
    display: none;
}

#check {
    display: none;
}

.mobile_nav {
    display: none;
}

.content .card p {
    background: #fff;
    padding: 15px;
    margin-bottom: 10px;
    font-size: 14px;
    opacity: 0.8;
}

/* Responsive CSS */

@media screen and (max-width: 780px) {
    .sidebars {
        display: none;
    }

    #sidebars_btn {
        display: none;
    }

    .content {
        margin-left: 0;
        margin-top: 0;
        padding: 10px 20px;
        transition: 0s;
    }

    #check:checked~.content {
        margin-left: 0;
    }

    .mobile_nav {
        display: block;
        width: calc(100% - 0%);
    }

    .nav_bars {
        background: #222;
        width: (100% - 0px);
        margin-top: 70px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    .nav_bars .mobile_profile_image {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .nav_bars .nav_btn {
        color: #fff;
        font-size: 22px;
        cursor: pointer;
        transition: 0.5s;
        transition-property: color;
    }

    .nav_bars .nav_btn:hover {
        color: #19B3D3;
    }

    .mobile_nav_items {
        background: #2F323A;
        display: none;
    }

    .mobile_nav_items a {
        color: #fff;
        display: block;
        text-align: center;
        letter-spacing: 1px;
        line-height: 60px;
        text-decoration: none;
        box-sizing: border-box;
        transition: 0.5s;
        transition-property: background;
    }

    .mobile_nav_items a:hover {
        background: #19B3D3;
    }

    .mobile_nav_items i {
        padding-right: 10px;
    }

    .active {
        display: block;
    }
}


  </style>  



    <script>
        //toggleProjects
        var toggleProjects = function(){

        //function
        var projectsList=document.getElementsByClassName('projects');
        // if(projectsList[0].style.display=='none'){
        if(!projectsList[0].classList.contains('projectsClass')){
            //reappear
            for(var i=0; i<projectsList.length; i++){
            // projectsList[i].style.display='';
            projectsList[i].classList.add('projectsClass');
            }

        } else {
            //disappear
            for(var i=0; i<projectsList.length; i++){
            // projectsList[i].style.display='none';
            projectsList[i].classList.remove('projectsClass');
            }

        }
        };

        //event listener for click
        document.getElementById('toggleTitle').addEventListener('click', toggleProjects);


        var toggleProjects2 = function(){

        //function
        var projectsLists=document.getElementsByClassName('project2');
        // if(projectsList[0].style.display=='none'){
        if(!projectsLists[0].classList.contains('projectsClass2')){
            //reappear
            for(var i=0; i<projectsLists.length; i++){
            // projectsList[i].style.display='';
            projectsLists[i].classList.add('projectsClass2');
            }

        } else {
            //disappear
            for(var i=0; i<projectsLists.length; i++){
            // projectsList[i].style.display='none';
            projectsLists[i].classList.remove('projectsClass2');
            }

        }
        };

        //event listener for click
        document.getElementById('toggleTitle2').addEventListener('click', toggleProjects2);

        
    </script>

    <script>
        // Function to handle navigation item clicks
            function handleNavigationItemClick(event) {
                // Remove the 'active' class from all navigation items
                const navItems = document.querySelectorAll('.nav-item', 'projects');
                navItems.forEach((item) => {
                    item.classList.remove('active');
                });

                // Add the 'active' class to the clicked navigation item
                event.currentTarget.classList.add('active');
            }

            // Add click event listeners to the navigation items
            const dashboard = document.getElementById('dashboard');
            const registration = document.getElementById('registration');
            const reports = document.getElementById('reports');
            const yearbook= document.getElementById('yearbook');

            dashboard.addEventListener('click', handleNavigationItemClick);
            registration.addEventListener('click', handleNavigationItemClick);
            reports.addEventListener('click', handleNavigationItemClick);
            yearbook.addEventListener('click', handleNavigationItemClick);
    </script>

