<?php
include 'verificosesion.php';
include '..\Form\conexion.php';
            $sql = "SELECT TipoUsuario FROM usuario where usuario='". $_SESSION['Usuario']."'";
            $result = $mysqli -> query($sql);
            $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if(isset($ss['TipoUsuario'])){ 
              if($ss['TipoUsuario']==2){
                $gest1 = "display: none;";
                $gest2 = "display: none;";
              } }
              $sqlid = "SELECT idUsuario FROM usuario where usuario='". $_SESSION['Usuario']."'";
                $resultid = $mysqli -> query  ($sqlid);
                $idp = mysqli_fetch_array($resultid, MYSQLI_ASSOC);
                $idproyecto = $idp['idUsuario'];
                
                if($ss['TipoUsuario'] == 1){
                $sql = "SELECT idProyecto FROM proyectoProfesor where Responsable='".$idproyecto."'";
                $result = $mysqli->query($sql);
                $idproyect = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $Proyectoid = $idp['idUsuario'];

                $sql = "SELECT idProyecto, Titulo FROM datosProyecto WHERE idProyecto ='".$Proyectoid."'";
                $results = $mysqli->query($sql);

                $sql = "SELECT * FROM imagenes WHERE idProyecto  ='".$Proyectoid."'";
                $resultI = $mysqli->query($sql);
                $oo =mysqli_fetch_array($resultI, MYSQLI_ASSOC);
                $imgprincipal = $oo['url'];

              }else{  
                
                $sql = "SELECT idProyecto, Titulo FROM datosProyecto WHERE idProyecto ='".$idproyecto."'";
                $results = $mysqli->query($sql);

                $sql = "SELECT * FROM imagenes WHERE idProyecto  ='".$idproyecto."'";
                $resultI = $mysqli->query($sql);
                $oo =mysqli_fetch_array($resultI, MYSQLI_ASSOC);
                $imgprincipal = $oo['url'];
              }
    
    $content = '';

     while($row = $results->fetch_array()){

         $content.="<div class='ProyectoLista'>
                    <img class='PanelProyecto' src='".$imgprincipal."'>
                    <br/>

                    <p>".$row['Titulo']."</p>
                    <hr/>
                    <ul class='panelList'>
                    <li>
                        <button class='botonPanel' id = '1' data-idp='".$row['idProyecto']."'>
                            <i class='fa'>&#xf044;</i> Editar Proyecto
                        </button></a>
                    </li>
                    </ul>
                </div>";


                        
     }
     echo $content;
    ?>
