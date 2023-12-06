    <!-- <div>
         <nav class="navbar navbar-expand-md shadow-sm" style="background-color: #191970; position:fixed;min-width: 100%;height: 9.7%;float:left;z-index:1">
            <div>
                <img src="{{ asset('assets/image/ceclogo.png')}}" class="container rounded mx-auto d-inline-block " alt="hugenerd" width="60" height="60">
            </div>
                <p class="display-5 text-warning " style=" font-family: arial black;">Beyond the Frame</p>
        </nav>
    </div> -->

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



</style>

 </head>
 
<body>

    <header>

        <div class="left_area">  
            <h3 >BEYOND THE<span> FRAME</span></h3> 
        </div>
        
    </header>

</body>
   
</html>


@else
<script>
    window.location="{{ route('admin-login')}}"
</script>
@endif