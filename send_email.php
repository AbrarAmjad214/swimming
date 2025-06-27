<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // or your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'kickonlahore@gmail.com'; // your email
    $mail->Password = 'ybtg rdpc bcxe ygni';    // app password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('kickonlahore@gmail.com', 'Kick-On Football Academy');
    $mail->addAddress('kickonlahore@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'New Player Registration';
    
    ob_start();
    foreach ($_POST as $key => $value) {
        echo "<strong>" . ucfirst(str_replace("_", " ", $key)) . ":</strong> " . htmlspecialchars($value) . "<br>";
    }
    $body = ob_get_clean();

    $mail->Body = $body;

    $mail->send();
    echo "Message sent successfully.";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}