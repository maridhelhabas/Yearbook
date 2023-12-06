@if(Auth::check())
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Profile</title>
    <link rel="icon" href="{{asset('assets/image/ceclogo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <style>
   
body {
    margin: 0;
    padding: 0;
    font-family: "Roboto", sans-serif;
}

header {
    z-index: 1;
    position: fixed;
    background: #191970;
    padding: 20px;
    width: calc(100% - 0%);
    top: 0;
    height: 70px;
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

.sidebar {
    z-index: 1;
    top: 0;
    background: #2f323a;
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

.sidebar .profile_info .profile_image {
    width: 100px;
    height: 100px;
    border-radius: 100px;
    margin-bottom: 10px;
}

.sidebar .profile_info h4 {
    color: #ccc;
    margin-top: 0;
    margin-bottom: 20px;
}

.sidebar a {
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

.sidebar a:hover {
    background: #19B3D3;
}

.sidebar i {
    padding-right: 10px;
}

label #sidebar_btn {
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

label #sidebar_btn:hover {
    color: #19B3D3;
}

#check:checked~.sidebar {
    left: -185px;
}

#check:checked~.sidebar a span {
    display: none;
}

#check:checked~.sidebar a {
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

#check:checked~.sidebar .profile_info {
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
    .sidebar {
        display: none;
    }

    #sidebar_btn {
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

    .nav_bar {
        background: #222;
        width: (100% - 0px);
        margin-top: 70px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    .nav_bar .mobile_profile_image {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .nav_bar .nav_btn {
        color: #fff;
        font-size: 22px;
        cursor: pointer;
        transition: 0.5s;
        transition-property: color;
    }

    .nav_bar .nav_btn:hover {
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








#bgimage {
    background-image: url('{{ asset('assets/image/bg_graduates.jpg') }}');
    background-size: cover;
    background-position: center;
    text-align: center;
    color: #fff;
    padding: 100px;
    height: 50%;
    margin-top: -10px;
    margin-left:-20px;
    margin-right:-20px;
    font-family: "calibri";
    
  
}

.cta-button {
    display: inline-block;
    background-color:#DAA520;
    color: #fff;
    padding: 15px 30px;
    text-decoration: none;
    font-size: 18px;
    border-radius: 5px;
    transition: background-color 0.3s ease-in-out;
}


#about {
    background-color: #fff;
    padding: 40px 0;
    text-align: center;
    margin-left:-20px;
    margin-right:-20px;
}


#features {
    background-color: #f4f4f4;
    padding: 40px 0;
    text-align: left;
    margin-left:-20px;
    margin-right:-20px;
    
}


footer {
    background-color: #333;
    color: #fff;
    text-align: right;
    padding: 10px 0;
    margin-left:-20px;
    margin-right:-20px;
}

/*Search bar*/

 .custom-search {
      position: relative;
    }

    .custom-search input[type="text"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-sizing: border-box;
      outline-style: solid;
      font-size: 16px; 
      outline-color: #87CEEB;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .custom-search button {
      position: absolute;
      right: 0;
      top: 0;
      padding: 11px 12px;
      border: 1px solid #ccc;
      border-radius: 15px;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
    }

    @media (max-width: 767px) {
      /* Adjust styles for smaller screens */
      .custom-search button {
        position: relative;
        width: 100%;
        margin-top: 8px;
        border-radius: 4px;
      }
    }
  </style>  
 </head>
 
<body>

 
    
 
<input type="checkbox" id="check">
<!--header area start-->
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>BEYOND THE<span> FRAME</span></h3>
        </div>
        
    </header>
<!--header area end-->
<!--mobile navigation bar start-->
<div class="mobile_nav">
    <div class="nav_bar">
        <img src="{{ asset('assets/image/spike cuizon.png')}}" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
        <a href="{{ route('alumni_home') }}" class="text-start align-center"><i class="fa-solid fa-house" style="color: #ffffff;"></i> Home</a>
        <a href="{{ route('chat') }}" class="text-start align-center"><i class="fa-solid fa-comment-dots" style="color: #ffffff;"></i> &nbsp;Chat</a>
        <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
    </div>
</div>
<!--mobile navigation bar end-->
<!--sidebar start-->
<div class="sidebar">
    <div class="profile_info">
        <img src="{{ asset('assets/image/spike cuizon.png')}}" class="profile_image" alt="">
        <h4>Spike Cuizon</h4>
    </div>
        <a href="{{ route('alumni_home') }}" class="text-start align-center"><i class="fa-solid fa-house" style="color: #ffffff;"></i> &nbsp;  Home</a>
        <a href="{{ route('chat') }}" class="text-start align-center"><i class="fa-solid fa-comment-dots" style="color: #ffffff;"></i> &nbsp;  Chat</a>
     
            <div class="dropdown" style="background-color:blue">                
                <a href="#" class="dropdown text-white" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">                 
                    <i class="fa-solid fa-user-gear" style="color: #ffffff;"></i>&nbsp;{{ __(' Settings') }}</a>
                </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('alumniprofile') }}">
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
<!--sidebar end-->

<div class="content">
    <section id="bgimage">
         <div class="container mt-3">

   <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="custom-search">
        <input type="text" placeholder="Search...">
        <button type="button">Search</button>
      </div>
    </div>
  </div>
</div>
        <div class="container"><br>
            <h2>Digital Yearbook</h2>
            <p>Capture memories, Relive Moments and Connect forever</p>
            <!-- <a href="{{ route('contents') }}" class="cta-button">Let's Create</a> -->
        </div>
    </section>

    <section id="about">
        <div class="container">
            <h2></h2>
            <p>These modern yearbooks encapsulate the essence of a memorable year, allowing students, faculty,</p>
             <p>  and alumni to relive their experiences in a more engaging and technologically advanced manner.</p>
        </div>
    </section>

    <section id="features">
        <div class="container">
            <h2>Batch 2023</h2>
            <div class="feature">
                <img src="bshm-1.jpg" alt="bshm">
                <p>Describe your first yearbook here.</p>
            </div>
            <br>
            <div class="feature">
                <img src="bsit" alt="bsit">
                <p>Describe your second yearbook here.</p>
            </div>
            <br>
            <div class="feature">
                <img src="bscrim" alt="bscrim">
                <p>Describe your third yearbook here.</p>
            </div>
            <br>
            <div class="feature">
                <img src="bsmt" alt="bsmt">
                <p>Describe your third yearbook here.</p>
            </div>
            <br>
            <div class="feature">
                <img src="bsmar e" alt="bsmar e">
                <p>Describe your third yearbook here.</p>
            </div>
            <br>
            <div class="feature">
                <img src="bsmt" alt="bsmt">
                <p>Describe your third yearbook here.</p>
            </div>
        </div>
    </section>

    
    <footer>
        <div class="container">
            <p>&copy; 2023 Capstone Project - Computer Studies Department | Cristal e-College</p>
        </div>
    </footer>  
        
           
    </div>
    
    
</div>
            </div>
        </div>
    </div>
</div><br>

            <!-- <h1>PROFILE</h1>
            <hr>
            <h5><b>Password Change</b></h5>
            <p>Please enter your old password, for security's sake, and then enter your new password twice so we can verify you typed it in correctly.</p>
        </div>
    

        <div class="form-floating col-md-5 mb-3" style="margin-left: 24%;">
            <input type="old_pass" class="form-control" placeholder="Enter old password" id="old_pass" required autocomplete="old_pass" autofocus placeholder="Enter Old Password">
            <label for="old_pass">Old Password</label>
        </div>
        <div class="form-floating mb-3 col-md-5" style="margin-left: 24%;">
            <input type="password" id="new_pass" class="form-control @error('new_pass') is-invalid @enderror" name="new_pass" required autocomplete="new-password" placeholder="Enter New Password">
            <label for="new_pass">New Password</label>
        </div>
        <div class="form-floating mb-3 col-md-5" style="margin-left: 24%;">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="confirm-password" placeholder="Confirm Password">
            <label for="password">{{ __('Confirm Password') }}</label>
            <span id="password1" onclick="togglePasswordVisibility()">
                <i class="fas fa-eye" id="eye-icon"></i>
            </span>
        </div>

        <br>

        <div class="row">
            <div class="col-md-5 d-grid gap-2" style="margin-left: 24%;">
                <button type="submit" class="btn btn-primary btn-lg">
                    {{ __('Change Password') }}
                </button>
            </div>
        </div> -->

    </div>

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


@else
<script>
    window.location="{{ route('admin-login')}}"
</script>
@endif