<?php
    session_start();
    include('dbConnect.php');

    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $company = $_POST['company'];
        $phoneNumber = $_POST['phoneNumber'];
        $gender = $_POST['gender'];

        
        if(isset($_SESSION['org_id'])){
            $org_id = $_SESSION['org_id'];

                $insert = $mysqli->query("INSERT INTO org_account_info(org_id, firstname, middlename, lastname, company, phoneNumber, gender) VALUES ('$org_id', '$firstname', '$middlename', '$lastname', '$company', '$phoneNumber', '$gender')");
                
                if($insert){
                    $select = $mysqli->query("SELECT * FROM org_account_info WHERE org_id = '$org_id'")
                        or die("Failed to query database" .mysql_error());
                        $row = mysqli_fetch_array($select);
                        if($select){        
                            header("Location: ../orgpage.php"); 
                        }
                        else{
                            echo "Selection failed";
                        }           
                }else{
                    echo "insert failed";
                }
        }
}

?>