<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail = new PHPMailer;
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;   // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;   // Enable SMTP authentication
    $mail->Username = '******@gmail.com';  // SMTP username
    $mail->Password = 'Dd43056342';    // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->setFrom('******@gmail.com', 'Mailer'); // Add set from id
    $mail->addAddress('******@gmail.com', 'Ravi Hirani');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //$mail->isHTML(true);   // Set email format to HTML

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];

    $mail->Subject = 'Hola este es el asunto del correo';
    $mail->Body    = 'El nombre que se envio fue ' . $nombre . ' y el apellido ' . $apellido;
    $mail->AltBody = "";
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
