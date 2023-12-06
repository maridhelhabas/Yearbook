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





.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
  </style>  
 </head>
 
<body>

    @include('components/nav')
    @include('components/sidebar')
      
  <div class="container rounded bg-white mt-6 mb-5" style="margin-top:10%;margin-right:9%; box-shadow: 0px 15px 15px lightblue;">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"> <span class="font-weight-bold text-black">{{ Auth::user()->first_name }}
                <span class="font-weight-bold text-black">&nbsp; {{ Auth::user()->last_name }}</span></span></span><span class="text-black-50">&nbsp; {{ Auth::user()->email }}</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Firstname</label><input type="text" class="form-control" placeholder="firstname" value="{{ Auth::user()->first_name }}"><br></div>
                    <div class="col-md-12"><label class="labels">Lastname</label><input type="text" class="form-control" placeholder="lastname"  value="{{ Auth::user()->last_name }}"><br></div>
                    <div class="col-md-12"><label class="labels">Email Address</label><input type="text" class="form-control" placeholder="email address" value="{{ Auth::user()->email }}"><br></div>
                    <div class="col-md-12"><label class="labels">Phone Number</label><input type="text" class="form-control" placeholder="phone number" value="{{ Auth::user()->phone_number }}"><br></div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span><h4>Change Password</h4></span></div><br>
                <div class="col-md-12"><label class="labels">Please enter your old password, for security's sake, and then enter your new password twice so we can verify you typed it in correctly.</label></div><br>
                <div class="col-md-12"><label class="labels">Old Password</label><input type="text" class="form-control" placeholder="Enter old password" value=""></div><br>
                <div class="col-md-12"><label class="labels">New Password</label><input type="text" class="form-control" placeholder="Enter new password" value=""></div><br>
                <div class="col-md-12"><label class="labels">Confirm Password</label><input type="text" class="form-control" placeholder="Confrim Password" value=""></div><br>
            </div>
              <div class="mt-5 text-center"><button class="btn btn-primary" type="button">Save Profile</button></div><br><br>
        </div>
    </div>
  </div>




<!-- <div class="container" >
    <div class="row justify-content-center mt-1">
        <div class="col-lg-2 col-xl-8 " style="position: absolute; width:50%; height: 50%; margin-top: 15%;margin-left: 250px;margin-right: 10px; ">
           
<div class="border-primary card mt-2"> <br>      
    <div class="row">
      <div class="col-md-3">
        <div class="text-center mt-3" style="margin-left:100px;">
            <img id="image_preview2" src="{{ asset('assets/image/user_thumbnail.png')}}" alt="Image Preview" style="border-radius:150px;max-width: 150px; max-height: 150px;">
            <br><br>
            <input type="file" name="profImage">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
      </div>
      <div class="col-md-7 mt-3" style="margin-left:150px">
        <h3>Personal info</h3>
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name</label>
            <div class="col-lg-8">
              <input class="form-control" name="first_name" type="text"  value="{{ Auth::user()->first_name }}">
            </div>
          </div><br>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name</label>
            <div class="col-lg-8">
              <input class="form-control" name="last_name" type="text"  value="{{ Auth::user()->last_name }}">
            </div>
          </div><br>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email Address</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="text" value="{{ Auth::user()->email }}" >
            </div>
          </div><br> 
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone Number</label>
            <div class="col-lg-8">
              <input class="form-control" name="phone_number" type="text" value="{{ Auth::user()->phone_number }}">
            </div>
          </div><br><br>
          <div class="form-group mb-3">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
              <span></span>
            <a href="{{ route('alumnichangepass') }}"><input type="button" class="btn btn-danger" value="Change Password">
            </div><br>
          </div>
        </form>
    </div>
  </div>
</div> -->


        
        <!-- <div class="border-primary card mt-2"> <br>
                <h2 class="p1 text-primary font-weight-bolder card-title mx-auto mt-1"><b>Staff Profile<b></h2>
                    <div class="text-center mb-2">
                    <img id="image_preview2" src="{{ asset('assets/image/user_thumbnail.png')}}" alt="Image Preview" style="border-radius:150px;max-width: 150px; max-height: 150px;">
                </div>
                    <br>
                <div class="card-body mb-3 mt-2">
                    <div class="form-group mt-4">
                    <div class="row">
                        <div class="col">
                            <label for="firstname" class="text-dark">{{ __('Firstname') }}</label>
                            <input  id="firstname" type="text" class="form-control" placeholder="firstname" value="{{ Auth::user()->first_name }}" style="cursor:pointer" />
                        </div>
                        <div class="col">
                            <label for="lastname" class="text-dark">{{ __('Lastname') }}</label>
                            <input  id="lastname" type="text" class="form-control" placeholder="lastname" value="{{ Auth::user()->last_name }}"/>
                        </div>
                
                        <div><br>
                            <label for="phone_number" class="text-dark">{{ __('Phone Number') }}</label>
                            <input  id="phone_number" type="text" class="form-control" placeholder="phone number" value="{{ Auth::user()->phone_number }}" />
                        <br>
                        <div>
                            <label for="email" class="text-dark">{{ __('Email Address/Username') }}</label>
                            <input  id="email" type="text" class="form-control" placeholder="email" value="{{ Auth::user()->email }}" />
                        </div>
            </div>
        </div>
<br><br>
            <div class="button-container">
                <button type="submit" class="btn btn-primary" style=" margin-left: 65%;">Save Changes</button>
                <a href="{{ route('staffchangepass') }}" class="change-password btn btn-danger">Change Password</a>
            </div>
                

                    
    
                    </form>
                </div>
            </div> -->
        </div>
    </div>
</div><br>


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