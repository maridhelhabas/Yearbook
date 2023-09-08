@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@if(Auth::check())
<div class="container-fluid">
        <div class="row flex-nowrap ">
            <div class="sidebar mx-auto  bg-primary mt-5" style="position: fixed; height: 100vh; width: 29vh;">
                <div class="d-flex flex-column align-items-center mx-auto   align-items-sm-start pt-2 text-white mt-5 min-vh-100">
                    <div class=" text-left d-flex align-items-center mb-md-0 me-md-auto text-white text-decoration-none">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center ms-1 me-1 pl-2" id="menu">
                            <li class="mx-auto justify-content-center align-items-center mt-2">
                            
                                @php
                                    $user = auth()->user();
                                @endphp

                                @if (auth()->check() && $isAdmin && $user->user_image)
                                    <img src="{{ asset('assets/uploaded_image/' . $user->user_image) }}" alt="Admin Picture" class="rounded-circle mx-auto ms-2 d-block" width="100" height="100">
                                @elseif ($isStaff && $user->user_image)
                                    <img src="{{ asset('assets/uploaded_image/' . $user->user_image) }}" alt="Staff Picture" class="rounded-circle mx-auto ms-2 d-block" width="100" height="100">
                                @endif


                            </li>

                            <div class="col mx-auto d-flex justify-content-center align-items-center mt-3">
                                @if ($isAdmin)
                                <span >Welcome <span class="text-warning font-weight-bold text-decoration-underline">{{$user->role }}</span></span>
                                @elseif ($isStaff)
                                <span >Welcome <span class="text-warning font-weight-bold text-decoration-underline">{{$user->role }}</span></span>
                                @endif
                            </div>
                            <br>

                            <div class="px-3">
                                <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}" id="dashboard">
                                    <a href="{{ route('dashboard') }}" class="text-start nav-link text-white btn btn-outline-warning  align-center"><i class="fa-solid fa-chart-area" style="color: #ffffff;"></i> Dashboard</a>
                                </li>
                                <hr>

                                    <li id="toggleTitle"  class=" text-white btn nav-link btn-outline-warning text-start dropdown-toggle" ><i class="fa-solid fa-address-card"></i> &nbsp;Registration </li>
                                    <li class=" projects  {{ request()->is('registration*') ? 'active' : '' }} projectsClass" id="registration"><a href="{{ route('staff') }}" class=" p3 text-start nav-link text-white btn btn-outline-info px-4 "><i class="fa-solid fa-user-group"></i> &nbsp;Staff</a></li>
                                    <li class="projects projectsClass"><a href="{{ route('alumni') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-4"><i class="fa-solid fa-user-group"></i> &nbsp; Alumnus</a></li>
                           

                                <hr>
                                <!-- <li class="nav-item {{ request()->is('yearbook*') ? 'active' : '' }}" id="yearbook">
                                        <li id="toggleTitle2" class="text-white btn nav-link btn-outline-warning text-start"><i class="fa-solid fa-address-card"></i> &nbsp;Yearbook &nbsp;</li>
                                        <li class=" project2 projectsClass2"><a href="{{ route('template') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-4"><i class="fa-solid fa-user-group"></i> &nbsp;Templates</a></li>
                                </li> -->
                                <li class="nav-item {{ request()->is('yearbook*') ? 'active' : '' }}" id="yearbook" >
                                        <li id="toggleTitle2" class="text-white btn nav-link btn-outline-warning text-start dropdown-toggle"><i class="fa-solid fa-address-card"></i> &nbsp;Yearbook &nbsp;</li>
                                        <li class=" project2 projectsClass2"><a href="{{ route('template') }}" class="p3 text-start nav-link text-white btn btn-outline-info px-4"><i class="fa-solid fa-user-group"></i> &nbsp;Templates</a></li>
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
</li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



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

    @else
    <script>
        window.location="{{ route('admin-login')}}"
    </script>
    @endif