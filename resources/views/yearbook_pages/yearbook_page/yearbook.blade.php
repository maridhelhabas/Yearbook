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
    width: 100%;
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
}


#features {
    background-color: #f4f4f4;
    padding: 40px 0;
    text-align: left;
    margin-left: 2%;
    
}


footer {
    background-color: #333;
    color: #fff;
    text-align: right;
    padding: 10px 0;
}

/*Search bar*/

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.search-container {
    text-align: center;
    margin-top: 20px;
    background-color: transparent;
}

.search-container input[type="text"] {
    width: 450px;
    padding: 10px;
    border: none;
    border-radius: 30px;
    outline-style: solid;
    outline-color: #87CEEB;
    margin-left: 1%;
    margin-top: -2%;
    font-size: 16px;  
    background-color: rgba(255, 255, 255, 0.3); 
    color: white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   
    
}

.search-container button {
    background-color: transparent;
    border: none;
    color: white;
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
  color: white;
  
}



    </style>   
    
 </head>


<body >
    @include('components/nav')
    @include('components/sidebar')
      
    <div class="col-md-9 mt-5" style="z-index:1;float:right">
        <div class="content" style="margin-left: -20%;margin-top:3.5%;">

    <section id="bgimage">
         <div class="search-container">
                <form action="search.php" method="GET">
                    <input type="text" name="search" class="text-white" placeholder="Search...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        <div class="container"><br>
            <h2>Digital Yearbook</h2>
            <p>Capture memories, Relive Moments and Connect forever</p>
            <a href="{{ route('contents') }}" class="cta-button">Let's Create</a>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <h2></h2>
            <p>These modern yearbooks encapsulate the essence of a memorable year, allowing students, faculty,</p>
             <p>  and alumni to relive their experiences in a more engaging and technologically advanced manner.</p>
        </div>
    </section>

    <section id="features">
        <div class="container">
            <h2>Published yearbooks</h2>
            <div class="feature">
                <img src="yearbook-1.jpg" alt="yearbook 1">
                <h3>Batch 2021</h3>
                <p>Describe your first yearbook here.</p>
            </div>
            <br>
            <div class="feature">
                <img src="yearbook-2.jpg" alt="yearbook 2">
                <h3>Batch 2022</h3>
                <p>Describe your second yearbook here.</p>
            </div>
            <br>
            <div class="feature">
                <img src="yearbook-3.jpg" alt="yearbook 3">
                <h3>Batch 2023</h3>
                <p>Describe your third yearbook here.</p>
                and so forth..............
            </div>
        </div>
    </section>

    
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