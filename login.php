<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>E-Judging</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/orgportal.css">
    </head>
    <body>
            
            <div class="bar">
                <div class="logo">
                    <img src="img/logo.png">

                </div>
                
                <ul>
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">About</a></li>
                </ul>

            <div id="menubar" class="container" onclick="menu()">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <div id="x" onclick="back()">Back</div>
            </div>
           
            
            <div id="container2" class="con">
                
                <a href="#" class="active">Home</a>
                <a href="#">Events</a>
                <a href="#">Feature</a>
                <a href="#">About</a>
            </div>

        <header> 

       

        </div>
        
            <div class="formBox">
            <div>
           
        </div>
                <div class="btnBox">
                    <div id="btn"></div>
                    <span class="head2">LOGIN FORM</span>
                </div>
                <div class="logo2">
                    <img src="img/logo.png">
                </div>
                <form action="functions/select.php" method="POST" id="login" class=inputs>
                    <input type="text" class="txtbox" placeholder="Username" name="username" required>
                    <input type="password" class=txtbox placeholder="Password" name="password" required>
                    <a href="#" class="forgot">Forgot Password?</a>
                    <div id="error">
                    <?php
                    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                        echo $_SESSION['error'];
                    }
                        session_destroy();
                    ?>
                    </div>
                    <input type="SUBMIT" name="submit" value="Log in" class="btnLog">
                    <p class= "c">Not a member? <a href="signup.php" class="d">Sign up here</a></p>
                </form>
                   
                </form>
            </div>
          
        </header>

        
                        
        <footer>
            <a href="#"><img src="icons/fb.png"></a>
            <a href="#"><img src="icons/insta.png"></a>
            <a href="#"><img src="icons/twitter.png"></a>
        </footer>
        
        <script>
            

                var X = document.getElementById("container2");
                var Y = document.getElementById("menubar");
                var Z = document.getElementById("x");

                function menu(){
                    if(X.style.left = "-100%"){
                        X.style.left = "0%";
                        Y.style.display = "none";
                        Z.style.display = "block";
                    }
                }

                function back(){
                    if(Z.style.display = "block"){
                        X.style.left = "-100%";
                        Y.style.display = "block";
                        Z.style.display = "none";

                    }
                }
              
            
            
        </script>
    </body>
</html>