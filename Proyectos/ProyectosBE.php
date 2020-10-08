<?php
include '..\Form\conexion.php';

    $sql = "SELECT idProyecto, Titulo, Introduccion, Orientacion, ndolocal FROM datosProyecto WHERE Estado = 1 order by ndolocal";
    $results = $mysqli->query($sql);
    $content = '';
    $numerolocal = 0;

     while($row = $results->fetch_array()){


        if( $numerolocal!= $row['ndolocal']){

            if($numerolocal>0){
                $content.=" </div>
                            </div>
                            </div>
                            </div> 
                            </div>";
                        }

            $content.=" <div>
                        <div class='Linea1Proyecto'>
                        <div class='Linea2'>
                        <div class='Linea3'>
                        <div class='Proyecto'>
                        <div class='Tabla>";

            $numerolocal = $row['ndolocal'];
            }
            
            $sql = "SELECT Nombre FROM orientaciones WHERE idOrientacion ='".$row['Orientacion']."'";  
            $resultO = $mysqli->query($sql);
            $oo =mysqli_fetch_array($resultO, MYSQLI_ASSOC);
            $orientacion = $oo['Nombre'];

            $sql = "SELECT * FROM imagenes WHERE idProyecto ='".$row['idProyecto']."'";  
            $resultI = $mysqli->query($sql);
            $oo =mysqli_fetch_array($resultI, MYSQLI_ASSOC);
            $imgprincipal = $oo['url'];

            /*
            $sql = "SELECT * FROM imagenes WHERE idProyecto ='".$row['idProyecto']."'";  
            $resultI = $mysqli->query($sql);
            $oo =mysqli_fetch_array($resultI, MYSQLI_ASSOC);
            $imgprincipal = $oo['url'];
            */

        $content.= "<div class='listProyectoLista'>
                    <div class='listGrid'>
                        <div class='listFoto'>
                        <img class='FotoLista' src='".$imgprincipal."'>
                    </div>

                    <div class='textoLista'>
                         <hr id='LineaMobileProyecto' />
                         <h2>".utf8_encode($row['Titulo'])."</h2>
                         <p><b>Grupo:</b> ".utf8_encode($orientacion)." </p>
                         <p>
                           <b>Descripción:</b> ".utf8_encode($row['Introduccion'])."</p>
                            </div>
                            </div>
                            <a><button class='BotonProyecto' id='".$row['idProyecto']."'>Ver más</button></a>
                        </div>";

                        
     }
     echo $content;
    ?>