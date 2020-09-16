<?php
include '..\Form\conexion.php';
$nlocal = $_POST['numerolocal']; 
$grado = $_POST['grado']; 
$orientacion = $_POST['orientacion']; 

    $sql = "SELECT idProyecto, Titulo, Introduccion, ndolocal FROM datosproyecto WHERE ndolocal ='" $nlocal "' OR Year = ' " $grado "' OR Orientacion ='" $orientacion "' order by ndolocal";
    $results = $mysqli->query($sql);
    $content = '';
    $local = 0;

     while($row = $results->fetch_array()){

        if(local != $row['ndolocal']){

            if($local>0){
                $content.=" </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div> ";
                        }

            $content.="<div class='Linea1Proyecto'>
                        <div class='Linea2'>
                        <div class='Linea3'>
                        <div class='Proyecto'>
                        <div class='Tabla>";

            $local = $row['ndolocal'];
            }

        $content.= "<div class='listProyectoLista'>
                    <div class='listGrid'>
                        <div class='listFoto'>
                        <img class='FotoLista' src='".$row['LinkVideo']."'/>
                    </div>

                    <div class='textoLista'>
                         <hr id='LineaMobileProyecto' />
                         <h2>".$row['Titulo']."</h2>
                         <p><b>Grupo:</b> ".$row['orientacion']." </p>
                         <p>
                           <b>Descripción:</b> ".$row['Introduccion']."</p>
                            </div>
                            </div>
                            <a><button class='BotonProyecto' data-idp='".$row['idProyecto']."'>Ver más</button></a
                            >
                        </div>";

                        
     }
     echo $content;
    ?>
