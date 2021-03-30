<?php
    session_start();
    include('../smtp/PHPMailerAutoload.php');
    include('dbConnect.php');
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if(strlen($username) < 5){
            $_SESSION['error'] = 'Your username must be atleast 5 characters';
            header("Location: ../signup.php");
            exit();
        }elseif ($password != $password2) {
            $_SESSION['error'] = "Your password do not match";
            header("Location: ../signup.php");
            exit();
        }
        /*elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == TRUE) {
           $_SESSION['error'] = "Invalid Email";
           header("Location: signup.php");
            exit();
        }*/else{
            $username = $mysqli->real_escape_string($username);
            $email = $mysqli->real_escape_string($email);
            $password = $mysqli->real_escape_string($password);
            $password2 = $mysqli->real_escape_string($password2);

            $vkey = md5(time().$username);
  
            $password = md5($password);
            
            $insert = $mysqli->query("INSERT INTO organizer_accounts(username, email, password, vkey) VALUES ('$username', '$email', '$password', '$vkey')");

            if($insert){
                $message = "<a href='http://localhost/Ejudging/Verify.php?vkey=$vkey'>Verify Account";
                smtp_mailer($email, 'Email Verification', $message);           
            }
        }
    }
    function smtp_mailer($to,$subject, $msg){
        $mail = new PHPMailer();
      //$mail->SMTPDebug = 1;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Username = "AntElit2021@gmail.com";
        $mail->Password = "#Rgs40t023310";
        $mail->SetFrom("AntElit2021@gmail.com");
        $mail->Subject = $subject;
        $mail->Body = $msg;
        $mail->AddAddress($to);
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));
        if(!$mail->Send()){
            return 0;
        }else{
            return 1;
        }
    }
?>
<head>
<link href="../css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/email.css">
</head>
<body>
    <div class=formbox>
    <i class="fas fa-5x fa-envelope"></i>
    <p>We have sent an email to </p>
    <strong><?php echo "<div>".$email."</div>"; ?></strong><br>
    <p>Please check to verify your account. Thank you!</p>
</body>