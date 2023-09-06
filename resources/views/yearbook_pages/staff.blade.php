<html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Staff</title>
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
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-lg-2 col-xl-8" style=" position: fixed; height: 50%; margin-top: 550px;margin-left: 250px;margin-right: 10px;">
        <div class="card shadow">
          <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h3 class="text-primary">STAFF</h3>
            <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#addstaffModal"><i
                class="bi-plus-circle me-2"></i>Create Account</button>
          </div>
          <div class="card-body" id="show_all_staff">
            <h1 class="text-center text-secondary my-5">Loading...</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- <script>
      $(function() {

        // add new staff ajax request
        $("#add_staff_form").submit(function(e) {
          e.preventDefault();
          const fd = new FormData(this);
          $("#add_staff_btn").text('Adding...');
          $.ajax({
            url: '{{ route('store') }}',
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
              if (response.status == 200) {
                Swal.fire(
                  'Added!',
                  'Staff Added Successfully!',
                  'success'
                )
                fetchAllStaff();
                }
              $("#add_staff_btn").text('Add Staff');
              $("#add_staff_form")[0].reset();
              $("#addyearbookModal").modal('hide');
            }
          });
        });

        // edit staff ajax request
        $(document).on('click', '.editIcon', function(e) {
          e.preventDefault();
          let id = $(this).attr('id');
          $.ajax({
            url: '{{ route('edit') }}',
            method: 'get',
            data: {
              id: id,
              _token: '{{ csrf_token() }}'
            },
            success: function(response) {
              $("#fname").val(response.first_name);
              $("#lname").val(response.last_name);
              $("#phone_number").val(response.phone);
              $("#email_address").val(response.email);         
              $("#password").val(response.password);
              $("#profile").html(
                `<img src="storage/images/${response.profile}" width="100" class="img-fluid img-thumbnail">`);
              $("#yearbook_id").val(response.id);
              $("#yearbook_profile").val(response.profile);
            }
            });
        });

        // update staff ajax request
        $("#edit_staff_form").submit(function(e) {
          e.preventDefault();
          const fd = new FormData(this);
          $("#edit_staff_btn").text('Updating...');
          $.ajax({
            url: '{{ route('update') }}',
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
              if (response.status == 200) {
                Swal.fire(
                  'Updated!',
                  'Staff Updated Successfully!',
                  'success'
                )
                fetchAllStaff();
              }
              $("#edit_staff_btn").text('Update Staff');
              $("#edit_staff_form")[0].reset();
              $("#editstaffModal").modal('hide');
            }
          });
          });

        // delete staff ajax request
        $(document).on('click', '.deleteIcon', function(e) {
          e.preventDefault();
          let id = $(this).attr('id');
          let csrf = '{{ csrf_token() }}';
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: '{{ route('delete') }}',
                method: 'delete',
                data: {
                  id: id,
                  _token: csrf
                },
                success: function(response) {
                  console.log(response);
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                  fetchAllStaff();
                }
              });
            }
          })
        });

        // fetch all staff ajax request
        fetchAllStaff();

        function fetchAllStaff() {
          $.ajax({
            url: '{{ route('fetchAll') }}',
            method: 'get',
            success: function(response) {
              $("#show_all_staff").html(response);
              $("table").DataTable({
                order: [0, 'desc']
              });
            }
          });
        }
      });
    </script>  -->
   
</body>
   
</html>



<!-- THIS IS THE MODAL AREA -->

    {{-- add new employee modal start --}}
<div class="modal fade" id="addstaffModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_staff_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="fname">First Name</label>
              <input type="text" name="fname" class="form-control" placeholder="firstname" required>
            </div>
            <div class="col-lg">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" class="form-control" placeholder="lastname" required>
            </div>
          </div>
          <div class="my-2">
            <label for="phone">Phone Number</label>
            <input type="tel" name="phone_number" class="form-control" placeholder="phone number" required>
          </div>
          <div class="my-2">
            <label for="email">Email Address</label>
            <input type="email" name="email_address" class="form-control" placeholder="email" required>
          </div>
      
          <div class="my-2">
            <label for="post">Password</label>
            <input type="password" name="password" class="form-control" placeholder="password" required>
          </div>
          <div class="my-2">
            <label for="profile">Select Profile</label>
            <input type="file" name="profile" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_staff_btn" class="btn btn-primary">Add Staff</button>
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