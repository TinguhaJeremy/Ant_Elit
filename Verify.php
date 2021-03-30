<?php
include('functions/dbConnect.php');

$vkey =mysqli_real_escape_string($mysqli, $_GET['vkey']);
$update = $mysqli->query("UPDATE organizer_accounts SET verified='1' WHERE vkey='$vkey'");

if($update){
    echo "true";
}else{
    echo "false";
}
?>

<head>

</head>
<body>
    
    
</body>
<p>Your account has been verified.</p>
<a href="login.php">Click here to Login</a>
