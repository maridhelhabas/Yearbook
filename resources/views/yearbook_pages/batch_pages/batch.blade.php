@if(Auth::check())

<html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Yearbook Batchs</title>
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
    
     <main class="main-container">
            <div class="col-md-9 mt-5" style="z-index:1;float:left">
                <div class="content" style="margin-left: 15%;margin-top:5%;">
                
    <div class="content">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-2 col-xl-8" style=" position: fixed; width:85%; height: 50%; margin-top: 28%;margin-left: 250px;margin-right: 10px;">
          <div class="card shadow mt-2" >
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
              <h3 class="text-primary">Registration / Batch</h3>
              <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#addbatchModal" ><i
                  class="fa fa-circle-plus"></i> Create Batch</button>
            </div>

            <div class="card-body" id="show_all_staff" >
              
              @if (session('success'))
                  <div class="alert alert-success fadeout" id="fade">
                      <p class="">{{ session('success') }}</p>
                  </div>
              @endif
              <br>
              <div>
                    <table id="example" class="display hover">
                        <thead>
                            <tr>
                                <th style="text-align:center"><i class="fa-sharp fa-solid fa-caret-down"></i></th>
                                <td>Batch ID</td>
                                <th>Batch Year</th>
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

    {{-- add new template modal start --}}
<div class="modal fade " id="addbatchModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style=" background-color: #DCDCDC;">
      <div class="modal-header" style=" background-color: #DCDCDC;">
        <h5 class="modal-title" id="exampleModalLabel">New Batch</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('batch.store') }}" method="POST" id="add_staff_form">
        @csrf
        <div class="modal-body p-4" style=" background-color: #DCDCDC;">
          <div class="row">
            <div class="my-2">
              <label for="batch_id" class="text-dark">{{ __('Batch ID') }}</label>
              <input type="number" name="batch_id" class="form-control form-control2 @error('batch_id') is-invalid @enderror" placeholder="" id="batch_id" readonly>
              @error('batch_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-lg">
                <label for="batch_year" class="text-dark">{{ __('Batch Year') }}<span class="text-danger">*</span></label>
                <input type="number" name="batch_year" class="form-control form-control2 @error('batch_year') is-invalid @enderror" placeholder="Enter Batch Year" required value="{{ old('batch_year') }}" autofocus  min="1" >
                @error('batch_year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-primary d-grip gap-2" style="width: 30%; border-color:white">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new batch modal end --}}

{{-- edit batch modal start --}}
<div class="modal fade" id="editbtn_batch" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content dash-blade">
            <div class="modal-header dash-blade">
                <h5 class="modal-title" id="exampleModalLabel">Edit Batch Year</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('batch.update', ':batch_id') }}" method="POST" enctype="multipart/form-data" id="batch-update-form">
                @csrf
                @method('PUT')
                <div class="modal-body dash-blade p-4 bg-light">
                    <div class="col-lg">
                        <label for="batch_id" class="text-dark">{{ __('Batch ID') }}</label>
                        <input type="number" name="batch_id" class="form-control form-control2" placeholder="Enter Batch ID" id="id" disabled>
                    </div>
                    <div class="my-2">
                        <label for="batch_year" class="text-dark">{{ __('Batch Year') }}<span class="text-danger">*</span></label>
                        <input type="number" name="batch_year" class="form-control form-control2 @error('batch_year') is-invalid @enderror" placeholder="Enter Batch Year" id="batch_year" required autofocus>
                        @error('batch_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary d-grip gap-2" style="width: 30%; border-color:white">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- edit batch modal end --}}


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
// s
 
let table = $('#example').DataTable({
    ajax: {
        url: '{{ route('batch.fetch_batch') }}',
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
        { data: 'id'},
        { data: 'batch_year' },
        {
            data: null,
            render: function(data, type, row) {
              var batchID = row.id;
              var batch_year = row.batch_year;

                return "<a class='editbtn_batch' data-bs-toggle='modal' data-bs-target='#editbtn_batch' data-batch-id='" + row.id + "' data-batch-year='" + row.batch_year + "' style='cursor:pointer;border-radius: 4px; color: green;'><i class='fa-solid fa-pen-to-square'></i></a>";
            }
        }


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
    $('#example').on('click', '.editbtn_batch', function() {
        var batchID = $(this).data('batch-id');
        var batchYear = $(this).data('batch-year');
        var formAction = $('#batch-update-form').attr('action');
        
        // Replace the ':batch_id' placeholder in the form action
        formAction = formAction.replace(':batch_id', batchID);
        
        // Set the updated form action
        $('#batch-update-form').attr('action', formAction);
        
        // Populate the input fields
        $('#id').val(batchID);
        $('#batch_year').val(batchYear);
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

    function fetchLastBatchID() {
        $.ajax({
            url: '/fetch-last-batch-id',
            method: 'GET',
            success: function(data) {

                if (data && data.lastBatchId) {
                    $('#batch_id').val(data.lastBatchId);
                } else {
                    console.error('Invalid or missing response data.');
                }
            },
            error: function() {
                console.error('Failed to fetch the last inserted ID.');
            }
        });
    }


    $('.btn[data-bs-target="#addbatchModal"]').on('click', function() {

        fetchLastBatchID();
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

</body>
   
</html>

    @else
    <script>
         window.location="{{ route('admin-login')}}"
    </script>
    @endif


