<?php
    session_start();
    include('dbConnect.php');

    if(isset($_POST['submit'])){
        $image =  $_FILES['image']['name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $image_loc = $_FILES['image']['tmp_name'];
        $image_store = "../events_img/".$image;

        $name = $_POST['name'];
        $description = $_POST['description'];
        $company = $_POST['company'];
        $venue = $_POST['venue'];
        $strt_date = date('Y-m-d', strtotime($_POST['strt_date']));
        $end_date = date('Y-m-d', strtotime($_POST['end_date']));

        
        if(isset($_SESSION['org_id'])){
            $org_id = $_SESSION['org_id'];
        
            
 
        $insert = $mysqli->query("INSERT INTO events(org_id, name, description, company, venue, start_date, end_date, img) VALUES ('$org_id', '$name', '$description', '$company', '$venue', '$strt_date', '$end_date', '$image')");
        
        move_uploaded_file($image_loc, $image_store);

        if($insert){
            $select = $mysqli->query("SELECT * FROM events WHERE org_id = '$org_id'")
                or die("Failed to query database" .mysql_error());
                $row = mysqli_fetch_array($select);
                
                $hold = "";
               
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
                
                    $_SESSION['display'] = $display_all;
                    header("Location: ../orgpage.php");    
        }else{
            echo "insert failed";
        }
    }
}

?>