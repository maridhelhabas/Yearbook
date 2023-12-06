@if(Auth::check())
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Yearbook</title>
    
    <link rel="icon" href="{{asset('assets/image/ceclogo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="./src/main.js"></script>
    <script type="text/javascript"></script>
   
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

   <style>
       
.book {
    width: 600px;
    height: 650px;
    position: relative;
    transition-duration: 1s;
    perspective: 1500;
}
input {
    display: none;
}
.cover, .back-cover {
    background-color:#DEB887;
    width: 100%;
    height: 100%;
    border-radius: 0 15px 15px 0;
    box-shadow: 0 0 5px rgb(41, 41, 41);
    display: flex;
    align-items: center;
    justify-content: center;
    transform-origin: center left;
}
.cover {
    position: absolute;
    z-index: 4;
    transition: transform 1s;
}
.cover label {
    width: 100%;
    height: 100%;
    cursor: pointer;
}
.back-cover {
    position: relative;
    z-index: -1;
}
.page{
    position: fixed;
    background-image: linear-gradient(#FF00FF, #9400D3, #4B0082);
    background-size: cover;
    width: 590px;
    height: 630px;
    border-radius: 0 15px 15px 0;
    margin-top: 10px;
    transform-origin: left;
    transform-style: preserve-3d;
    transform: rotateY(0deg);
    transition-duration: 1.5s;
}
.page img {
    width: 100%;
    height: 100%;
    border-radius: 15px 0 0 15px;
}
.front-page {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    box-sizing: border-box;
    padding: 1rem;
}
.back-page {
    transform: rotateY(180deg);
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    z-index: 99;
}
.next, .prev {
    position: absolute;
    bottom: 1em;
    cursor: pointer;
}
.next {
    right: 1em;
}
.prev {
    left: 1em;
}
#page1 {
    z-index: 3;
}
#page2 {
    z-index: 2;
}
#page3 {
    z-index: 1;
}
#checkbox-cover:checked ~ .book {
    transform: translateX(200px);
}
#checkbox-cover:checked ~ .book .cover {
    transition: transform 1.5s, z-index 0.5s 0.5s;
    transform: rotateY(-180deg);
    z-index: 1;
}
#checkbox-cover:checked ~ .book .page {
    box-shadow: 0 0 3px rgb(99, 98, 98);
}
#checkbox-page1:checked ~ .book #page1 {
    transform: rotateY(-180deg);
    z-index: 2;
}
#checkbox-page2:checked ~ .book #page2 {
    transform: rotateY(-180deg);
    z-index: 3;
}

/*edit text*/
    body {
        font-family: Arial;
        font-size: 1.3em;
        line-height: 1.6em;
      }

      .headline {
        font-size: 2em;
        text-align: right;
      }

      #wrapper {
        width: 600px;
        background: red;
        padding: 1em;
        margin: 1em auto;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        border-radius: 3px;
        position:fixed;
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
        color: white;
        border-radius: 3px;
      }
    
    /*image display*/
    .drop-zone {
	max-width: 200px;
	height: 200px;
	padding: 25px;
	align-items: center;
	justify-content: center;
	text-align: center;
	font-family: "Quicksand", sans-serif;
	font-weight: 500;
	font-size: 12px;
	cursor: pointer;
	color: #cccccc;
    
	
}

.drop-zone--over {
	border-style: solid;
}

.drop-zone__input {
	display: none;
}

.drop-zone__thumb {
	width: 100%;
	height: 100%;
	border-radius: 10px;
	overflow: hidden;
	background-color: #cccccc;
	background-size: cover;
	position: relative;
}

 
</style>

 </head>
 
<body>


        @include('components/nav')
        @include('components/sidebar')
  <div class="col-md-9 mt-5" style="z-index:1;float:left">
        <div class="content" style="margin-left: 60%;margin-top:3%;">    
     <br>
        <div id="toolbar">
            <button id="addh1" class="btn btn-warning text-white">H1</button>
            <button id="addh2" class="btn btn-warning text-white">P</button>
            <button id="editBtn" type="button" class="btn btn-warning text-white">Edit</button>
           
        </div>
        <br>
    <input type="checkbox" id="checkbox-cover">
    <input type="checkbox" id="checkbox-page1">
    <input type="checkbox" id="checkbox-page2">
    <input type="checkbox" id="checkbox-page3">
    <div class="book">
        <div class="cover">
            <label for="checkbox-cover"></label>
        </div>
        
        <div class="page" id="page1">
            <div class="front-page">
                <div id="editor">
                <div class="drop-zone" style="margin-left: 5%; margin-top:5%;">
		            <span class="drop-zone__prompt">click image to upload</span>
		            <input type="file" name="myFile" class="drop-zone__input">
            </div>           
                <h5 id="name" style="margin-left: 50%; margin-top:-35%;">Name</h5>
                <p id="parent" style="margin-left: 50%;">Parent's Name</p>
                <p id="address" style="margin-left: 50%;">Address</p>
                <p id="birthday" style="margin-left: 50%;">Birthday</p>
                <p id="motto" style="margin-left: 50%;">Motto</p>

                <div class="drop-zone" style="margin-left: 5%; margin-top: 15%;">
		            <span class="drop-zone__prompt">click image to upload</span>
		            <input type="file" name="myFile" class="drop-zone__input">
            </div>           
                <h5 id="name" style="margin-left: 50%; margin-top:-30%;">Name</h5>
                <p id="parent" style="margin-left: 50%;">Parent's Name</p>
                <p id="address" style="margin-left: 50%;">Address</p>
                <p id="birthday" style="margin-left: 50%;">Birthday</p>
                <p id="motto" style="margin-left: 50%;">Motto</p>
            </div>        
                <label class="next" for="checkbox-page1"><i class="fas fa-chevron-right"></i></label>
            </div>
            <div class="back-page">
                <div id="editor">
                <div class="drop-zone" style="margin-left: 5%; margin-top:5%;">
		            <span class="drop-zone__prompt">click image to upload</span>
		            <input type="file" name="myFile" class="drop-zone__input">
            </div>           
                <h5 id="name" style="margin-left: 50%; margin-top:-35%;">Name</h5>
                <p id="parent" style="margin-left: 50%;">Parent's Name</p>
                <p id="address" style="margin-left: 50%;">Address</p>
                <p id="birthday" style="margin-left: 50%;">Birthday</p>
                <p id="motto" style="margin-left: 50%;">Motto</p>

                <div class="drop-zone" style="margin-left: 5%; margin-top: 15%;">
		            <span class="drop-zone__prompt">click image to upload</span>
		            <input type="file" name="myFile" class="drop-zone__input">
            </div>           
                <h5 id="name" style="margin-left: 50%; margin-top:-30%;">Name</h5>
                <p id="parent" style="margin-left: 50%;">Parent's Name</p>
                <p id="address" style="margin-left: 50%;">Address</p>
                <p id="birthday" style="margin-left: 50%;">Birthday</p>
                <p id="motto" style="margin-left: 50%;">Motto</p>
            </div>        
                <label class="prev" for="checkbox-page1"><i class="fas fa-chevron-left"></i></label>
            </div>
        </div>
        <div class="page" id="page2">
            <div class="front-page">
                <div id="editor">
                <div class="drop-zone" style="margin-left: 5%; margin-top:5%;">
		            <span class="drop-zone__prompt">click image to upload</span>
		            <input type="file" name="myFile" class="drop-zone__input">
            </div>           
                <h5 id="name" style="margin-left: 50%; margin-top:-35%;">Name</h5>
                <p id="parent" style="margin-left: 50%;">Parent's Name</p>
                <p id="address" style="margin-left: 50%;">Address</p>
                <p id="birthday" style="margin-left: 50%;">Birthday</p>
                <p id="motto" style="margin-left: 50%;">Motto</p>

                <div class="drop-zone" style="margin-left: 5%; margin-top: 15%;">
		            <span class="drop-zone__prompt">click image to upload</span>
		            <input type="file" name="myFile" class="drop-zone__input">
            </div>           
                <h5 id="name" style="margin-left: 50%; margin-top:-30%;">Name</h5>
                <p id="parent" style="margin-left: 50%;">Parent's Name</p>
                <p id="address" style="margin-left: 50%;">Address</p>
                <p id="birthday" style="margin-left: 50%;">Birthday</p>
                <p id="motto" style="margin-left: 50%;">Motto</p>
            </div>        
                <label class="next" for="checkbox-page2"><i class="fas fa-chevron-right"></i></label>
            </div>
            <div class="back-page">
                 <div id="editor">
                <div class="drop-zone" style="margin-left: 5%; margin-top:5%;">
		            <span class="drop-zone__prompt">click image to upload</span>
		            <input type="file" name="myFile" class="drop-zone__input">
            </div>           
                <h5 id="name" style="margin-left: 50%; margin-top:-35%;">Name</h5>
                <p id="parent" style="margin-left: 50%;">Parent's Name</p>
                <p id="address" style="margin-left: 50%;">Address</p>
                <p id="birthday" style="margin-left: 50%;">Birthday</p>
                <p id="motto" style="margin-left: 50%;">Motto</p>

                <div class="drop-zone" style="margin-left: 5%; margin-top: 15%;">
		            <span class="drop-zone__prompt">click image to upload</span>
		            <input type="file" name="myFile" class="drop-zone__input">
            </div>           
                <h5 id="name" style="margin-left: 50%; margin-top:-30%;">Name</h5>
                <p id="parent" style="margin-left: 50%;">Parent's Name</p>
                <p id="address" style="margin-left: 50%;">Address</p>
                <p id="birthday" style="margin-left: 50%;">Birthday</p>
                <p id="motto" style="margin-left: 50%;">Motto</p>
            </div>        
                <label class="prev" for="checkbox-page2"><i class="fas fa-chevron-left"></i></label>
            </div>
        </div>
        <div class="page" id="page3">
            <div class="front-page">
                <h2>Page 3</h2>
                <p>Christine villaber</p>
            </div>
        </div>
        <div class="back-cover"></div>

 <script>
    const editBtn = document.getElementById("editBtn");
      const editables = document.querySelectorAll("#name, #parent, #address, #birthday, #motto");
      if (typeof Storage !== "undefined") {
        if (localStorage.getItem("name") !== null) {
          editables[0].innerHTML = localStorage.getItem("name");
        }

        if (localStorage.getItem("parent") !== null) {
          editables[1].innerHTML = localStorage.getItem("parent");
        }

        if (localStorage.getItem("address") !== null) {
          editables[2].innerHTML = localStorage.getItem("address");
        }
        if (localStorage.getItem("birthday") !== null) {
          editables[3].innerHTML = localStorage.getItem("birthday");
        }
        if (localStorage.getItem("motto") !== null) {
          editables[4].innerHTML = localStorage.getItem("motto");
        }
      }
      editBtn.addEventListener("click", function (e) {
        if (!editables[0].isContentEditable) {
          editables[0].contentEditable = "true";
          editables[1].contentEditable = "true";
          editables[2].contentEditable = "true";
          editables[3].contentEditable = "true";
          editables[4].contentEditable = "true";
          editBtn.innerHTML = "Save Changes";
          editBtn.style.backgroundColor = "#6F9";
        } else {
          // Disable Editing
          editables[0].contentEditable = "false";
          editables[1].contentEditable = "false";
          editables[2].contentEditable = "false";
          editables[3].contentEditable = "false";
          editables[4].contentEditable = "false";
          // Change Button Text and Color
          editBtn.innerHTML = "Enable Editing";
          editBtn.style.backgroundColor = "#F96";
          // Save the data in localStorage
          for (var i = 0; i < editables.length; i++) {
            localStorage.setItem(
              editables[i].getAttribute("id"),
              editables[i].innerHTML
            );
          }
        }
      });
      document.addEventListener("keydown", function (e) {
        for (var i = 0; i < editables.length; i++) {
          localStorage.setItem(
            editables[i].getAttribute("id"),
            editables[i].innerHTML
          );
        }
      });
      document.querySelector("#addh1").addEventListener("click", function (e) {
        const text = prompt(
          "What text do you want the heading to have?",
          "Heading"
        );
        editables[2].innerHTML = editables[2].innerHTML + `<h1>${text}</h1>`;
      });
      document.querySelector("#addh2").addEventListener("click", function (e) {
        const text = prompt(
          "What text do you want the heading to have?",
          "Heading"
        );
        editables[2].innerHTML = editables[2].innerHTML + `<p>${text}</p>`;
      });
 </script> 


 <script>
 document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
	const dropZoneElement = inputElement.closest(".drop-zone");
   

	dropZoneElement.addEventListener("click", (e) => {
		inputElement.click();
	});

	inputElement.addEventListener("change", (e) => {
		if (inputElement.files.length) {
			updateThumbnail(dropZoneElement, inputElement.files[0]);
		}
	});

	dropZoneElement.addEventListener("dragover", (e) => {
		e.preventDefault();
		dropZoneElement.classList.add("drop-zone--over");
	});

	["dragleave", "dragend"].forEach((type) => {
		dropZoneElement.addEventListener(type, (e) => {
			dropZoneElement.classList.remove("drop-zone--over");
		});
	});

	dropZoneElement.addEventListener("drop", (e) => {
		e.preventDefault();

		if (e.dataTransfer.files.length) {
			inputElement.files = e.dataTransfer.files;
			updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
		}

		dropZoneElement.classList.remove("drop-zone--over");
	});
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
	let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

	// First time - remove the prompt
	if (dropZoneElement.querySelector(".drop-zone__prompt")) {
		dropZoneElement.querySelector(".drop-zone__prompt").remove();
	}

	// First time - there is no thumbnail element, so lets create it
	if (!thumbnailElement) {
		thumbnailElement = document.createElement("div");
		thumbnailElement.classList.add("drop-zone__thumb");
		dropZoneElement.appendChild(thumbnailElement);
	}

	thumbnailElement.dataset.label = file.name;

	// Show thumbnail for image files
	if (file.type.startsWith("image/")) {
		const reader = new FileReader();

		reader.readAsDataURL(file);
		reader.onload = () => {
			thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
		};
	} else {
		thumbnailElement.style.backgroundImage = null;
	}
}

</script>   

</body>
   
</html>


@else
<script>
    window.location="{{ route('admin-login')}}"
</script>
@endif