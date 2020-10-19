
<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.expoeduca.liceoiep.edu.uy';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@expoeduca.liceoiep.edu.uy';            // SMTP username
    $mail->Password   = 'expoeduca4545';                          // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->CharSet = 'UTF-8';
    $mail->setFrom("info@expoeduca.liceoiep.edu.uy");
    $mail->addAddress($address);             // Add a recipient

    // Content 
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();

    echo "Email enviado !";
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}

?>