
<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'expoferiaiep@gmail.com';            // SMTP username
    $mail->Password   = 'expoferia';                          // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->CharSet = 'UTF-8';
    $mail->setFrom("expoferiaiep@gmail.com");
    $mail->addAddress($address);             // Add a recipient

    // Content 
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = "<div class='Linea1Mail' style='width: 500px; background-color: #ffcb00; border-radius: 25px;'>
                        <div class='Linea2Mail' style='margin-right: 1%; background-color: #008ac4; border-radius: 25px;'>
                            <div class='Linea3Mail' style='margin-right: 1%; background-color: #5aac29; border-radius: 25px;'>
                                <div class='mail-wrapper' style='background-color: #0b375f; margin-right: 1%; border-radius: 25px; text-align: center; color: white;'>
                                    <img class='foto-mail' style='margin: 2% 5%; width: 450px;' src='https://i.postimg.cc/437VWt7t/Logo.png'>
                                    <div class='mail-body' style='margin: 0 20%;'>
                                        <hr style='background-color: white;'>
                                        <p>$body</p>
                                        <hr style='background-color: white;'>
                                    </div>
                                    <div class='footer-mail' style='background-color: #2c3138; width: 100%; border-radius: 0 0 20px 20px; color: white; text-align: center;'>
                                        <img class='foto-mail-iep' style='margin: 2% 2%; width: 250px;' src='https://i.postimg.cc/zfVS46My/logo-iep.png'>
                                        <div class='footer-text'>
                                            <p style='color: rgb(219, 219, 219); padding-bottom: 2%;'>Expoeduca Online | Liceo IEP<br>
                                            info@expoeduca.liceoiep.edu.uy</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";

    $mail->send();

    echo "Email enviado !";
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}

?>