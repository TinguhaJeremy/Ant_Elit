<?php
session_start();
include('functions/dbConnect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/orgPage.css">
    </head>
    <body>
        <div class="bar">
            <div class="logo">
                <img src="img/logo.png">

            </div>
            <ul>
                <li><a href="createEvent.php">Create Event</a></li>
                <li><a href="index.html">Log out</a></li>
            </ul>
        

        <div id="menubar" class="container" onclick="menu()">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <div id="x" onclick="back()">Back</div>
       
    </div>
    
        <div id="container2" class="con">
            
            <a href="createEvents.html">Create Event</a>
            <a href="index.html">Log out</a>
        </div>

    <header>
        <div class="formBox">
            <div class="cover">
                <img src="" id="cover-img">
                <input type="file" name="C-upload" id="button-cover">

                <div class="profile-con">
                    <img src="" id=profile>
                    <input type="file" name="profile" id="button-profile">
                </div>   
            </div>
            
            
            <?php
                if(isset($_SESSION['display']) && ($_SESSION['display']) != ""){
                    echo $_SESSION['display'];
                    $hold = $_SESSION['display'];
                    
                }elseif(isset($_SESSION['org_id'])){
                    $org_id = $_SESSION['org_id'];
                    $hold = "";

                    $select_name = $mysqli->query("SELECT * FROM org_account_info WHERE org_id ='$org_id'")
                    or die("Failed to query database" .mysql_error());
                    $row = mysqli_fetch_array($select_name);
                    echo "<h1>". $row['firstname'] . " " . $row['lastname'] ."</h1>";

                    $select = $mysqli->query("SELECT * FROM events WHERE org_id ='$org_id'")
                    or die("Failed to query database" .mysql_error());
                    $row = mysqli_fetch_array($select);
                   
                    if(mysqli_num_rows($select) == 0){
                        echo "No Event";
                        exit();                        
                    }else{
                       
                        do{
                            $new_event = "<section>
                            <h2>".$row['name']."</h2>
                            <h3>Description</h3>
                            <p>".$row['description']."</p>
                            <a href='start_event.php?id=$row[id]'><button>Start Event</button></a>
                            <a href='check_events.html'><button>Edit</button></a>
                            <a href='check_events.html'><button>Add Sub-Event</button></a>
                            <a href='result.html'><button>View Result</button></a>
                            <a href='result.html'><button>Delete</button></a>
                            </section>";             
                                
                            $hold = $new_event . $hold;
                            $display_all = $hold;
                            $row1 = $row['id'];
                        }while($row = mysqli_fetch_array($select));
                            
                        echo $display_all;
                    }                 
                        
                }
            ?>
            
        </div>
        
        <footer>
            <a href="#"><img src="icons/fb.png"></a>
            <a href="#"><img src="icons/insta.png"></a>
            <a href="#"><img src="icons/twitter.png"></a>
        </footer>
    </header>
<script>

    var a = document.getElementById("container2");
    var b = document.getElementById("menubar")
    var c = document.getElementById("x")

    function menu(){
        if(a.style.left = "-100%"){
            a.style.left = "0%";
            b.style.display = "none";
            c.style.display = "block";
        }
     }

     function back(){
         if(c.style.display = "block"){
            a.style.left = "-100%";
            b.style.display = "block";
            c.style.display = "none";

         }
     }

     let img = document.getElementById("cover-img")
     let button = document.getElementById("button-cover")

     button.addEventListener("change", function(){
        if(this.files[0].type != "image/jpeg" &&  this.files[0].type != "image/png" && this.files[0].type != "image/gif"){
            alert("Sorry invalid file type. Please upload an image");
        }
        else{
            img.style.display = "block"
            img.src = URL.createObjectURL(this.files[0])
        }

     })

     let profile = document.getElementById("profile")
     let btn = document.getElementById("button-profile")

     btn.addEventListener("change", function(){
        if(this.files[0].type != "image/jpeg" &&  this.files[0].type != "image/png" && this.files[0].type != "image/gif"){
            alert("Sorry invalid file type. Please upload an image");
        }
        else{
            profile.style.display = "block"
            profile.src = URL.createObjectURL(this.files[0])
        }

     })
     
</script>

    </body>
</html>