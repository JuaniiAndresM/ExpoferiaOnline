<?php
include '..\Form\conexion.php';

if(isset($_POST['create']) && !empty($_POST['create'])) {
    $funcion = $_POST['create'];


     $sql = "SELECT idProyecto, Titulo, Itroduccion FROM datosproyecto";
     $result = $mysqli->query($sql);
     $content = '';

     while($row = $results->fetch_array()){
        $content.= "<div class='listProyectoLista'>
                    <div class='listGrid'>
                        <div class='listFoto'>
                        <img class='FotoLista' src='".$row['LinkVideo']."'/>
                    </div>

                    <div class='textoLista'>
                         <hr id='LineaMobileProyecto' />
                         <h2><?php echo $row['Titulo'] ?></h2>
                         <p><b>Grupo:</b> <?php echo $row['orientacion'] ?> </p>
                         <p>
                           <b>Descripción:</b> <?php echo $row['Introduccion'] ?></p>
                            </div>
                            </div>
                            <a><button class='BotonProyecto' data-idp='".$row['idProyecto']."'>Ver más</button></a
                            >
                        </div>"
                        
     }
     echo $content;
    }
}
    ?>
