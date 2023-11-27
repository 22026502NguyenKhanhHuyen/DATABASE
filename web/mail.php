<?php

require 'PHPMailer-master/scr/PHPMailer.php';
require 'PHPMailer-master/scr/SMTP.php';
require 'PHPMailer-master/scr/Exception.php';
require 'PHPMailer-master/scr/OAuth.php';
require 'PHPMailer-master/scr/POP3.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'huyen16102004@gmail.com';                     
    $mail->Password   = 'nguyenhuyen16102004';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 587;                                    
    $mail->setFrom('huyen16102004@gmail.com', 'Hello web');
    $mail->addAddress('joe@example.net', 'Joe User');     
    $mail->addAddress('ellen@example.com');               
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    
    $mail->addAttachment('/var/tmp/file.tar.gz');         
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}