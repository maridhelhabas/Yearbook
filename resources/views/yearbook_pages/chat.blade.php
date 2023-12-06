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
   

  </style>  
 </head>
 
<body>

        @include('components/nav')
        @include('components/sidebar')
    
<div class="container" >
    <div class="row justify-content-center mt-1">
        <div class="col-lg-2 col-xl-8 " style=" position: fixed; width:50%; height: 50%; margin-top: 8%;margin-left: 250px;margin-right: 10px; ">
           
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
</div>


        
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