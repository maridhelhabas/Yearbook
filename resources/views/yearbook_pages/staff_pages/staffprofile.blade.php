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


<script>
    // JavaScript to handle image preview
    document.getElementById('user_image').addEventListener('change', function () {
        const imagePreview = document.getElementById('image_preview');
        const userImageInput = document.getElementById('user_image');

        if (userImageInput.files.length > 0) {
            const file = userImageInput.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            // If no image is selected, set the default thumbnail
            imagePreview.src = "{{ asset('assets/image/user_thumbnail.png')}}";
        }
    });
</script>

</body>
   
</html>


@else
<script>
    window.location="{{ route('admin-login')}}"
</script>
@endif