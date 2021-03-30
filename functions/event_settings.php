<?php
    session_start();
    include('dbConnect.php');

    if(isset($_POST['submit'])){

       
       // $event_id =mysqli_real_escape_string($mysqli, $_GET['id']);
       // echo $event_id;
            if(isset($_SESSION['org_id'])){
            $org_id = $_SESSION['org_id'];
            echo $org_id;

            $id =mysqli_real_escape_string($mysqli, $_GET['event']);
            echo $id;
                
            
            
        
/*$data = $_POST;

echo "<pre>";
var_dump($data);
echo "</pre>";
*/
/*            $count_cont = count($_POST['firstname']);
            $count_judge = count($_POST['firstname_j']);
            $count_crit = count($_POST['description']);

            for ($a = 0; $a < $count_cont; $a++){
                $insert_cont = $mysqli->query("INSERT INTO contestants(firstname, middlename, lastname) VALUES ('{$_POST['firstname'][$a]}', '{$_POST['middlename'][$a]}', '{$_POST['lastname'][$a]}')");
            }

            for ($b = 0; $b < $count_judge; $b++){
                $insert_judge = $mysqli->query("INSERT INTO judge(firstname, lastname, email) VALUES ('{$_POST['firstname_j'][$b]}', '{$_POST['lastname_j'][$b]}', '{$_POST['email'][$b]}')");
            }

            for ($c = 0; $c < $count_crit; $c++){
                $insert_crit = $mysqli->query("INSERT INTO criteria(description, percent) VALUES ('{$_POST['description'][$c]}', '{$_POST['percent'][$c]}')");
            } */
        }
    }else{
        echo "error";
    }

?>