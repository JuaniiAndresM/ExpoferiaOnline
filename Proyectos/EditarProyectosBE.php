<?php
include 'verificosesion.php';
include '../Form/conexion.php';

            $sql = "SELECT TipoUsuario, idUsuario FROM usuario where usuario='". $_SESSION['Usuario']."'";
            $result = $mysqli -> query($sql);
            $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $idUS = $ss['idUsuario'];
            $img = "";

            $content = '';

            if(isset($ss['TipoUsuario'])){ 
              if($ss['TipoUsuario']==2){
                $gest1 = "display: none;";
                $gest2 = "display: none;";
              }  }

                if($ss['TipoUsuario'] == 1){//profesor
                $sql = "SELECT idProyecto FROM proyectoProfesor where idProfesor='".$idUS."'";
                $resultid = $mysqli->query($sql);
                
                while($row = $resultid->fetch_array()){
                  $Proyectoid = $row['idProyecto'];
                  $sql = "SELECT idProyecto, Titulo, ImagenPrincipal FROM datosProyecto WHERE idProyecto ='".$Proyectoid."'";
                  $results = $mysqli->query($sql);

                  while($row = $results->fetch_array()){

                    if(isset($row['ImagenPrincipal'])) {
                      $img = $row['ImagenPrincipal'];
                    }else{
                      $img = "../img/imgError.png";
                    }

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
                           </div>";}
                }
                
                }else{

                if($ss['TipoUsuario'] == 2){//alumno
                  $sql = "SELECT idProyecto, Titulo, ImagenPrincipal FROM datosProyecto WHERE Alumno_Responsable ='".$idUS."'";
                  $results = $mysqli->query($sql);
                }else{
                  if($ss['TipoUsuario'] == 0){//admin
                  $sql = "SELECT idProyecto, Titulo, ImagenPrincipal FROM datosProyecto";
                  $results = $mysqli->query($sql);}
                    }

                  while($row = $results->fetch_array()){

                    if(isset($row['ImagenPrincipal'])) {
                      $img = $row['ImagenPrincipal'];
                    }else{
                      $img = "../img/imgError.png";
                    }

                    $content.="<div class='ProyectoLista'>
                              <img class='PanelProyecto' src='".$img."'>
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
     }
     echo $content;
    ?>