@if(Auth::check())

<html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Yearbook Content</title>
      <link rel="icon" href="{{asset('assets/image/ceclogo.png')}}" type="image/x-icon">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  </head>
<body>
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
              <h3 class="text-primary">Student Data</h3>
              <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#adddepartmentModal"><i
                  class="fa fa-circle-plus"></i> Add Student Data</button>
            </div>

            <div class="card-body" id="show_all_department">
              
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
                            <th>Full Name</th>
                            <th>Birthdate</th>
                            <th>Department</th>
                            <th>Batch</th>
                            <th>Address</th>
                            <th>Parents Name</th>
                            <th>Motto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- THIS IS THE MODAL AREA -->

    {{-- add new department modal start --}}
<div class="modal fade " id="adddepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content dash-blade">
      <div class="modal-header dash-blade">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('yearbookcontent.store') }}" method="POST" id="add_department_form">
        @csrf
        <div class="modal-body dash-blade p-4 bg-light">
          <div class="row">
            <!-- <div class="my-2">
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
            </div> -->
            <div class="my-2">
              <label for="fullname" class="text-dark">{{ __('Fullname') }}<span class="text-danger">*</span></label>
              <input type="text" name="fullname" class="form-control form-control2 @error('fullname') is-invalid @enderror" placeholder="Enter Fullname" value="{{ old('fullname') }}" required>
              @error('fullname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
             <!-- <div class="col-lg" style="display:none">
              <label for="roler" class="text-dark">{{ __('Role') }}<span class="text-danger">*</span></label>
              <input type="text" name="role" class="form-control form-control2 @error('role') is-invalid @enderror" placeholder="role" value="Admin" required>
              @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div> -->
            <div class="col-lg">
              <label for="birthdate" class="text-dark">{{ __('Birthdate') }}<span class="text-danger">*</span></label>
              <input type="date" name="birthdate" class="form-control form-control2 @error('birthdate') is-invalid @enderror" placeholder="Birthdate" value="{{ old('birthdate') }}" required>
              @error('birthdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="my-2">
              <label for="department_name" class="text-dark">{{ __('Department') }}<span class="text-danger">*</span></label>
              <input type="text" name="department_name" class="form-control form-control2 @error('department_name') is-invalid @enderror" placeholder="Enter Department" value="{{ old('department_name') }}" required>
              @error('department_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="my-2">
              <label for="class_year" class="text-dark">{{ __('Batch') }}<span class="text-danger">*</span></label>
              <input type="number" name="class_year" class="form-control form-control2 @error('class_year') is-invalid @enderror" placeholder="Enter Batch" value="{{ old('class_year') }}" required>
              @error('class_year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="my-2">
              <label for="address" class="text-dark">{{ __('Address') }}<span class="text-danger">*</span></label>
              <input type="text" name="address" class="form-control form-control2 @error('address') is-invalid @enderror" placeholder="Enter Address" value="{{ old('address') }}" required>
              @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="my-2">
              <label for="parents_name" class="text-dark">{{ __('Parents Name') }}<span class="text-danger">*</span></label>
              <input type="text" name="parents_name" class="form-control form-control2 @error('parents_name') is-invalid @enderror" placeholder="Enter Parents Name" value="{{ old('parents_name') }}" required>
              @error('parents_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="my-2">
              <label for="motto" class="text-dark">{{ __('Motto') }}<span class="text-danger">*</span></label>
              <input type="text" name="motto" class="form-control form-control2 @error('motto') is-invalid @enderror" placeholder="Enter Motto" value="{{ old('motto') }}" required>
              @error('motto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="submit"  class="btn btn-primary d-grip gap-2" style="width: 30%; border-color:white">Add Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new department modal end --}}

{{-- edit batch modal start --}}
<div class="modal fade " id="update_department" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content dash-blade">
      <div class="modal-header dash-blade">
        <h5 class="modal-title" id="exampleModalLabel">Update Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('yearbookcontent.update', 'formAction') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        <div class="modal-body dash-blade p-4 bg-light">
            <div class="my-2">
              <label for="fullname" class="text-dark">{{ __('Fullname') }}<span class="text-danger">*</span></label>
              <input type="text" name="fullname" class="form-control form-control2 @error('fullname') is-invalid @enderror" placeholder="Enter Fullname" id="fullname"  required>
              @error('fullname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="my-2">
              <label for="birthdate" class="text-dark">{{ __('Birthdate') }}<span class="text-danger">*</span></label>
              <input type="date" name="birthdate" class="form-control form-control2 @error('birthdate') is-invalid @enderror" placeholder="Enter Birthdate" id="birthdate" required>
              @error('birthdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="my-2">
              <label for="address" class="text-dark">{{ __('Address') }}<span class="text-danger">*</span></label>
              <input type="text" name="address" class="form-control form-control2 @error('address') is-invalid @enderror" placeholder="Enter Address" id="address" required>
              @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="my-2">
              <label for="parents_name" class="text-dark">{{ __('Parents Name') }}<span class="text-danger">*</span></label>
              <input type="text" name="parents_name" class="form-control form-control2 @error('parents_name') is-invalid @enderror" placeholder="Enter Parents Name" id="parents_name" required>
              @error('parents_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="my-2">
              <label for="motto" class="text-dark">{{ __('Motto') }}<span class="text-danger">*</span></label>
              <input type="text" name="motto" class="form-control form-control2 @error('motto') is-invalid @enderror" placeholder="Enter Motto" id="motto" required>
              @error('motto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

             <!-- <div class="col-lg" style="display:none">
              <label for="roler" class="text-dark">{{ __('Role') }}<span class="text-danger">*</span></label>
              <input type="text" name="role" class="form-control form-control2 @error('role') is-invalid @enderror" placeholder="role" value="Admin" required>
              @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div> -->

          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="submit"  class="btn btn-primary d-grip gap-2" style="width: 30%; border-color:white">Add Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit department modal end --}}

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
        url: '{{ route('content.fetch_content') }}',
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
        { data: 'fullname' },
        { data: 'birthdate' },
        { data: 'department_name' },
        { data: 'class_year' },
        { data: 'address' },
        { data: 'parents_name' },
        { data: 'motto' },
        
        // {
        //     data: 'password',
        //     render: function(data, type, row) {
        //         if (type === 'display') {
        //             // Display asterisks to mask the password
        //             return '**********';
        //         }
        //         return data; // Return the actual password for other types (e.g., sorting, filtering)
        //     }
        // },

        // {
        //     data: 'id',
        //     render: function(data, type, row) {
        //         return "<button class='edit-staff-btn' data-id='" + data + "' data-target='#update_staff'>Edit</button>";
        //     }
        // }
        {
            data: null,
            render: function(data, type, row) {
              var contentFullName = row.fullname;
              var contentBirthdate = row.birthdate;
              var contentDepartmentName = row.department_name;
              var contentClassYear = row.class_year;
              var contentAddress = row.address;
              var contentParentsName = row.parents_name;
              var contentMotto = row.motto;
              return "<a class='editbtn_staff' data-bs-toggle='modal' data-bs-target='#update_staff' data-fullname='" + row.fullname + "' data-birthdate='" + row.birthdate + "' data-address='" + row.address + "' data-parents-name='" + row.parents_name + "' data-department-name='" + row.department_name + "' data-class-year='" + row.class_year + "' data-motto='" + row.motto + "' style='cursor:pointer;border-radius: 4px; color: green;'><i class='fa-solid fa-pen-to-square'></i></a> | <a class='editbtn_staff' data-toggle='modal' data-target='#update_staff' data-id='" + row.user_id + "' style='cursor:pointer;border-radius: 4px; color: green;'><i class='fa-sharp fa-solid fa-box-archive' style='color: #c8193c;'></i></a>";
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
      var contentFullName = $(this).data('fullname'); // Use data-user-id to access user_id
        var contentBirthdate = $(this).data('birthdate');
        var contentDepartmentName = $(this).data('department-name');
        var contentClassYear = $(this).data('class-year');
        var contentAddress = $(this).data('address');
        var contentParentsName = $(this).data('parents-name'); // Use data-user-id to access user_id
        var contentMotto = $(this).data('motto');

    //    var formAction = "{{ route('staff.update', '#staff_id') }}".replace('#staff_id', staffId);
    
    // // Log the updated form action
    // console.log("Updated Form Action: " + formAction);

    // // Update the form's action attribute
    // $("#update_staff_form").attr("action", formAction);

    // var formAction = "{{ route('staff.update', ':staff_id') }}".replace(':staff_id', staffId);

    // // Update the form action attribute with the dynamic value
    // document.getElementById('update_staff_form').setAttribute('action', formAction);


    //  var formAction = "{{ route('department.update', ':department_id') }}".replace(':department_id', departmentId);

    // Update the form action attribute with the dynamic value
    // document.getElementById('update_staff_form').setAttribute('action', formAction);

  

    // // // // Update the form's action attribute
    // $("#update_staff_form").attr("action", formAction);

    // Log the updated form action
  

        // Update the hidden input field inside the modal with the clicked ID
        $('#content_fullname').val(contentFullName);
        $('#content_birthdate').val(contentBirthdate);
        $('#content_address').val(contentAddress);
        $('#content_parents_name').val(contentParentsName);
        $('#content_class-year').val(contentClassYear);
        $('#staff_motto').val(contentMotto);
        
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
<!-- <script>
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
<script src="{{ asset('assets/js/imagePreview.js') }}"></script> -->

</body>
   
</html>

    @else
    <script>
         window.location="{{ route('admin-login')}}"
    </script>
    @endif


