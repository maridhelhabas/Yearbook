@if(Auth::check())
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Yearbook Content</title>
    
    <link rel="icon" href="{{asset('assets/image/ceclogo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
<style>
    body{
        font-family: 'Vinas Sans Regular';
    }

     h1 {
            text-align: center;
        }

        button {
            display: block;
            margin: 20px auto;
        }

        #pagesList {
            width: 80%;
            margin: 0 auto;
        }

        .page {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #F0F8FF;
            position: relative;
        }

      
        .page textarea {
            width: 100%;
            height: 530px;
            margin-bottom: 10px;
            padding-left: 349px;
            background-position: 30px 30px; 
            background-repeat: no-repeat;
           
        }
        .page input[type="file"] {
            display: none;
        }

        .image-upload {
            padding: 20px;
            cursor: pointer;
            text-align: center;
        }

        .image-preview {
            display: flex;
            flex-wrap: wrap;
        }

        .image-preview img {
            width: 300px;
            height: 350px;
            margin: 10px;
            margin-top: -45%;
            margin-left: 20px;
            
        }

        .delete-button {
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .upload-button {
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .default_alumni_size:hover{
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }

</style>

 </head>
 
<body>
    @include('components/nav')
    @include('components/sidebar')
    
    <div class="col-md-9 mt-5" style="z-index:1;float:right">
        <div class="content" style="margin-left: -13%;margin-top:2.3%;"> 
            <nav class="navbar navbar-expand-md bg-light shadow-sm" style="position: fixed; min-width: 100%; margin-top: -30px; float: left; z-index: 1">
                <div class="d-flex justify-content-end">
                    <ul class="navbar-nav" style="float:left;">
                        
                        <div class="col">
                            <label for="search" style="margin-left:8px;display: inline-block; width: 65px; text-align: right;pading: 10px;line-height:36px" class="text-dark">Search:&nbsp;&nbsp;</label>
                        </div>
                        <div class="col-">
                            <input type="search" class="form-control text-dark border-1 border border-solid border-black" id="search" style="width:300px"/>
                        </div>

                        
                    </ul>
                        <ul class="navbar-nav" style="float:right; margin-left:100px">
                            <li class="nav-item"  style="margin-left:30px">
                                <label for="year" style="display: inline-block; width: 200px; text-align: right;" class="text-dark">Selected Batch: </label>
                                <select style="display: inline-block; width: 100px;" name="batch" class="form-control text-dark" name="class_year" id="batch">
                                    <option value="">click here</option>
                                    @foreach($batch as $b)
                                        <option value="{{ $b->id }}">{{ $b->batch_year }}</option>
                                    @endforeach
                                </select>
                                <label for="year"style="display: inline-block; width: 100px; text-align: right;" class="text-dark">Program: </label>
                                <select style="display: inline-block; width: 150px;" name="program" class="form-control text-dark" name="class_year" id="program">
                                    <option value="">click here</option>
                                    @foreach($department as $dept)
                                        <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
                                    @endforeach
                                </select>
                                <label for="year"style="display: inline-block; width: 100px; text-align: right;" class="text-dark">Department: </label>
                                <select style="display: inline-block; width: 150px;" name="department" class="form-control text-dark" name="class_year" id="department">
                                    <option value="">click here</option>
                                    @foreach($department as $dept)
                                        <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
                                    @endforeach
                                </select>
                            </li>&nbsp;
                            <li class="nav-item">
                                <button id="addPageBtn" class= "btn btn-light">Add New Page</button>
                                <div id="pagesLis00t"></div>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-muted" style="color: white;margin-top:5px" data-bs-toggle="modal" data-bs-target="#addFormModal" >
                                    <i class="fa-solid fa-user-plus" style="color: #000000;"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <button id="addColumn" class= "btn btn-light"  style="margin-top:5px" data-bs-toggle="modal" data-bs-target="#addColumnModal"><i class="fa-solid fa-pen"></i></button>
                                <div id="reqForm"></div>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-light" style="color: white;margin-top:5px" href="#">
                                    <i class="fa-solid fa-eye" style="color: #4c525d;"></i>
                                </a>
                            </li> 
                            
                            <li style="margin-left:10px">
                            </li>                     
                            <li class="nav-item" style="margin-left: auto;">
                                <a class="btn btn-warning" style="color: white;" href="#">
                                    {{ __(' Publish') }}
                                </a>
                            </li>
                        </ul>
                </div>
                <br>
            </nav>
            
    </div>
        
    </div>
    
        <div class="card border-3 border border-solid border-warning mb-3 mt-5" style="z-index:-1; float: left; margin-top: 2%;margin-left: 14%; width: 84%">
            <div class="card-header mb-3 " style="background-color:#000080; font-family:arial;color:#F0F8FF;">
                <div class="row">
                    <div class="col-15 mt-3 text-center"><h2></h2></div>
                </div>
            </div>
            <div class="card-body ">
                <div class="card-body mt-3">
                    {{-- <h1 class="text-center" style="font-family:arial black; color: #191970">BATCH</h1>
                    <h1 class="display-2 text-center" style="font-family: arial black; color:#D2691E">
                        <b> 
                           
                            <div class="" id="resultBatch">
                                No selected batch
                            </div>
                      
                        </b>
                    </h1> --}}

                    <h4 class="display-1 text-center" style="font-family: serif; color:#4B0082;">DIGITAL YEARBOOK</h4>
                        <h3 class=" text-center" style="font-family: arial black">
                            <b> 
                                <p class="display-4">BATCH</p> 
                                <div class="display-4" id="resultBatch2" style="color: #D2691E">
                                    NO SELECTED BATCH
                                </div>
                            </b>
                        </h3>     
                    <div class="text-center" style="font-family:arial black; font-size: 25px">               
                        <span style="color:#191970">CRISTAL</span>
                        <span style="color:#FF9966">e</span> 
                        <span style="color:#191970">-COLLEGE</span>
                    </div>

                    <div class="text-center" style="font-family:arial; font-size: 18px">  
                        <p>KM. 15, Central Highway Tawala, Panglao, Bohol</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="card border-3 border border-solid border-warning mb-3 mt-3" style="z-index:-1; float: left; margin-left: 14%; width: 84%">
            <div class="card-header mb-3" style="background-color:#000080; font-family:arial;color:#F0F8FF;">
                <div class="row">
                    <div class="col-15 mt-3 text-center"><h2>SCHOOL VISION, SCHOOL MISSION, AND SCHOOL MOTTO</h2></div>
                </div>
            </div>
            <div class="card-body mb-3">
                <div class="row">
                    <div  style="width: 26rem; margin-left: 82px;">
                        <div class="card-body mt-3" style="background-color:#10C45C; font-family:calibri; color:#F5FFFA">
                        <div class="text-center"><br>
                            <i class="fa-solid fa-graduation-cap fa-2xl" style="color: #ffffff;"></i>
                        </div><br>
                            <h2 class="card-title text-center"><b>SCHOOL VISION</b></h2>
                            <h4 class="card-text text-center">A leading institution of excellence in delivering education and training in the Philippines and beyond.</h4>
                        </div>
                    </div>
                    <div style="width: 26rem; margin-left: 82px;">
                        <div class="card-body mt-3" style="background-color:#307AD5; font-family:calibri; color:#F5FFFA">
                        <div class="text-center"><br>
                            <i class="fa-solid fa-award fa-2xl" style="color: #ffffff;"></i>
                        </div><br>
                            <h2 class="card-title text-center"><b>SCHOOL MISSION</b></h2>
                            <h4 class="card-text text-center">Deeply committed to promoting knowledge, humaneness and leadership<br><br></h4>
                        </div>
                    </div>
                    <div style="width: 26rem; margin-left: 82px;">
                        <div class="card-body mt-3 " style="background-color:#ED8F31; font-family:calibri; color:#F5FFFA">
                        <div class="text-center"><br>
                            <i class="fa-solid fa-trophy fa-2xl" style="color: #ffffff;"></i>
                        </div><br>
                            <h2 class="card-title text-center"><b>SCHOOL MOTTO</b></h2>
                            <h4 class="card-text text-center">Eruditio, gubernatio, et humanitas. Knowledge, leadership, and humanity.<br><br></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
        <div class="card border-3 border border-solid border-warning mb-3 mt-3" style="z-index:-1; float: left; margin-left: 14%; width: 84%">
            <div class="card-header mb-3" style="background-color:#000080; font-family:arial;color:#F0F8FF;">
                <div class="row">
                    <div class="col-10 mt-3 text-center"><h2 class="text-center" style="margin-left:18%">PRESIDENT'S MESSAGE</h2></div>             
                    <div class="col mt-3 text-right" style="text-align:right;margin-left:30px">
                        <h2 class="mt-1"><a href="#" class="text-white btn btn-mute"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a></h2>
                    
                    </div>
                    
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="card mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/President.jpg')}}" class=" img-fluid mt-2 rounded default_alumni_size" alt="...">
                        <div class="card-body mt-3 text-center ">
                            <h2><b> WILL TYRON TIROL</b></h2>
                            <h3><i> President - Cristal e-College</i></h3>
                        </div>
                    </div>

                    <div class="card border-light mb-5" style="width: 62rem; margin-left: 50px; margin-top:4px;height:auto">
                        <div class="card-body">
                            <div class="card-text" style="font-family:calibri;"> 
                            <h3>Dear Graduates,</h3><br><br>
                            <h5 class="text-justify">
                                As we stand on the threshold of this momentous occasion, I find myself filled with a profound sense of pride and admiration for each and every one of you. Today, we celebrate not only your academic achievements but also the incredible journey of growth, resilience, and discovery that has brought you to this significant milestone.
Graduating is not just a culmination; it is a beginning. As you step into the next chapter of your lives, equipped with the knowledge and experiences gained within these walls, remember that you are not merely receiving a degree but inheriting the responsibility to make a positive impact on the world around you.
The challenges you faced, the late nights spent studying, the friendships forged, and the obstacles overcome have sculpted you into the remarkable individuals you are today. These experiences have not only shaped your intellect but also fortified your character, preparing you for the opportunities and challenges that lie ahead.
In a world that is constantly evolving, your capacity to adapt, learn, and innovate will be your greatest asset. Embrace change with curiosity, face adversity with resilience, and approach success with humility. The journey of learning is lifelong, and your time as students has been a preparation for this ongoing expedition.
As you go forth, remember the values that have been instilled in you during your time here – integrity, perseverance, and a commitment to excellence. Carry these principles with you as you navigate the complexities of the professional world and contribute to the betterment of society.
Your success is not only a testament to your hard work but also a reflection of the unwavering support of your family, friends, and the dedicated faculty who have guided you along the way. Cherish these connections, for they are an invaluable part of your journey.
In closing, I want to express my heartfelt congratulations to each of you. You are not just graduates; you are ambassadors of knowledge, compassion, and positive change. May your endeavors be met with success, your dreams with fulfillment, and your life with purpose.
Remember, the journey does not end here; it transforms into a new and exciting chapter. As you spread your wings, may you soar to new heights, leaving a trail of inspiration for those who will follow.

Congratulations, graduates! The world awaits your brilliance.

Warm regards,
                            </h5><br><br><br>
                     
                            <div class="text-end">
                                <h3>Sincerely,</h3>
                                <h5><b>WILL TYRON TIROL</b></h5>
                                    <p><i>President</i></p>
                       
                            </div>  
                        </div>
                        </div>
                    </div>
                </div>               
            </div>   
        </div>


        <div class="card border-3 border border-solid border-warning mb-3 mt-3 " style="z-index:-1; float: left; margin-left: 14%; width: 84%">
            <div class="card-header mb-3 " style="background-color:#000080; font-family:arial;color:#F0F8FF;">
                <div class="row">
                    <div class="mt-2 text-center"><h2>SCHOOL OFFICIALS</h2></div>                       
                </div>
            </div>
    
            <div class="card-body ">
                <div class="row">
                    <div class="card mt-3 b-mb-5" style="width: 23rem; margin-left: 38%; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/President.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    
                          <div class="card-body mt-3 text-center ">
                            <p><b> WILL TYRON TIROL</b></p>
                            <p><i> President</i></p>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/VP Academic Affairs.JPG')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> ENGR. MICHAEL SPIKE RUNDOLF CUIZON</b></p>
                            <p><i> Dean of Computer Studies</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/AVP Finance.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> ENGR. MICHAEL SPIKE RUNDOLF CUIZON</b></p>
                            <p><i> Dean of Computer Studies</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/VP Finance.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> ENGR. MICHAEL SPIKE RUNDOLF CUIZON</b></p>
                            <p><i> Dean of Computer Studies</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> ENGR. MICHAEL SPIKE RUNDOLF CUIZON</b></p>
                            <p><i> Dean of Computer Studies</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> ENGR. MICHAEL SPIKE RUNDOLF CUIZON</b></p>
                            <p><i> Dean of Computer Studies</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> ENGR. MICHAEL SPIKE RUNDOLF CUIZON</b></p>
                            <p><i> Dean of Computer Studies</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> ENGR. MICHAEL SPIKE RUNDOLF CUIZON</b></p>
                            <p><i> Dean of Computer Studies</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> ENGR. MICHAEL SPIKE RUNDOLF CUIZON</b></p>
                            <p><i> Dean of Computer Studies</i></p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>


        <div class="card border-3 border border-solid border-warning mb-3 mt-3" style="z-index:-1; float: left; margin-left: 14%; width: 84%">
            <div class="card-header mb-3" style="background-color:#000080; font-family:arial;color:#F0F8FF;">
                <div class="row">
                    <div class="col-15 mt-3 text-center">
                        <h2>
                            <div class="display-6 fw-bold " id="resultDepartment" style="color: #ffff;text-transform:uppercase">
                                NO SELECTED DEPARTMENT
                            </div>  
                        </h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="card mb-5" style="width: 18rem; margin-left:650px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/csdlogo.png')}}"  alt="...">                          
                    </div>
                 
                        <h2 class=" text-center" style="font-family: arial black">
                            <b> 
                                <p class="display-4">BATCH</p> 
                                <div class="display-4" id="resultBatch2" style="color: #D2691E">
                                    NO SELECTED BATCH
                                </div>
                            </b>
                        </h2>     
                </div>               
            </div>   
        </div>
        
         <div class="card border-3 border border-solid border-warning mb-3 mt-3 " style="z-index:-1; float: left; margin-left: 14%; width: 84%">
            <div class="card-header mb-3 " style="background-color:#000080; font-family:arial;color:#F0F8FF;">
                <div class="row">
                    <div class="mt-2 text-center"><h2>COMPUTER STUDIES DEPARTMENT FACULTY</h2></div>                       
                </div>
            </div>
    
            <div class="card-body ">
                <div class="row">
                    <div class="card mt-3 b-mb-5" style="width: 23rem; margin-left: 38%; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                    
                          <div class="card-body mt-3 text-center ">
                            <p><b> ENGR. MICHAEL SPIKE RUNDOLF CUIZON</b></p>
                            <p><i> Dean of Computer Studies</i></p>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> JOHN ACE CASABUENA</b></p>
                            <p><i> Faculty</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> DEBRA LEE D. VARGAS</b></p>
                            <p><i> Faculty</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> COJIE BIZAR</b></p>
                            <p><i> Faculty</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> ANGIE GARDE</b></p>
                            <p><i> Faculty</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> IVIE R. MAGARO</b></p>
                            <p><i> Faculty</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> PAUL JOHN TADEM</b></p>
                            <p><i> Faculty</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> EUSEBIO DE ERIO</b></p>
                            <p><i> Faculty</i></p>
                        </div>
                    </div>
                    <div class="card mt-3 mb-5" style="width: 20rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/profile.png')}}" class=" img-fluid mt-2 rounded " alt="...">
                          <div class="card-body mt-3 text-center ">
                            <p><b> SCHLLTS SARABIA</b></p>
                            <p><i> Laboratory In-charge</i></p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <div class="card border-3 border border-solid border-warning mb-3 mt-3" style="z-index:-1; float: left; margin-left: 14%; width: 84%">
            <div class="card-header mb-3" style="background-color:#000080; font-family:arial;color:#F0F8FF;">
                <div class="row">
                    <div class="col-10 mt-3 text-center"><h2 class="text-center" style="margin-left:18%">DEAN'S MESSAGE</h2></div>
                     <div class="col mt-3 text-right" style="text-align:right;margin-left:30px">
                        <h2 class="mt-1"><a href="#" class="text-white btn btn-mute"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a></h2></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="card mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/spike cuizon.png')}}" class=" img-fluid mt-2 rounded default_alumni_size" alt="...">
                        <div class="card-body mt-3 text-center ">
                            <h2><b> ENGR. MICHAEL SPIKE RUNDOLF CUIZON</b></h2>
                            <h3><b> Dean</b></h3>
                            <h3><i> Computer Studies Department</i></h3>
                        </div>
                    </div>

                    <div class="card border-light mb-5" style="width: 62rem; margin-left: 50px; margin-top:4px;height:auto">
                        <div class="card-body">
                            <div class="card-text"> 
                            <h3>Dear Graduates,</h3><br><br>
                            <h5 class="text-center">
                                  As we stand on the threshold of this momentous occasion, I find myself filled with a profound sense of pride and admiration for each and every one of you. Today, we celebrate not only your academic achievements but also the incredible journey of growth, resilience, and discovery that has brought you to this significant milestone.
Graduating is not just a culmination; it is a beginning. As you step into the next chapter of your lives, equipped with the knowledge and experiences gained within these walls, remember that you are not merely receiving a degree but inheriting the responsibility to make a positive impact on the world around you.
The challenges you faced, the late nights spent studying, the friendships forged, and the obstacles overcome have sculpted you into the remarkable individuals you are today. These experiences have not only shaped your intellect but also fortified your character, preparing you for the opportunities and challenges that lie ahead.
In a world that is constantly evolving, your capacity to adapt, learn, and innovate will be your greatest asset. Embrace change with curiosity, face adversity with resilience, and approach success with humility. The journey of learning is lifelong, and your time as students has been a preparation for this ongoing expedition.
As you go forth, remember the values that have been instilled in you during your time here – integrity, perseverance, and a commitment to excellence. Carry these principles with you as you navigate the complexities of the professional world and contribute to the betterment of society.
Your success is not only a testament to your hard work but also a reflection of the unwavering support of your family, friends, and the dedicated faculty who have guided you along the way. Cherish these connections, for they are an invaluable part of your journey.
In closing, I want to express my heartfelt congratulations to each of you. You are not just graduates; you are ambassadors of knowledge, compassion, and positive change. May your endeavors be met with success, your dreams with fulfillment, and your life with purpose.
Remember, the journey does not end here; it transforms into a new and exciting chapter. As you spread your wings, may you soar to new heights, leaving a trail of inspiration for those who will follow.

Congratulations, graduates! The world awaits your brilliance.

Warm regards,
                            </h5><br><br><br>
                     
                            <div class="text-end">
                                <h3>Sincerely,</h3>
                                <h5><b>Engr. Michael Spike Rundolf Cuizon</b></h5>
                                    <p><i>Dean of Computer Studies</i></p>
                       
                            </div>  
                        </div>
                        </div>
                    </div>
                </div>               
            </div>   
        </div>

        

        <div class="card border-3 border border-solid border-warning mb-3 mt-5" style="z-index:-1; float: left; margin-left: 14%; width: 84%">
            <div class="card-header mb-3" style="background-color:#000080; font-family:arial;color:#F0F8FF;">
                <div class="row">
                    <div class="col-8 mt-3"><h2 style="margin-left:18px">PROGRAM: BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY</h2></div>
                    <div class="col offset-md-1 mt-3" style="text-align:right;margin-right:20px"><h2>BATCH: 2023</h2></div>
                    <div class="col-7 "><h2 style="margin-left:18px"> DEPARTMENT: COMPUTER STUDIES</h2></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="card mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/rona.jpg')}}" class=" img-fluid mt-2 rounded default_alumni_size" alt="...">
                        <div class="card-body mt-3 text-center " style= font-family:calibri;>
                            <button class= "btn btn-primary"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> Edit</button><br>
                            <h2><b> KELVIN KYLE BRAVO</b></h2>
                            <h3> June 27, 2002</h3>
                            <h3> Carmen, Bohol</h3>
                            <h3> 09262978713</h3>
                            <h3> cjryan@cec.edu.ph</h3>
                            <h3> Mr. and Mrs. Bravo</h3>
                            <h3><i> "Live, Laugh, Love"</i></h3>
                        </div>
                    </div>

                    <div class="card mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/aj.jpg')}}" class=" img-fluid mt-2 rounded default_alumni_size" alt="...">
                        <div class="card-body mt-3 text-center " style= font-family:calibri;>
                            <h2><b> KELVIN KYLE BRAVO</b></h2>
                            <h3> June 27, 2002</h3>
                            <h3> Carmen, Bohol</h3>
                            <h3> 09262978713</h3>
                            <h3> cjryan@cec.edu.ph</h3>
                            <h3> Mr. and Mrs. Bravo</h3>
                            <h3><i> "Live, Laugh, Love"</i></h3>
                        </div>
                    </div>

                    <div class="card mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/maris.jpg')}}" class=" img-fluid mt-2 rounded default_alumni_size" alt="...">
                        <div class="card-body mt-3 text-center " style= font-family:calibri;>
                            <h2><b> KELVIN KYLE BRAVO</b></h2>
                            <h3> June 27, 2002</h3>
                            <h3> Carmen, Bohol</h3>
                            <h3> 09262978713</h3>
                            <h3> cjryan@cec.edu.ph</h3>
                            <h3> Mr. and Mrs. Bravo</h3>
                            <h3><i> "Live, Laugh, Love"</i></h3>
                        </div>
                    </div>

                    <div class="card mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/dan.jpg')}}" class=" img-fluid mt-2 rounded default_alumni_size" alt="...">
                        <div class="card-body mt-3 text-center " style= font-family:calibri;>
                            <h2><b> KELVIN KYLE BRAVO</b></h2>
                            <h3> June 27, 2002</h3>
                            <h3> Carmen, Bohol</h3>
                            <h3> 09262978713</h3>
                            <h3> cjryan@cec.edu.ph</h3>
                            <h3> Mr. and Mrs. Bravo</h3>
                            <h3><i> "Live, Laugh, Love"</i></h3>
                        </div>
                    </div>

                    <div class="card mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/jessa.jpg')}}" class=" img-fluid mt-2 rounded default_alumni_size" alt="...">
                        <div class="card-body mt-3 text-center " style= font-family:calibri;>
                            <h2><b> KELVIN KYLE BRAVO</b></h2>
                            <h3> June 27, 2002</h3>
                            <h3> Carmen, Bohol</h3>
                            <h3> 09262978713</h3>
                            <h3> cjryan@cec.edu.ph</h3>
                            <h3> Mr. and Mrs. Bravo</h3>
                            <h3><i> "Live, Laugh, Love"</i></h3>
                        </div>
                    </div>

                    <div class="card mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/istoy.jpg')}}" class=" img-fluid mt-2 rounded default_alumni_size" alt="...">
                        <div class="card-body mt-3 text-center " style= font-family:calibri;>
                            <h2><b> KELVIN KYLE BRAVO</b></h2>
                            <h3> June 27, 2002</h3>
                            <h3> Carmen, Bohol</h3>
                            <h3> 09262978713</h3>
                            <h3> cjryan@cec.edu.ph</h3>
                            <h3> Mr. and Mrs. Bravo</h3>
                            <h3><i> "Live, Laugh, Love"</i></h3>
                        </div>
                    </div>

                    <div class="card mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/ip.jpg')}}" class=" img-fluid mt-2 rounded default_alumni_size" alt="...">
                        <div class="card-body mt-3 text-center " style= font-family:calibri;>
                            <h2><b> KELVIN KYLE BRAVO</b></h2>
                            <h3> June 27, 2002</h3>
                            <h3> Carmen, Bohol</h3>
                            <h3> 09262978713</h3>
                            <h3> cjryan@cec.edu.ph</h3>
                            <h3> Mr. and Mrs. Bravo</h3>
                            <h3><i> "Live, Laugh, Love"</i></h3>
                        </div>
                    </div>

                    <div class="card mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/coji.jpg')}}" class=" img-fluid mt-2 rounded default_alumni_size" alt="...">
                        <div class="card-body mt-3 text-center " style= font-family:calibri;>
                            <h2><b> KELVIN KYLE BRAVO</b></h2>
                            <h3> June 27, 2002</h3>
                            <h3> Carmen, Bohol</h3>
                            <h3> 09262978713</h3>
                            <h3> cjryan@cec.edu.ph</h3>
                            <h3> Mr. and Mrs. Bravo</h3>
                            <h3><i> "Live, Laugh, Love"</i></h3>
                        </div>
                    </div>

                    <div class="card mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/vince.jpg')}}" class=" img-fluid mt-2 rounded default_alumni_size" alt="...">
                        <div class="card-body mt-3 text-center " style= font-family:calibri;>
                            <h2><b> KELVIN KYLE BRAVO</b></h2>
                            <h3> June 27, 2002</h3>
                            <h3> Carmen, Bohol</h3>
                            <h3> 09262978713</h3>
                            <h3> cjryan@cec.edu.ph</h3>
                            <h3> Mr. and Mrs. Bravo</h3>
                            <h3><i> "Live, Laugh, Love"</i></h3>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <div class="card border-3 border border-solid border-warning mb-3 mt-5" style="z-index:-1; float: left; margin-left: 14%; width: 84%">
            <div class="card-header mb-3" style="background-color:#000080; font-family:arial;color:#F0F8FF;">
                <div class="row">
                    <div class="col-8 mt-3"><h2 style="margin-left:18px">DEPARTMENT ACTIVITIES AND FUN SHOTS</h2></div>   
                    <div class="col mt-3 text-right" style="text-align:right;margin-left:100px">
                        <h2 class="mt-1"><a href="#" class="text-white btn btn-mute"><i class="fa-solid fa-plus" style="color: #ffffff;"></i></a></h2></div>
                    <div class="col offset-md-1 mt-3" style="text-align:right;margin-left:10px"><h2>BATCH: 2023</h2></div>
                    
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                   
                    <div class="mt-3 b-mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <input type="checkbox" style=" width: 20px; height: 20px; " id="img" name="image">
                        <img src="{{ asset('assets/image/o.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <input type="checkbox" style=" width: 20px; height: 20px; " id="img" name="image">
                        <img src="{{ asset('assets/image/n.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <input type="checkbox" style=" width: 20px; height: 20px; " id="img" name="image">
                        <img src="{{ asset('assets/image/m.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/i.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/k.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/l.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/h.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/f.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/g.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="button-container mb-3">
                        <button type="delete" class="btn btn-danger" style=" margin-left: 89%;"><i class="fa-solid fa-trash" style="color: #ffffff;"></i> Delete</button>    
                    </div>
                </div>
            </div> 
        </div>

        <div class="card border-3 border border-solid border-warning mb-3 mt-5" style="z-index:-1; float: left; margin-left: 14%; width: 84%">
            <div class="card-header mb-3" style="background-color:#000080; font-family:arial;color:#F0F8FF;">
                <div class="row">
                    <div class="col-8 mt-3"><h2 style="margin-left:18px">GRADUATION SHOTS</h2></div>
                    <div class="col mt-3 text-right" style="text-align:right;margin-left:100px"><h2 class="mt-1"><a href="#" class="text-white btn btn-mute"><i class="fa-solid fa-plus" style="color: #ffffff;"></i></a></h2></div>
                    <div class="col offset-md-1 mt-3" style="text-align:right;margin-left:10px"><h2>BATCH: 2023</h2></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="mt-3 b-mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <input type="checkbox" style=" width: 20px; height: 20px; " id="img" name="image">
                        <img src="{{ asset('assets/image/grad1.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <input type="checkbox" style=" width: 20px; height: 20px; " id="img" name="image">
                        <img src="{{ asset('assets/image/grad2.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <input type="checkbox" style=" width: 20px; height: 20px; " id="img" name="image">
                        <img src="{{ asset('assets/image/grad3.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/grad4.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/grad5.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/grad6.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/grad7.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/grad8.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="mt-3 mb-5" style="width: 28rem; margin-left: 50px; margin-top:4px;height:auto">
                        <img src="{{ asset('assets/image/grad9.jpg')}}" class=" img-fluid mt-2 rounded " alt="...">
                    </div>
                    <div class="button-container mb-3">
                        <button type="delete" class="btn btn-danger" style=" margin-left: 89%;"><i class="fa-solid fa-trash" style="color: #ffffff;"></i> Delete</button>    
                    </div>
                </div>
            </div> 
        </div>
        
        <div class="card border-3 border border-solid border-warning mb-3 mt-5" style="z-index:-1; float: left; margin-left: 14%; width: 84%">
            <div class="card-header mb-3" style="background-color:#000080; font-family:arial;color:#F0F8FF;">
                <div class="row">
                   <div class="col-11 mt-3 text-center"><h2 style="margin-left:120px">GRADUATION SONG</h2></div>   
                    <div class="col mt-3 text-right" style="text-align:right;margin-left:30px">
                        <h2 class="mt-1"><a href="#" class="text-white btn btn-mute"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a></h2></div>
                    
                </div>
            </div>
            <div class="row" style="font-family:arial;">
                    <h2 class="text-center"><b>THE CLIMB</b></h2>
                    <h4 class="text-center"><b>Song by: Miley Cyrus</b></h4>
                </div>
            <div class="mb-3">
                <div class="row">
                    <div  style="width: 26rem; margin-left: 20%;">
                        <div class=" mt-3" style="font-family:calibri;">
                           
                            <p>I can almost see it
                            That dream I'm dreaming
                            But there's a voice inside my head saying
                            You'll never reach it<br>
                            Every step I'm taking
                            Every move I make feels
                            Lost with no direction
                            My faith is shaking</p>
                            <p>But I, I gotta keep trying<br>
                            Gotta keep my head held high</p>
                            <p>There's always gonna be another mountain
                            I'm always gonna wanna make it move
                            Always gonna be an uphill battle
                            Sometimes I'm gonna have to lose
                            Ain't about how fast I get there
                            Ain't about what's waiting on the other side
                            It's the climb</p>
                            <p>The struggles I'm facing
                            The chances I'm taking
                            Sometimes might knock me down, but
                            No, I'm not breaking</p>
                            <p>I may not know it
                            But these are the moments, that
                            I'm gonna remember most, yeah
                            Just gotta keep going</p>
                        </div>
                    </div>
                    <div  style="width: 26rem; margin-left: 82px;">
                        <div class="mt-3" style="font-family:calibri;">
                            <p>And I, I gotta be strong
                                Just keep pushing on, 'cause<br>
                                There's always gonna be another mountain
                                I'm always gonna wanna make it move
                                Always gonna be an uphill battle
                                Sometimes I'm gonna have to lose
                                Ain't about how fast I get there
                                Ain't about what's waiting on the other side
                                It's the climb
                                Yeah</p>
                                <p>There's always gonna be another mountain
                                I'm always gonna wanna make it move
                                Always gonna be an uphill battle
                                Sometimes you're gonna have to lose
                                Ain't about how fast I get there
                                Ain't about what's waiting on the other side
                                It's the climb
                                Yeah, yeah</p>
                                <p>Keep on moving, keep climbing
                                Keep the faith, baby
                                It's all about, it's all about the climb
                                Keep your faith, keep your faith
                                Whoa....</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-3 border border-solid border-warning mb-3 mt-5" style="z-index:-1; float: left; margin-left: 14%; width: 84%">
            <div class="card-header mb-3" style="background-color:#000080; font-family:arial;color:#F0F8FF;">
                <div class="row">
                     <div class="col-11 mt-3 text-center"><h2 style="margin-left:120px">VIDEO HIGHLIGHTS</h2></div>   
                    <div class="col mt-3 text-right" style="text-align:right;margin-left:30px">
                        <h2 class="mt-1"><a href="#" class="text-white btn btn-mute"><i class="fa-solid fa-plus" style="color: #ffffff;"></i></a></h2></div>
                    
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                   <iframe width="300" height="800" src="https://www.youtube.com/embed/M0fsLuOpNhQ?si=jkb50Bl8M-MnZOeG" 
                    title="YouTube video player" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen></iframe>           
                </div>
            </div> 
        </div>

        <div class="card border-3 border border-solid border-warning mb-3 mt-5" style="z-index:-1; float: left; margin-left: 14%; width: 84%">
            <div class="card-body" style="font-family: arial black;color:#00008B">
                <div class="row">
                   <h1 class="text-center"><b>CONGRATULATIONS BATCH 2023!!!<b></h1>      
                </div>               
            </div>   
        </div>
 
   
        
            
       
    
    <!-- FORM MODAL -->

    <div class="modal fade " id="addFormModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content " style=" background-color: #DCDCDC;">
      <div class="modal-header " style=" background-color: #DCDCDC;" >
        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('alumni.store') }}" method="POST" id="add_data_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 " style=" background-color: #DCDCDC;">
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
              <label for="first_name" class="text-dark">{{ __('Full Name') }}<span class="text-danger">*</span></label>
              <input type="text" name="first_name" class="form-control form-control2 @error('first_name') is-invalid @enderror" placeholder="Enter Full Name" value="{{ old('first_name') }}" required>
              @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="col-lg" style="display:none">
              <label for="roler" class="text-dark">{{ __('Role') }}<span class="text-danger">*</span></label>
              <input type="text" name="role" class="form-control form-control2 @error('role') is-invalid @enderror" placeholder="Role" value="Staff" required>
              @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-lg">
              <label for="birthdate" class="text-dark">{{ __('Birthdate') }}<span class="text-danger">*</span></label>
              <input type="date" name="birthdate" class="form-control form-control2 @error('birthdate') is-invalid @enderror" value="{{ old('birthdate') }}" required>
              @error('birthdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="my-2">
            <label for="address" class="text-dark">{{ __('Address') }} <span class="text-danger">*</span></label>
            <input type="text"  name="address" class="form-control form-control2 @error('address') is-invalid @enderror" placeholder="Enter Address" required>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <div class="my-2">
            <label for="email" class="text-dark">{{ __('Email Address') }} <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control form-control2" placeholder="Enter Email Address" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <div class="my-2">
            <label for="department_name" class="text-dark">{{ __('Department Name') }}<span class="text-danger">*</span></label>
              <input type="text" name="department_name" class="form-control form-control2 @error('department_name') is-invalid @enderror" placeholder="Enter Department Name" value="{{ old('department_name') }}" required>
              @error('department_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="my-2">
              <label for="class_year" class="text-dark">{{ __('Class Year') }}<span class="text-danger">*</span></label>
              <input type="number" name="class_year" class="form-control form-control2 @error('class_year') is-invalid @enderror" placeholder="Enter Class Year" value="{{ old('class_year') }}" required>
              @error('class_year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          <div class="my-2">
            <label for="parents_name" class="text-dark">{{ __('Parents Name') }} <span class="text-danger">*</span></label>
            <input type="text"  name="parents_name" class="form-control form-control2 @error('parents_name') is-invalid @enderror" placeholder="Enter Parents Name" required>
            @error('parents_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          
          <div class="my-2">
            <label for="motto" class="text-dark">{{ __('Motto') }} <span class="text-danger">*</span></label>
            <input type="text"  name="motto" class="form-control form-control2 @error('motto') is-invalid @enderror" placeholder="Enter Motto" required>
            @error('motto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
      
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-primary d-grip gap-2" style="width: 30%; border-color:white">Add Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add form modal end --}}


<!-- REQUEST COLUMN FORM -->

<div class="modal fade " id="addColumnModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style=" background-color: #DCDCDC;">
        <div class="modal-header" style=" background-color: #DCDCDC;">
            <h5 class="modal-title" id="exampleModalLabel">Request Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('alumni.store') }}" method="POST" id="add_data_form" enctype="multipart/form-data">
        @csrf
            <div class="modal-body p-4" style=" background-color: #DCDCDC;">
                <div class="my-2">
                <label for="column_name" class="text-dark">{{ __('Request') }}<span class="text-danger">*</span></label>
                <input type="text" name="column_name" class="form-control form-control2 @error('column_name') is-invalid @enderror" value="{{ old('column_name') }}" required>
                @error('column_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-primary d-grip gap-2" style="width: 30%; border-color:white">Request</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    $('#batch').change(function() {
        var selectedOption = $(this).val();

        if (!selectedOption) {
            // No batch selected
            $('#resultBatch').html('No selected batch');
            $('#resultBatch2').html('No selected batch');
            return;
        }

        $.ajax({
            url: '/fetch-data/' + selectedOption,
            type: 'GET',
            success: function(response) {
                if (response.selectedBatchId) {
                    // Display the fetched data in the #result div
                    var resultHtml = response.selectedBatchYear;

                    // Append additional data as needed

                    // Append the generated HTML to the #result div
                    $('#resultBatch').html(resultHtml);
                    $('#resultBatch2').html(resultHtml);
                } else {
                    var resultHtml = "Batch Not Found! ";
                    $('#resultBatch').html(resultHtml);
                    $('#resultBatch2').html(resultHtml);
                }
            },
            error: function(xhr, status, error) {
                // Handle the error case more effectively
                console.error(xhr.responseText);
                $('#resultBatch').html('<p>Not found.</p>');
                $('#resultBatch2').html('<p>Not found.</p>');
            }
        });
    });
});



</script>


<script>
    $(document).ready(function() {
        $('#department').change(function() {
            var selectedOption = $(this).val();
    
            if (!selectedOption) {
                // No batch selected
                $('#resultDepartment').html('No selected department');
                return;
            }
    
            $.ajax({
                url: '/fetch-data-department/' + selectedOption,
                type: 'GET',
                success: function(response) {
                    if (response.selectedDeptId) {
                        // Display the fetched data in the #result div
                        var resultHtml = response.selectedDeptName;
    
                        // Append additional data as needed
    
                        // Append the generated HTML to the #result div
                        $('#resultDepartment').html(resultHtml + " DEPARTMENT");
                        //$('#resultBatch2').html(resultHtml);
                    } else {
                        var resultHtml = "Department Not Found! ";
                        $('#resultDepartment').html(resultHtml);
                       // $('#resultBatch2').html(resultHtml);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the error case more effectively
                    console.error(xhr.responseText);
                    $('#resultDepartment').html('<p>Not found.</p>');
                    // $('#resultBatch2').html('<p>Not found.</p>');
                }
            });
        });
    });
    
    
    
    </script>


         

</body>
   
</html>

@else
<script>
    window.location="{{ route('admin-login')}}"
</script>
@endif


























