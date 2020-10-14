<?php
include 'verificosesion.php';
include '../Form/conexion.php';

            $sql = "SELECT TipoUsuario, idUsuario FROM usuario where usuario='". $_SESSION['Usuario']."'";
            $result = $mysqli -> query($sql);
            $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $idUS = $ss['idUsuario'];
            if(isset($ss['TipoUsuario'])){ 
              if($ss['TipoUsuario']==2){
                $gest1 = "display: none;";
                $gest2 = "display: none;";
              } }

                if($ss['TipoUsuario'] == 1){
                  //profesor
                $sql2 = "SELECT idProyecto FROM proyectoProfesor where idProfesor='".$idUS."'";
                $result = $mysqli->query($sql2);
                $idproyect = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $Proyectoid = $idp['idProyecto'];

                $sql3 = "SELECT idProyecto, Titulo, ImagenPrincipal FROM datosProyecto WHERE idProyecto ='".$Proyectoid."'";
                $results = $mysqli->query($sql3);

              }else{  
                //alumno
                if($ss['TipoUsuario'] == 2){
                $sql4 = "SELECT idProyecto, Titulo, ImagenPrincipal FROM datosProyecto WHERE Alumno_Responsable ='".$idUS."'";
                $results = $mysqli->query($sql4);
              }else{
                //admin
                $sql5 = "SELECT idProyecto, Titulo, ImagenPrincipal FROM datosProyecto";
                $results = $mysqli->query($sql5);
              }
              }
    
    $content = '';

     while($row = $results->fetch_array()){

         $content.="<div class='ProyectoLista'>
                    <img class='PanelProyecto' src='".$row['ImagenPrincipal']."'>
                    <br/>

                    <p>".$row['Titulo']."</p>
                    <hr/>
                    <ul class='panelList'>
                    <li>
                        <button class='botonPanel' id = '1' onclick='mandarID(".$row['idProyecto'].")'>
                            <i class='fa'>&#xf044;</i> Editar Proyecto
                        </button></a>
                    </li>
                    </ul>
                </div>";


                        
     }
     echo $content;
    ?>
