<?php

include('smtp/PHPMailerAutoload.php');


   
    $email = $_POST['email'];


$html='msg';
echo smtp_mailer($email, 'subject', $html);


function smtp_mailer($to,$subject, $msg){
    $mail = new PHPMailer();
    $mail->SMTPDebug = 3;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "sbanquerigo@gmail.com";
    $mail->Password = "public_String_CJ(String_JEAN){ME}";
    $mail->SetFrom("sbanquerigo@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if(!$mail->Send()){
        echo $mail->ErrorInfo;

    }else{
        return 'Sent';
    }
}

?>