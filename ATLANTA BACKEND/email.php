<?php
header('Access-Control-Allow-Origin: *');


$hello = $_POST['mail'];
echo $hello;

    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;
    
    // require 'vendor/autoload.php';
    
    // $mail = new PHPMailer(true);
    
    // try {
    //     //Server settings
    //     $mail->SMTPDebug = 0;                      //Enable verbose debug output
    //     $mail->isSMTP();                                            //Send using SMTP
    //     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    //     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //     $mail->Username   = 'your_email@gmail.com';                     //SMTP username
    //     $mail->Password   = 'your_password';                               //SMTP password
    //     $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    //     $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
    //     //Recipients
    //     $mail->setFrom('from@example.com', 'Mailer');
    //     $mail->addAddress('jane@example.com', 'Joe User');     //Add a recipient
    //     $mail->addReplyTo('info@example.com', 'Information');
    
    //     //Content
    //     $mail->isHTML(true);                                  //Set email format to HTML
    //     $mail->Subject = 'Here is the subject';
    //     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    //     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    //     $mail->send();
    //     echo 'Message has been sent';
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // }
    ?>
 