<?php
include '..\Form\conexion.php';

    $sql = "SELECT idProyecto, Titulo, Introduccion, Orientacion, ndolocal FROM datosProyecto order by ndolocal";
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

        $content.= "<div class='listProyectoLista'>
                    <div class='listGrid'>
                        <div class='listFoto'>
                        <img class='FotoLista' src='hola'/>
                    </div>

                    <div class='textoLista'>
                         <hr id='LineaMobileProyecto' />
                         <h2>".utf8_encode($row['Titulo'])."</h2>
                         <p><b>Grupo:</b> ".utf8_encode($row['Orientacion'])." </p>
                         <p>
                           <b>Descripción:</b> ".utf8_encode($row['Introduccion'])."</p>
                            </div>
                            </div>
                            <a><button class='BotonProyecto' id='1' data-idp='".$row['idProyecto']."'>Ver más</button></a>
                        </div>";

                        
     }
     echo $content;
    ?>
