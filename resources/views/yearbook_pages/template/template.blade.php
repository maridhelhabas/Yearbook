@if(Auth::check())

<html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Yearbook Template</title>
      <link rel="icon" href="{{asset('assets/image/ceclogo.png')}}" type="image/x-icon">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
          <div class="card shadow mt-2">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
              <h3 class="text-primary">Template</h3>
              <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#addstaffModal"><i
                  class="fa fa-circle-plus"></i> Add Template</button>
            </div>

            <div class="card-body" id="show_all_staff">
              
              @if (session('success'))
                  <div class="alert alert-success fadeout" id="fade">
                      <p class="">{{ session('success') }}</p>
                  </div>
              @endif
              <br>
              <div class="container">
                  <table id="example" class="display hover" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align:center"><i class="fa-sharp fa-solid fa-caret-down"></i></th>
                            <th>Template ID</th>
                            <th>Template Name</th>
                            <th>Template Status</th>
                            <th>Template Usage</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Template ID</th>
                            <th>Template Name</th>
                            <th>Template Status</th>
                            <th>Template Usage</th>
                        </tr>
                    </tfoot>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- THIS IS THE MODAL AREA -->

    {{-- add new template modal start --}}
<div class="modal fade " id="addstaffModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content dash-blade">
      <div class="modal-header dash-blade">
        <h5 class="modal-title" id="exampleModalLabel">Add Template</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('staff.store') }}" method="POST" id="add_staff_form" enctype="multipart/form-data">
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
            <div class="my-2">
              <label for="temp_name" class="text-dark">{{ __('Template Name') }}<span class="text-danger">*</span></label>
              <input type="text" name="temp_name" class="form-control form-control2 @error('temp_name') is-invalid @enderror" placeholder="name" value="{{ old('temp_name') }}" required>
              @error('temp_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
             <div class="col-lg" style="display:none">
              <label for="roler" class="text-dark">{{ __('Role') }}<span class="text-danger">*</span></label>
              <input type="text" name="role" class="form-control form-control2 @error('role') is-invalid @enderror" placeholder="role" value="Admin" required>
              @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-lg">
              <label for="temp_status" class="text-dark">{{ __('Template Status') }}<span class="text-danger">*</span></label>
              <input type="text" name="temp_status" class="form-control form-control2 @error('temp_status') is-invalid @enderror" placeholder="status" value="{{ old('temp_status') }}" required>
              @error('temp_status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="my-2">
            <label for="temp_usage" class="text-dark">{{ __('Template Usage') }} <span class="text-danger">*</span></label>
            <input type="text"  name="temp_usage" class="form-control form-control2 @error('temp_usage') is-invalid @enderror" placeholder="usage" required>
            @error('temp_usage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="submit"  class="btn btn-primary d-grip gap-2" style="width: 30%; border-color:white">Add Template</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new template modal end --}}

{{-- edit template modal start --}}
<div class="modal fade " id="update_template" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content dash-blade">
      <div class="modal-header dash-blade">
        <h5 class="modal-title" id="exampleModalLabel">Update template</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('staff.update', 'formAction') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        <div class="modal-body dash-blade p-4 bg-light">
          <div class="row">
            <div class="my-2">
                <div class="text-center mb-2">
                    <img id="image_preview2" src="{{ asset('assets/image/user_thumbnail.png')}}" alt="Image Preview" style="border-radius:150px;max-width: 150px; max-height: 150px;">
                </div>
             
                <div class="row mb-3">
                    <div class="col text-center">
                            <input id="user_image2" type="file" style="display: none;" class="form-control @error('user_image2') is-invalid @enderror" name="user_image" accept="image/*">
                            <input type="text" id="user_image_fake_input" class="form-control form-control2" placeholder="Select Image" readonly style="display:none">
                            <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('user_image2').click();">Upload Image</button>
                        @error('user_image2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
              </div>
            </div>
            <div class="col-lg">
              <label for="temp_id" class="text-dark">{{ __('Template ID') }}<span class="text-danger">*</span></label>
              <input type="number" name="temp_id" class="form-control form-control2 @error('user_id') is-invalid @enderror" placeholder="temp_id" id="temp_id"  required>
              @error('temp_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="my-2">
              <label for="temp_name" class="text-dark">{{ __('Template Name') }}<span class="text-danger">*</span></label>
              <input type="text" name="temp_name" class="form-control form-control2 @error('temp_name') is-invalid @enderror" placeholder="name" id="temp_name" required>
              @error('temp_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
             <div class="col-lg" style="display:none">
              <label for="roler" class="text-dark">{{ __('Role') }}<span class="text-danger">*</span></label>
              <input type="text" name="role" class="form-control form-control2 @error('role') is-invalid @enderror" placeholder="role" value="Admin" required>
              @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="my-2">
              <label for="temp_status" class="text-dark">{{ __('Template Status') }}<span class="text-danger">*</span></label>
              <input type="text" name="temp_status" class="form-control form-control2 @error('temp_status') is-invalid @enderror" placeholder="status" id="status" required>
              @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-lg">
              <label for="temp_usage" class="text-dark">{{ __('Template Usage') }}<span class="text-danger">*</span></label>
              <input type="text" name="temp_usage" class="form-control form-control2 @error('temp_usage') is-invalid @enderror" placeholder="usage" id="temp_usage" required>
              @error('temp_usage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
      
          <div class="my-2 position-relative">
            <label for="password" class="text-dark">{{ __('Password') }} <span class="text-danger">*</span></label>
            <div class="d-flex align-items-center">
                <input type="password" id="staff_password" class="form-control form-control2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password" id="staff_password">
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
{{-- edit staff modal end --}}

<script>
setTimeout(function() {
    var fadeElement = document.getElementById('fade');
    if (fadeElement) {
        fadeElement.parentNode.removeChild(fadeElement);
    }
}, 2000);
</script>

<script src="{{ asset('assets/js/jquery-3.7.0.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

<script>
  function format(d) {
    // `d` is the original data object for the row
    return (
        '<dl>' +
        '<dt>User Image:</dt>' +
        '<dd>' +
        + d.first_name + 
        '</dd>' +
        // '<dt>Extension number:</dt>' +
        // '<dd>' +
        // d.extn +
        // '</dd>' +
        // '<dt>Extra info:</dt>' +
        // '<dd>And any further details here (images etc)...</dd>' +
        '</dl>'
    );
}
 
let table = $('#example').DataTable({
    ajax: {
        url: '{{ route('staff.fetch_staff') }}',
        method: 'GET',
        dataSrc: '', // This is used to indicate that the data is at the root level of the JSON response
    },
    columns: [
        {
            className: 'dt-control',
            orderable: false,
            data: null,
            defaultContent: ''
        },
        { data: 'temp_id' },
        { data: 'temp_name' },
        { data: 'temp_status' },
        { data: 'temp_usage' },
        {
            data: 'password',
            render: function(data, type, row) {
                if (type === 'display') {
                    // Display asterisks to mask the password
                    return '**********';
                }
                return data; // Return the actual password for other types (e.g., sorting, filtering)
            }
        },

        // {
        //     data: 'id',
        //     render: function(data, type, row) {
        //         return "<button class='edit-staff-btn' data-id='" + data + "' data-target='#update_staff'>Edit</button>";
        //     }
        // }
        {
            data: null,
            render: function(data, type, row) {
              var staffId = row.user_id;
              var staffFirstName = row.first_name;
              var staffLastName = row.last_name;
              var staffEmail = row.email;
              var staffPhoneNo = row.phone_number;
              var staffPassword = row.password;
                return "<a class='editbtn_staff' data-bs-toggle='modal' data-bs-target='#update_staff' data-user-id='" + row.user_id + "' data-first-name='" + row.first_name + "' data-last-name='" + row.last_name + "' data-email='" + row.email + "' data-phone-no='" + row.phone_number + "' data-password='" + row.password + "' style='cursor:pointer;border-radius: 4px; color: green;'><i class='fa-solid fa-pen-to-square'></i></a> | <a class='editbtn_staff' data-toggle='modal' data-target='#update_staff' data-id='" + row.user_id + "' style='cursor:pointer;border-radius: 4px; color: green;'><i class='fa-sharp fa-solid fa-box-archive' style='color: #c8193c;'></i></a>";
            }
        }
        // { data: function (data) {
        //         return "<a class='editbtn_staff' data-bs-toggle='modal'data-id='" + data + "' data-bs-target='#update_staff' style='cursor:pointer;border-radius: 4px; color: green;'><i class='fa-solid fa-pen-to-square'></i></a> | <a class='editbtn_staff' data-toggle='modal' data-target='#update_staff' style='cursor:pointer;border-radius: 4px; color: green;'><i class='fa-sharp fa-solid fa-box-archive' style='color: #c8193c;'></i></i>";
        //     }
        // }

    ],
    order: [[1, 'asc']],
    scrollY: '300px', // Set the desired height for the scrollable area
    paging: true, 
    // Your success and error handlers should be defined within the ajax configuration
success: function(data) {
        // Handle the data returned from the server
        console.log(data);
    },
    error: function(error) {
        // Handle any errors
        console.error(error);
    }
});

$(document).ready(function() {
    $('#example').on('click', '.editbtn_staff', function() {
        var staffId = $(this).data('user-id'); // Use data-user-id to access user_id
        var staffFirstName = $(this).data('first-name');
        var staffLastName = $(this).data('last-name');
        var staffEmail = $(this).data('email'); // Use data-user-id to access user_id
        var staffPhoneNo = $(this).data('phone-no');
        var staffPassword = $(this).data('password');

    //    var formAction = "{{ route('staff.update', '#staff_id') }}".replace('#staff_id', staffId);
    
    // // Log the updated form action
    // console.log("Updated Form Action: " + formAction);

    // // Update the form's action attribute
    // $("#update_staff_form").attr("action", formAction);

    // var formAction = "{{ route('staff.update', ':staff_id') }}".replace(':staff_id', staffId);

    // // Update the form action attribute with the dynamic value
    // document.getElementById('update_staff_form').setAttribute('action', formAction);


     var formAction = "{{ route('staff.update', ':staff_id') }}".replace(':staff_id', staffId);

    // Update the form action attribute with the dynamic value
    // document.getElementById('update_staff_form').setAttribute('action', formAction);

  

    // // // // Update the form's action attribute
    // $("#update_staff_form").attr("action", formAction);

    // Log the updated form action
  

        // Update the hidden input field inside the modal with the clicked ID
        $('#staff_id').val(staffId);
        $('#staff_first_name').val(staffFirstName);
        $('#staff_last_name').val(staffLastName);
        $('#staff_email').val(staffEmail);
        $('#staff_phone_no').val(staffPhoneNo);
        $('#staff_password').val(staffPassword);
        
        console.log("Updated Form Action: " + formAction);
        // Open the modal using its data-bs-target attribute
        $($(this).data('bs-target')).modal('show');
    });
});

table.on('click', 'td.dt-control', function (e) {
    let tr = e.target.closest('tr');
    let row = table.row(tr);
 
    if (row.child.isShown()) {
        // This row is already open - close it
        row.child.hide();
    }
    else {
        // Open this row
        row.child(format(row.data())).show();
    }
});
</script>



    <script>
        // Wait for the document to be fully loaded
        document.addEventListener("DOMContentLoaded", function() {
            // Get a reference to the success alert
            var successAlert = document.getElementById("success-alert");

            // Hide the alert after 3 seconds
            setTimeout(function() {
                successAlert.style.transition = "opacity 1s";
                successAlert.style.opacity = "0";
            }, 3000); // 3000 milliseconds (3 seconds)
        });
    </script>
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


