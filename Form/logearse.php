<?php
include 'conexion.php';

if(isset($_POST['user']) && $_POST['contra']){
        $sql = "SELECT * FROM usuario WHERE Usuario = '".$_POST['user']."'";
        $result = $mysqli -> query($sql);
        $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($result) {
                if (isset($ss['Password'])){
                        if($ss['Password']==$_POST['contra']){
                        session_start();
                        $_SESSION['Usuario']=$_POST['user'];
                        header('Location: ../Proyectos/Panel.php');
                        }else{ 
                                header('Location: ../Form/login.php?eP');
                }
                         }else{ 
                                header('Location: ../Form/login.php?eP');
                }
                }
}


?>