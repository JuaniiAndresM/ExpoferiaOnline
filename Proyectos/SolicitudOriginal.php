
<?php
//include '..\Form\conexion.php';
$mysqli = new mysqli('localhost','expoeduc_informatica2','LiceoIep_2020_2do_Inf','expoeduc_expoeduca');


//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
 
if(isset($_POST['aprobar'])){
    
    $sql = "SELECT * FROM solicitud_usuario WHERE idSoli_Usuario = '".$_POST['aprobar']."'";
    $result = $mysqli -> query($sql);
    $sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    $insert_row = $mysqli->query("INSERT INTO usuario (TipoUsuario,Usuario,Password, Nombre, Apellido) VALUES ('2','".$sqlsolicitudes['Usuario']."','".$sqlsolicitudes['Password']."','".$sqlsolicitudes['Nombre']."','".$sqlsolicitudes['Apellido']."')");
    
    if($insert_row){
    $sql = "SELECT * FROM usuario WHERE Usuario = '".$sqlsolicitudes['Usuario']."'";
    $result = $mysqli -> query($sql);
    $sqlusuario= mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        $insert_row = $mysqli->query("INSERT INTO datosProyecto (Year,Titulo,Alumno_Responsable, Estado, Orientacion) VALUES ('".$sqlsolicitudes['Year']."','".$sqlsolicitudes['Titulo_Proyecto']."','".$sqlusuario['idUsuario']."','0','".$sqlsolicitudes['Orientacion']."')");

        if($insert_row){
        $sql = "SELECT * FROM datosProyecto WHERE Titulo = '".$sqlsolicitudes['Titulo_Proyecto']."'";
        $result = $mysqli -> query($sql);
        $sqlID= mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            $path = "..\img\PROYECT".$sqlID['idProyecto']."";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);

                $sql = "SELECT * FROM solicitud_usuario WHERE idSoli_Usuario = '".$_POST['aprobar']."'";
                $result = $mysqli -> query($sql);
                $sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC);

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
                    $mail->addAddress($sqlsolicitudes['Email']);             // Add a recipient

                    // Content
                    $mail->isHTML(true);                                        // Set email format to HTML
                    $mail->Subject = 'Aprobado';
                    $mail->Body    = 'Buenos dias queremos informarle que se a aprobado su solicitud';
                   
                    $mail->send();
                    
                } catch (Exception $e) {
                    echo "Error al enviar: {$mail->ErrorInfo}";
                }

                $sql = "DELETE FROM solicitud_usuario WHERE idSoli_Usuario ='".$_POST['aprobar']."'";
                $mysqli -> query($sql);
                header("Location: Admin.php ");
            }else{
                echo 'Error al crear proyecto';
            }
        }else{
            echo "Error : ('. $mysqli->errno .') '. $mysqli->error'";
        }
    }else{
     echo "'Error : ('. $mysqli->errno .') '. $mysqli->error'";
    }
}else{
  

     $sql = "SELECT * FROM solicitud_usuario WHERE idSoli_Usuario = '".$_POST['rechazado']."'";
     $result = $mysqli -> query($sql);
     $sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC);   

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
        $mail->addAddress($sqlsolicitudes['Email']);             // Add a recipient
 
        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Rechazado';
        $mail->Body    = $_POST['comentario'];//CORREGIDO POR EL PROFESOR, AQUÍ TENÍA UNA C MAYÚSCULA

        $mail->send();
    } catch (Exception $e) {
        echo "Error al enviar: {$mail->ErrorInfo}";
    }
    echo "antes de";
    $sql = "DELETE FROM solicitud_usuario WHERE idSoli_Usuario ='".$_POST['rechazado']."'";
    $mysqli -> query($sql);
    echo "luego de";
    header("Location: ../HeaderFooter/index.html ");
} 

?>