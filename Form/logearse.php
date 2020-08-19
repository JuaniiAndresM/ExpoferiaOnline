<?php
include 'conexion.php';
if(isset($_POST['user']) && $_POST['contra']){
        $sql = "SELECT * FROM usuario WHERE Usuario = '".$_POST['user']."'";
        $result = $mysqli -> query($sql);
        $ss = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if ($result) {
                if($ss["contraseña"]==$_POST['contra']){
                        session_start();
                        $_SESSION['usuario']=$_POST['user'];
                        header('Location: ../index.html');
               
        }else{ 
                header("Location: ../Form/login.html");            
                echo '<script language="javascript">alert("El usuario o la contra esta mal!");</script>';
        }
}
}
?>