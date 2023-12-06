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
        /* body {
        font-family: Arial;
        font-size: 1.3em;
        line-height: 1.6em;
      }

      .headline {
        font-size: 2em;
        text-align: center;
      }

   

      button {
        border: none;
        padding: 0.8em;
        background: #f96;
        border-radius: 3px;
        color: white;
        font-weight: bold;
        margin: 0 0 1em;
      }

      button:hover,
      button:focus {
        cursor: pointer;
        outline: none;
      }

      #editor {
        padding: 1em;
       
        border-radius: 3px;
      } */

      /* Reset some default styles */


/* Basic styles for the page */



#bgimage {
    background-image: url('{{ asset('assets/image/bg_graduates.jpg') }}');
    background-size: cover;
    background-position: center;
    text-align: center;
    color: #fff;
    padding: 100px;
    height: 50%;
    margin-top: -10px;
    margin-left:-20px;
    margin-right:-20px;
    font-family: "calibri";
    
  
}

.cta-button {
    display: inline-block;
    background-color:#DAA520;
    color: #fff;
    padding: 15px 30px;
    text-decoration: none;
    font-size: 18px;
    border-radius: 5px;
    transition: background-color 0.3s ease-in-out;
}


#about {
    background-color: #fff;
    padding: 40px 0;
    text-align: center;
    margin-left:-20px;
    margin-right:-20px;
}


#features {
    background-color: #f4f4f4;
    padding: 40px 0;
    text-align: left;
    margin-left:-20px;
    margin-right:-20px;
    
}


footer {
    background-color: #333;
    color: #fff;
    text-align: right;
    padding: 10px 0;
    margin-left:-20px;
    margin-right:-20px;
}

/*Search bar*/

 .custom-search {
      position: relative;
    }

    .custom-search input[type="text"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-sizing: border-box;
      outline-style: solid;
      font-size: 16px; 
      outline-color: #87CEEB;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .custom-search button {
      position: absolute;
      right: 0;
      top: 0;
      padding: 11px 12px;
      border: 1px solid #ccc;
      border-radius: 15px;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
    }

    @media (max-width: 767px) {
      /* Adjust styles for smaller screens */
      .custom-search button {
        position: relative;
        width: 100%;
        margin-top: 8px;
        border-radius: 4px;
      }
    }



    
/*----  Main Style  ----*/
#cards_landscape_wrap-2{
  text-align: center;
  background: #F7F7F7;
}
#cards_landscape_wrap-2 .container{
  padding-top: 80px; 
  padding-bottom: 100px;
}
#cards_landscape_wrap-2 a{
  text-decoration: none;
  outline: none;
}
#cards_landscape_wrap-2 .card-flyer {
  border-radius: 5px;
}
#cards_landscape_wrap-2 .card-flyer .image-box{
  background: #ffffff;
  overflow: hidden;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.50);
  border-radius: 5px;
}
#cards_landscape_wrap-2 .card-flyer .image-box img{
  -webkit-transition:all .9s ease; 
  -moz-transition:all .9s ease; 
  -o-transition:all .9s ease;
  -ms-transition:all .9s ease; 
  width: 100%;
  height: 400px;
}
#cards_landscape_wrap-2 .card-flyer:hover .image-box img{
  opacity: 0.7;
  -webkit-transform:scale(1.15);
  -moz-transform:scale(1.15);
  -ms-transform:scale(1.15);
  -o-transform:scale(1.15);
  transform:scale(1.15);
}
#cards_landscape_wrap-2 .card-flyer .text-box{
  text-align: center;
}
#cards_landscape_wrap-2 .card-flyer .text-box .text-container{
  padding: 30px 18px;
}
#cards_landscape_wrap-2 .card-flyer{
  background: #FFFFFF;
  margin-top: 50px;
  -webkit-transition: all 0.2s ease-in;
  -moz-transition: all 0.2s ease-in;
  -ms-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
  box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.40);
}
#cards_landscape_wrap-2 .card-flyer:hover{
  background: #fff;
  /* box-shadow: 0px 15px 26px rgba(0, 0, 0, 0.50); */
  box-shadow: 0px 15px 15px lightblue;
  -webkit-transition: all 0.2s ease-in;
  -moz-transition: all 0.2s ease-in;
  -ms-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
  margin-top: 50px;
}
#cards_landscape_wrap-2 .card-flyer .text-box p{
  margin-top: 10px;
  margin-bottom: 0px;
  padding-bottom: 0px; 
  font-size: 14px;
  letter-spacing: 1px;
  color: #000000;
}
#cards_landscape_wrap-2 .card-flyer .text-box h6{
  margin-top: 0px;
  margin-bottom: 4px; 
  font-size: 18px;
  font-weight: bold;
  text-transform: uppercase;
  font-family: 'Roboto Black', sans-serif;
  letter-spacing: 1px;
  color: #00acc1;
}


    /* Optional styling for the button */
    .image-button {
      display: inline-block;
      cursor: pointer;
    }

 
    </style>   
    
 </head>


<body >
    @include('components/nav')
    @include('components/sidebar')
      
<div class="content">
    <section id="bgimage">
         <div class="container mt-3">

   <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="custom-search">
        <input type="text" placeholder="Search...">
        <button type="button">Search</button>
      </div>
    </div>
  </div>
</div>
        <div class="container"><br>
            <h2>Digital Yearbook</h2>
            <p>Capture memories, Relive Moments and Connect forever</p>
            <!-- <a href="{{ route('contents') }}" class="cta-button">Let's Create</a> -->

        </div>
    </section>

    <section id="about">
        <div class="container">
            <h2></h2>
            <p>These modern yearbooks encapsulate the essence of a memorable year, allowing students, faculty,</p>
             <p>  and alumni to relive their experiences in a more engaging and technologically advanced manner.</p>
        </div>
    </section>
   <!-- Topic Cards -->
    <div id="cards_landscape_wrap-2">
        <div class="container">
            <div class="row">
                <h1 style="font-family: arial black;color: darkblue">PUBLISHED YEARBOOKS</h1>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                      <a href="">
                          <div class="card-flyer">
                              <div class="text-box">
                                  <div class="image-box">
                                      <img src="{{ asset('assets/image/ceclogo.png')}}" alt="" />
                                  </div>
                                  <div class="text-container">
                                      <h6>BATCH 2023</h6>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                      <a href="">
                          <div class="card-flyer">
                              <div class="text-box">
                                  <div class="image-box">
                                      <img src="{{ asset('assets/image/ceclogo.png')}}" alt="" />
                                  </div>
                                  <div class="text-container">
                                      <h6>BATCH 2024</h6>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                      <a href="">
                          <div class="card-flyer">
                              <div class="text-box">
                                  <div class="image-box">
                                      <img src="{{ asset('assets/image/ceclogo.png')}}" alt="" />
                                  </div>
                                  <div class="text-container">
                                      <h6>BATCH 2025</h6>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                      <a href="">
                          <div class="card-flyer">
                              <div class="text-box">
                                  <div class="image-box">
                                      <img src="{{ asset('assets/image/ceclogo.png')}}" alt="" />
                                  </div>
                                  <div class="text-container">
                                      <h6>BATCH 2026</h6>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2023 Capstone Project - Computer Studies Department | Cristal e-College</p>
        </div>
    </footer>  
            <!-- <h1 class="text-black" style=" font-family: arial;font-size: 25px; text-indent: 10px;margin-left: -460%;margin-top:3%;">YEARBOOK<hr></h1> -->
            <!-- <div class="text-right mb-2">
                <a class="btn btn-success" style="margin-left: 30%;margin-top:5%;" href="{{ route('contents') }}"> Create Yearbook</a>
			</div> -->
    
             <!-- <div> -->
                <!-- <nav1 class="navbar navbar-expand-md  navbar-light bg-light shadow-sm" style="position:fixed;min-width: 100%;float:left; margin-left:-70.3%;margin-top:-1%;z-index:1">      
                    <h1 class="text-black" style=" font-family: arial;font-size: 25px; text-indent: 10px;">CREATE YEARBOOK</h1>
                    <a class="link link-warning" style="font-size: 18px;"href="{{ route('contents') }}"> Open Form</a>
                    <a style="margin-left: 800px;" href="#"><i class="fa-solid fa-eye fa-2xl" style="color: #161718;"></i></a>       
                    <a class="btn btn-success" style="margin-left: 30px;" href="#"> Publish </a>                 
                </nav1> -->
                <!-- <a class="btn btn-warning " style="margin-left: 50%;margin-top:20%;"href="{{ route('contents') }}"> Open Form</a> -->
            <!-- </div> -->
        </div>
    </div>
    



   

    
</body>
   
</html>

@else
<script>
    window.location="{{ route('admin-login')}}"
</script>
@endif