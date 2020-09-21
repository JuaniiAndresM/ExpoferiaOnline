
<?php
include '..\Form\conexion.php';

if(isset($_POST['aprobar'])){
    
    //esto todavia no funciona 
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
                //aca se mandaria el mail defaul de cuando se aprueba un proyecto
                $sql = "DELETE FROM solicitud_usuario WHERE idSoli_Usuario ='".$_POST['aprobar']."'";
                $mysqli -> query($sql);
                header("Location: Admin.html ");
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
     //aca se mandaria el mail con el comentario que se manda por post de porque no se aprobo el proyecto
    $sql = "DELETE FROM solicitud_usuario WHERE idSoli_Usuario ='".$_POST['rechazado']."'";
    $mysqli -> query($sql);
    header("Location: Admin.html ");
}


?>