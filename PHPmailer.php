<?php
// include('smtp/PHPMailerAutoload.php');
// $html='Msg';
// echo smtp_mailer('your email','subject',$html);
// function smtp_mailer($to,$subject,$msg){
    //$mail = new PHPMailer();
    $mail->SMPTDebug = 3;
    $mail->IsSMTP();
    $mail->SMTPAuth=true;
    $mail->SMTPSecure = 'tls';
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->IsHTML(true);
    $mail->Charset='UTF-8';
    $mail->Username="your email";
    $mail->Password = "passowrd";
    $mail->SetFrom("your email");
    $mail->Subject = $Subject;
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
        return 'sent';
    }
//}
    