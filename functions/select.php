<?php
    session_start();
    include('dbConnect.php');
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        
            $username = $mysqli->real_escape_string($username);
            $password = $mysqli->real_escape_string($password);

            $password = md5($password);
            
            $select = $mysqli->query("SELECT * FROM organizer_accounts WHERE username = '$username' and password = '$password'")
            or die("Failed to query database" .mysql_error());

            $row = mysqli_fetch_array($select);
            if ($row['username'] == $username && $row['password'] == $password && $row['verified'] == 1) {
                $_SESSION['org_id'] = $row['id'];
                $id = $row['id'];
                if($row['flag'] == 0){
                    $update = $mysqli->query("UPDATE organizer_accounts SET flag='1' WHERE id='$id'");

                    header("Location: ../personal_info.php");
                }else{
                    header("Location: ../orgpage.php");
                }
                exit();
            }elseif($row['username'] != $username && $row['password'] != $password){
                $_SESSION['error'] = 'Incorrect username and password';
                header("Location: ../login.php");
                exit();
            }elseif($row['username'] == $username && $row['password'] == $password && $row['verified'] == 0){
                $_SESSION['error'] = 'Account is not yet verified';
                header("Location: ../login.php");
                exit();
            }
 
    }
?>