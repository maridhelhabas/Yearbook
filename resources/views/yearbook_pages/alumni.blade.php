@if(Auth::check())
<html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Yearbook Alumni</title>
      <link rel="icon" href="{{asset('assets/image/ceclogo.png')}}" type="image/x-icon">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  </head>
<body class="dash-blade">
    @include('components/nav')
    @include('components/sidebar')
    
    <div class="col-md-2 mt-2" style="z-index:1;margin:left;">
        <div class="content" style="margin-left: 25%;margin-top:50%;">
        </div>
    </div>

    <div class="content">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-2 col-xl-8" style=" position: fixed; width:80%; height: 50%; margin-top: 28%;margin-left: 250px;margin-right: 10px;">
          <div class="card shadow">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
              <h3 class="text-primary">Registration/Alumni</h3>
              <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#addstaffModal"><i
                  class="fa fa-circle-plus"></i> Create Account</button>
            </div>

            <div class="card-body" id="show_all_staff">
              @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <br>
              <h1 class="text-center text-secondary my-5">Loading...</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- THIS IS THE MODAL AREA -->

    {{-- add new employee modal start --}}
<div class="modal fade " id="addstaffModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content dash-blade">
      <div class="modal-header dash-blade">
        <h5 class="modal-title" id="exampleModalLabel">Add Alumni</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('register') }}" method="POST" id="add_staff_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body dash-blade p-4 bg-light">
          <div class="row">
            <div class="my-2">
                <div class="text-center mb-2">
                    <img id="image_preview" src="{{ asset('assets/image/user_thumbnail.png')}}" alt="Image Preview" style="border-radius:150px;max-width: 150px; max-height: 150px;">
                </div>
             
                <div class="row mb-3">
                    <div class="col text-center">
                            <input id="user_image" type="file" style="display: none;" class="form-control @error('user_image') is-invalid @enderror" name="user_image" accept="image/*">
                            <input type="text" id="user_image_fake_input" class="form-control form-control2" placeholder="Select Image" readonly style="display:none">
                            <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('user_image').click();">Upload Image</button>
                        @error('user_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
              </div>
            </div>
            <div class="col-lg">
              <label for="first_name" class="text-dark">{{ __('First Name') }}<span class="text-danger">*</span></label>
              <input type="text" name="first_name" class="form-control form-control2 @error('first_name') is-invalid @enderror" placeholder="firstname" value="{{ old('first_name') }}" required>
              @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="col-lg" style="display:none">
              <label for="roler" class="text-dark">{{ __('Role') }}<span class="text-danger">*</span></label>
              <input type="text" name="role" class="form-control form-control2 @error('role') is-invalid @enderror" placeholder="role" value="Staff" required>
              @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-lg">
              <label for="last_name" class="text-dark">{{ __('Last Name') }}<span class="text-danger">*</span></label>
              <input type="text" name="last_name" class="form-control form-control2 @error('last_name') is-invalid @enderror" placeholder="lastname" value="{{ old('last_name') }}" required>
              @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="my-2">
            <label for="phone_number" class="text-dark">{{ __('Phone Number') }} <span class="text-danger">*</span></label>
            <input type="number"  name="phone_number" class="form-control form-control2 @error('phone_number') is-invalid @enderror" placeholder="phone number" required>
            @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <div class="my-2">
            <label for="email" class="text-dark">{{ __('Email Address') }} <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control form-control2" placeholder="email" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
      
          <div class="my-2 position-relative">
            <label for="password" class="text-dark">{{ __('Password') }} <span class="text-danger">*</span></label>
            <div class="d-flex align-items-center">
                <input type="password" id="password" class="form-control form-control2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                <span id="password1" class="position-absolute end-0 top translate-middle-y" style="margin-top:25px;margin-right:10px"><i class="fas fa-eye" id="eye-icon"></i></span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="submit"  class="btn btn-primary d-grip gap-2" style="width: 30%; border-color:white">Add Staff</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new staff modal end --}}

{{-- edit staff modal start --}}
<div class="modal fade" id="editstaffModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_staff_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="yearbook_id" id="yearbook_id">
        <input type="hidden" name="yearbook_profile" id="yearbook_profile">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="fname">First Name</label>
              <input type="text" name="fname" id="fname" class="form-control" placeholder="firstname" required>
            </div>
            <div class="col-lg">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" id="lname" class="form-control" placeholder="lastname" required>
            </div>
          </div>
           <div class="my-2">
            <label for="phone">Phone Number</label>
            <input type="tel" name="phone_number" id="phone_number" class="form-control" placeholder="phone number" required>
          </div>
          <div class="my-2">
            <label for="email">Email Address</label>
            <input type="email" name="email_address" id="email_address" class="form-control" placeholder="email address" required>
          </div>
      
          <div class="my-2">
            <label for="post">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
          </div>
          <div class="my-2">
            <label for="profile">Select Profile</label>
            <input type="file" name="profile" class="form-control">
          </div>
          <div class="mt-2" id="profile">
             </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_staff_btn" class="btn btn-success">Update Staff</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit staff modal end --}}
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
<script src="{{ asset('assets/js/passwordshowandhide.js') }}"></script>
<script src="{{ asset('assets/js/imagePreview.js') }}"></script>

</body>
   
</html>

    @else
    <script>
         window.location="{{ route('admin-login')}}"
    </script>
    @endif

