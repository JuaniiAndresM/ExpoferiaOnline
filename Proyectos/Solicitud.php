
<?php

include 'verificosesion.php';
include '../Form/conexion.php';

echo "<script>alert('Espere un segundo...')</script>";
  
if(isset($_POST['aprobar'])){
    
    $sql = "SELECT * FROM solicitud_usuario WHERE idSoli_Usuario = '".$_POST['aprobar']."'";
    $result = $mysqli -> query($sql);
    $sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    $insert_row = $mysqli->query("INSERT INTO usuario (TipoUsuario,Usuario,Password, Nombre, Apellido, Email) VALUES ('2','".$sqlsolicitudes['Usuario']."','".$sqlsolicitudes['Password']."','".$sqlsolicitudes['Nombre']."','".$sqlsolicitudes['Apellido']."','".$sqlsolicitudes['Email']."')");
    
    if($insert_row){
    $sql = "SELECT * FROM usuario WHERE Usuario = '".$sqlsolicitudes['Usuario']."'";
    $result = $mysqli -> query($sql);
    $sqlusuario= mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        $insert_row = $mysqli->query("INSERT INTO datosProyecto (Year,Titulo,Alumno_Responsable, Estado, Orientacion) VALUES ('".$sqlsolicitudes['Year']."','".$sqlsolicitudes['Titulo_Proyecto']."','".$sqlusuario['idUsuario']."','0','".$sqlsolicitudes['Orientacion']."')");

        if($insert_row){
        $sql = "SELECT * FROM datosProyecto WHERE Titulo = '".$sqlsolicitudes['Titulo_Proyecto']."'";
        $result = $mysqli -> query($sql);
        $sqlID= mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            $path = "../img/PROYECT".$sqlID['idProyecto']."";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);

                $sql = "SELECT * FROM solicitud_usuario WHERE idSoli_Usuario = '".$_POST['aprobar']."'";
                $result = $mysqli -> query($sql);
                $sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $address=$sqlsolicitudes['Email'];
                $subject='Solicitud de proyecto aprobado';
                $body='Queremos informarle que su solicitud del proyecto '.$sqlsolicitudes['Titulo_Proyecto'].' fue aprobado. Saludos';
                // Enviar email
                include 'EnviarEmail.php';
                // sigue mi programa.
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
  
    if(isset($_POST['rechazado'])){
    
    $sql = "SELECT * FROM solicitud_usuario WHERE idSoli_Usuario = '".$_POST['rechazado']."'";
    $result = $mysqli -> query($sql);
    $sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC);   


    $address=$sqlsolicitudes['Email'];         
    $subject='Solicitud de proyecto rechazado';
    $body=$_POST['comentario'];
    // 
    echo "antes de enviar email";
    include 'EnviarEmail.php';


    $sql = "DELETE FROM solicitud_usuario WHERE idSoli_Usuario ='".$_POST['rechazado']."'";
    $mysqli -> query($sql);
    echo "luego de";
    header("Location: Admin.php ");
    }
} 

if(isset($_POST['aprobadoPROF'])){
    
    $sql = "SELECT * FROM solicitud_profesor WHERE idSoliProf = '".$_POST['aprobadoPROF']."'";
    $result = $mysqli -> query($sql);
    $sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    $insert_row = $mysqli->query("INSERT INTO usuario (TipoUsuario,Usuario,Password, Nombre, Apellido, Email) VALUES ('1','".$sqlsolicitudes['Usuario']."','".$sqlsolicitudes['Password']."','".$sqlsolicitudes['Nombre']."','".$sqlsolicitudes['Apellido']."','".$sqlsolicitudes['Email']."')");
    
    if($insert_row){
                $sql = "SELECT * FROM solicitud_profesor WHERE idSoliProf = '".$_POST['aprobadoPROF']."'";
                $result = $mysqli -> query($sql);
                $sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $address=$sqlsolicitudes['Email'];
                $subject='Solicitud de proyecto aprobado';
                $body='Queremos informarle que su solicitud del usuario '.$sqlsolicitudes['Usuario'].' fue aprobado. Saludos, Alumnos de segundo Informatica.';
                // Enviar email
                include 'EnviarEmail.php';
                // sigue mi programa.
                $sql = "DELETE FROM solicitud_profesor WHERE idSoliProf ='".$_POST['aprobadoPROF']."'";
                $mysqli -> query($sql);
                header("Location: Admin.php ");
    }else{
     echo "'Error : ('. $mysqli->errno .') '. $mysqli->error'";
    }
    
}else{

    if(isset($_POST['noaprobadoPROF'])){
    
        $sql = "SELECT * FROM solicitud_profesor WHERE idSoliProf = '".$_POST['noaprobadoPROF']."'";
        $result = $mysqli -> query($sql);
        $sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC);   
    
    
        $address=$sqlsolicitudes['Email'];         
        $subject='Solicitud de usuario rechazado';
        $body=$_POST['comentarioPROF'];
        // 
        echo "antes de enviar email";
        include 'EnviarEmail.php';
    
    
        $sql = "DELETE FROM solicitud_profesor WHERE idSoliProf ='".$_POST['noaprobadoPROF']."'";
        $mysqli -> query($sql);
        echo "luego de";
        header("Location: Admin.php ");
        }

}

?>