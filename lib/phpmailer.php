<?php
//goi thu vien
    include 'PHPMailer/class.smtp.php';
    include "PHPMailer/class.phpmailer.php"; 
    
function sendMail($title, $subject, $content, $nTo, $mTo){
    $nFrom = $title;
    $mFrom = 'xxxxxxxxxxxxx@gmail.com';  //dia chi email cua ban 
    $mPass = 'xxxxxxxxxxxxxxxxx';       //mat khau email cua ban
    $mail             = new PHPMailer();
    $body             = $content;
    $mail->IsSMTP(); 
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";        
    $mail->Port       = 465;
    $mail->Username   = $mFrom;  // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->SetFrom($mFrom, $nFrom);
    $mail->Subject    = $subject;
    $mail->MsgHTML($body);
    $address = $mTo;
    $mail->AddAddress($address, $nTo);
    $mail->AddReplyTo('megashopnick@gmail.com', 'MegaShopNick.Com');
    if(!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}

?>