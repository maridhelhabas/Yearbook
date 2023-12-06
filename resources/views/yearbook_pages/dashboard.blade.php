@if(Auth::check())
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <link rel="icon" href="{{asset('assets/image/ceclogo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
 
    <style>
.main-container {
  grid-area: main;
  overflow-y: auto;
  padding: 40px 40px;
  
}


.main-cards {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  gap: 20px;
  margin: 50px 0;

}

.card {
  width: 350px;
  flex-direction: column;
  justify-content: space-around;
  padding: 40px;
  background-color: #ffffff;
  box-sizing: border-box;
  border: 1px solid #d2d2d3;
  border-radius: 5px;
  box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
 
}

.card:first-child {
  border-left: 7px solid #246dec;
}

.card:nth-child(2) {
  border-left: 7px solid #f5b74f;
}

.card:nth-child(3) {
  border-left: 7px solid #367952;
}

.card:nth-child(4) {
  border-left: 7px solid #cc3c43;
}

.card > span {
  font-size: 20px;
  font-weight: 600;
}

.card-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.card-inner > p {
  font-size: 18px;
}

.card-inner > span {
  font-size: 35px;
}



/*Search bar*/


.search-container {
    text-align: left;
    margin-top: 20px;
    background-color: transparent;
}

.search-container input[type="text"] {
    width: 500px;
    padding: 8px;
    border: none;
    border-radius: 0;
    outline-style: solid;
    outline-color: black;
    margin-left: 1%;
    margin-top: -2%;
    font-size: 16px;  
    background-color: rgba(255, 255, 255, 0.3); 
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   
    
}

.search-container button {
    background-color: transparent;
    border: none;
    color: orange;
    cursor: pointer;
    padding: 10px;
    margin-left: -50px;

}

.search-container button i {
    font-size: 18px;
}

.search-container button:hover {
    background-color:#6495ED; 
}
::placeholder {
  color: black;
  
}


    </style>
 </head>
 
<body>

        @include('components/nav')
        @include('components/sidebar')
  <main class="main-container">
            <div class="col-md-9 mt-5" style="z-index:1;float:left">
                <div class="content" style="margin-left: 22%;margin-top:5%;">
            
<div class="search-container">
                <form action="search.php" method="GET">
                    <input type="text" name="search" class="text-black" placeholder="Search...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
   <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-dark">ALUMNI</p>
              <span><i class="fa-solid fa-users" style="color: #005eff;"></i></span>
            </div>
            <span class="text-black font-weight-bold">249</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-dark">STAFF</p>
              <span><i class="fa-solid fa-user" style="color: #ff8800;"></i></span>
            </div>
            <span class="text-black font-weight-bold">83</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-dark">YEARBOOK</p>
              <span><i class="fa-regular fa-folder-open" style="color: #076105;"></i></i></span>
            </div>
            <span class="text-black font-weight-bold">79</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-dark">NOTIFICATION</p>
              <span><i class="fa-regular fa-bell" style="color: #e80202;"></i></span>
            </div>
            <span class="text-black font-weight-bold">56</span>
          </div>

        </div>
        
    </div>
        </div>
    </div>
    
</body>
   
</html>


@else
<script>
    window.location="{{ route('admin-login')}}"
</script>
@endif  