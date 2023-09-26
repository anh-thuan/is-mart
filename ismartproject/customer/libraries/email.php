<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


function send_mail($sent_to_email, $sent_to_fullname, $subject, $content, $option = array()){
    global $config;
    $config_email = $config['email'];
    $mail = new PHPMailer(true);


    try {
        // Server settings
        $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                            // Send using SMTP
        $mail->Host = $config_email['smtp_host'];   // Set the SMTP server to send through
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = $config_email['smtp_user']; // SMTP username
        $mail->Password = $config_email['smtp_pass']; // SMTP password
        $mail->SMTPSecure = $config_email['smtp_secure']; // Enable implicit TLS encryption
        $mail->Port = $config_email['smtp_port'];   // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $mail->CharSet = 'UTF-8';

        // Recipients
        $mail->setFrom($config_email['smtp_user'], $config_email['smtp_fullname']);
        $mail->addAddress($sent_to_email, $sent_to_fullname); // Add a recipient
        $mail->addReplyTo($config_email['smtp_user'], $config_email['smtp_fullname']);

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $content;

        $mail->send();
        // return true;
        echo "Gửi thành công";
    } catch (Exception $e) {
        echo 'Email không gửi được: ' . $mail->ErrorInfo;
    }
}