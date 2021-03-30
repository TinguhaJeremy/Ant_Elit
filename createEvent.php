<!DOCTYPE html>
<html lang="en">
    <head>
        <title>E-Judging</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/createEvents.css">
        
    </head>
    <body>

        <div class="bar">
            <div class="logo">
                <img src="img/logo.png">

            </div>
            <ul>
                <li><a onmouseover="subMenu()" onmouseout="subOut()">Category</a>
                    <div class="sub-menu" id="sub" onmouseover="subMenu()" onmouseout="subOut()">
                        <ul>
                            <li><a href="">Singing Contest</a></li>
                            <li><a href="">Beauty Pageant</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="orgpage.html">Cancel</a></li>
            </ul>
        

        <div id="menubar" class="container" onclick="menu()">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <div id="x" onclick="back()">Back</div>
    </div>
        <div id="container2" class="con">
            
            <a href="#">Home</a>
            <a href="#">Log out</a>
        </div>

        <header>
            
            <div class="formBox">
                
            <div class="containerProgress"><br><br>
                <h1>CREATE EVENT</h1><br><br>
               
                <div class="form" id="form">
                    <div class="logo2">
                        <img src="img/logo.png">
                    </div>
                       
                    <form class=inputs action="functions/insert_events.php" method="POST" enctype="multipart/form-data">

                    <div id="details1">
                        <input type="text" class="txtbox" placeholder="Event Name" name="name" required>
                        <textarea rows="5" cols="1" class="desc" placeholder="Description" name="description"></textarea>
                        <input type="text" class="txtbox" placeholder="Organization/Company" name="company" required>
                        <input type="text" class="txtbox" placeholder="Venue" name="venue" required>         
                    </div>            
                    
                   <div id="details2">
                        <p>Start Date:</p>
                        <input type="datetime-local" class="date" name="strt_date" required>
                        <p>End Date:</p>
                        <input type="datetime-local" class="date" name="end_date" required>
                        <div class="picture">
                            <input type="file" name="image" id="pic" >
                            <img src="" id="img">
                        </div>
                        <div id="pictureBtn" onclick="ChoosePhoto()">Choose a photo</div>
                   </div>

                        <input type="submit" name="submit" value="Save" id="submit">
                    </form>
                    </div>
                </div>
            </div>
        
        </header>

        <footer>
            <a href="#"><img src="icons/fb.png"></a>
            <a href="#"><img src="icons/insta.png"></a>
            <a href="#"><img src="icons/twitter.png"></a>
        </footer>

        <script>

            var pictureBtn = document.getElementById("pictureBtn");
            var btn = document.getElementById("pic");

            function ChoosePhoto(){
                btn.click();
            }


            let img = document.getElementById("img");
            let button = document.getElementById("pic");

                button.addEventListener("change", function(){
                    if(this.files[0].type != "image/jpeg" &&  this.files[0].type != "image/png" && this.files[0].type != "image/gif"){
                        alert("Sorry invalid file type. Please upload an image");
                    }
                    else{
                        img.style.display = "block"
                        img.src = URL.createObjectURL(this.files[0])
                    }

                })
            
        </script>
        
    
</html>