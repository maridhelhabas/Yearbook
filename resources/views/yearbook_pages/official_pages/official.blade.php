@if(Auth::check())

<html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Yearbook Department</title>
      <link rel="icon" href="{{asset('assets/image/ceclogo.png')}}" type="image/x-icon">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
      <style>

      </style>
  </head>
<body>
  @include('components/nav')
  @include('components/sidebar')
  
   <main class="main-container">
            <div class="col-md-9 mt-5" style="z-index:1;float:left">
                <div class="content" style="margin-left: 15%;margin-top:5%;">

   <div class="content">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-lg-2 col-xl-8 " style="position: fixed; width:85%; height: 100%; margin-top: 50%;margin-left: 250px;margin-right: 10px;">
        <div class="card shadow mt-2"style=" width:100%;" >
          <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h3 class="text-primary">Officials</h3>
            <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#officialsModal" ><i
                class="fa fa-circle-plus"></i> Add Official</button>
          </div>

          <div class="card-body" id="show_all_officials" >
            
            @if (session('success'))
                <div class="alert alert-success fadeout" id="fade">
                    <p class="">{{ session('success') }}</p>
                </div>
            @endif
            <br>
            <div style="">
              <table id="example" class="display hover" style="width:100%">
                <thead>
                    <tr style="">
                        <th style="text-align:center"><i class="fa-sharp fa-solid fa-caret-down"></i></th>
                        <th>Official ID</th>
                        <th>Fullname</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- THIS IS THE MODAL AREA -->

    {{-- add new department modal start --}}
<div class="modal fade " id="officialsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style=" background-color: #DCDCDC;">
      <div class="modal-header" style=" background-color: #DCDCDC;">
        <h5 class="modal-title" id="exampleModalLabel">Add Official</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('official.store') }}" method="POST" id="add_official_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4" style=" background-color: #DCDCDC;">
          <div class="row">
          <div class="my-2">
              <div class="text-center mb-2">
                <img id="image_preview" src="{{ asset('assets/image/ceclogo.png')}}" alt="Image Preview" style="border-radius:150px;max-width: 150px; max-height: 150px;">
              </div>
              <div class="row mb-3">
                <div class="col text-center">
                  <input id="official_image" type="file" style="display: none;" class="form-control @error('official_image') is-invalid @enderror" name="official_image" accept="image/*">
                  <input type="text" id="off_img_fake_input" class="form-control form-control2" placeholder="Select Image" readonly style="display:none">
                  <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('official_image').click();">Select Image</button>
                  @error('official_image')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="my-2">
              <label for="off_id" class="text-dark">{{ __('Official ID') }}<span class="text-danger">*</span></label>
              <input type="number" id="official_id" name="official_id" class="form-control form-control2 @error('official_id') is-invalid @enderror" placeholder="" value="{{ old('official_id') }}" required readonly style="cursor:pointer">
              @error('official_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-lg">
              <label for="official_fullname" class="text-dark">{{ __('Fullname') }}<span class="text-danger">*</span></label>
              <input type="text" name="official_fullname" class="form-control form-control2 @error('official_fullname') is-invalid @enderror" placeholder="Enter Fullname" value="{{ old('official_fullname') }}" required>
              @error('official_fullname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-lg">
              <label for="official_role" class="text-dark">{{ __('Role') }}<span class="text-danger">*</span></label>
              <input type="text" name="official_role" class="form-control form-control2 @error('official_role') is-invalid @enderror" placeholder="Enter Role" value="{{ old('official_role') }}" required>
              @error('official_role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="submit"  class="btn btn-primary d-grip gap-2" style="width: 30%; border-color:white">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new department modal end --}}

{{-- edit batch modal start --}}
<div class="modal fade " id="update_official" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content dash-blade">
      <div class="modal-header dash-blade">
        <h5 class="modal-title" id="exampleModalLabel">Update Official</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('official.update', 'formAction') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        <div class="modal-body dash-blade p-4 bg-light">
            <div class="col-lg">
              <label for="off_id" class="text-dark">{{ __('Official ID') }}<span class="text-danger">*</span></label>
              <input type="number" name="official_id" class="form-control form-control2 @error('off_id') is-invalid @enderror" placeholder="Enter ID" id="off_id">
              @error('off_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="my-2">
              <label for="off_name" class="text-dark">{{ __('Fullname') }}<span class="text-danger">*</span></label>
              <input type="text" name="official_fullname" class="form-control form-control2 @error('off_name') is-invalid @enderror" placeholder="Enter Fullname" id="off_name" required>
              @error('off_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <div class="my-2">
              <label for="off_role" class="text-dark">{{ __('Role') }}<span class="text-danger">*</span></label>
              <input type="text" name="official_role" class="form-control form-control2 @error('off_role') is-invalid @enderror" placeholder="Enter Role" id="off_role" required>
              @error('off_role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        </div>
        <div class="modal-footer">

          <button type="submit"  class="btn btn-primary d-grip gap-2" style="width: 30%; border-color:white">Update Official</button>
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

    return (
        '<dl>' +
        '<dt>Official Image:</dt>' +
        '<dd style="text-align:center">' +
       '<img src="' + 'assets/uploaded/' + d.official_image + '" height="300px" width="300px" />'+
        '</dd>' +
        '</dl>'
    );
}
 
let table = $('#example').DataTable({
    ajax: {
        url: '{{ route('official.fetch_official') }}',
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
        { data: 'official_id' },
        { data: 'official_fullname' },
        { data: 'official_role' },
        

        {
            data: null,
            render: function(data, type, row) {
              var officialId = row.official_id;
              var officialFullname = row.official_fullname;
              var officialRole = row.official_role;
              var officialImage = row.official_image;

                return "<a class='editbtn_staff' data-bs-toggle='modal' data-bs-target='#update_official' data-official-id='" + row.official_id + "' data-official-fullname='" + row.official_fullname + "' data-role='" + row.role + "' data-official-image='" + row.official_image +  "' style='cursor:pointer;border-radius: 4px; color: green;'><i class='fa-solid fa-pen-to-square'></i></a> | <a class='editbtn_official' data-toggle='modal' data-target='#update_official' data-id='" + row.official_id + "' style='cursor:pointer;border-radius: 4px; color: green;'><i class='fa-sharp fa-solid fa-box-archive' style='color: #c8193c;'></i></a>";
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
    $('#example').on('click', '.editbtn_official', function() {
        var officialId = $(this).data('official-id'); // Use data-user-id to access user_id
        var officialFullname = $(this).data('official-fullname');
        var officialRole = $(this).data('official-role');
        var officialImage = $(this).data('official-image');

    //    var formAction = "{{ route('staff.update', '#staff_id') }}".replace('#staff_id', staffId);
    
    // // Log the updated form action
    // console.log("Updated Form Action: " + formAction);

    // // Update the form's action attribute
    // $("#update_staff_form").attr("action", formAction);

    // var formAction = "{{ route('staff.update', ':staff_id') }}".replace(':staff_id', staffId);

    // // Update the form action attribute with the dynamic value
    // document.getElementById('update_staff_form').setAttribute('action', formAction);


     var formAction = "{{ route('official.update', ':official_id') }}".replace(':official_id', officialId);

    // Update the form action attribute with the dynamic value
    // document.getElementById('update_staff_form').setAttribute('action', formAction);

  

    // // // // Update the form's action attribute
    // $("#update_staff_form").attr("action", formAction);

    // Log the updated form action
  

        // Update the hidden input field inside the modal with the clicked ID
        $('#official-id').val(officialId);
        $('#official_fullname').val(officialFullname);
        $('#official_role').val(officialRole);
        $('#official_image').val(officialImage);
        
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
  $(document).ready(function() {
  
      function fetchLastOffID() {
          $.ajax({
              url: '/fetch-last-off-id',
              method: 'GET',
              success: function(data) {
  
                  if (data && data.lastOffId) {
                      $('#official_id').val(data.lastOffId);
                  } else {
                      console.error('Invalid or missing response data.');
                  }
              },
              error: function() {
                  console.error('Failed to fetch the last inserted ID.');
              }
          });
      }
  
  
      $('.btn[data-bs-target="#officialsModal"]').on('click', function() {
  
          fetchLastOffID();
      });
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
    document.getElementById('official_image').addEventListener('change', function () {
        const imagePreview = document.getElementById('image_preview');
        const userImageInput = document.getElementById('official_image');

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

