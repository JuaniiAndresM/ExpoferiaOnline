<?php
include 'conexion.php';

if(isset($_POST['user']) && $_POST['contra']){
        $sql = "SELECT * FROM contacto WHERE Usuario = '".$_POST['user']."'";
        $result = $mysqli -> query($sql);
        $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($result) {
                if (isset($ss['Password'])){
                        if($ss['Password']==$_POST['contra']){
                        session_start();
                        $_SESSION['Usuario']=$_POST['user'];
                        header('Location: ../index.html');
                        }
                         }else{ 
                                echo "<script>
                                alert('El usuario o la contraseña están mal!');
                                window.location.href='../Form/login.html';
                                </script>";    
                }
                }
}


?>