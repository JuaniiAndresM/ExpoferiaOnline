<?php
    include '../Form/conexion.php';
     
    $local = $_POST['local'];
    $grado = $_POST['grado'];
    $orientacion = $_POST['orientacion'];
    
    /*
    echo $local;
    echo $grado;
    echo $orientacion;
    */

    $dondeL = "";
    $dondeG = "";
    $dondeO = "";
    if($local != 0){
        $dondeL = " AND ndolocal ='".$local."'";
    }
    if($grado !=0){
        $dondeG = " AND  Year ='".$grado."'";
    }
    if($orientacion !=0){
        $dondeO = " AND  Orientacion ='".$orientacion."'";
    }

    /*
    echo $dondeL;
    echo $dondeG;
    echo $dondeO;
    */

    $sql = "SELECT idProyecto, Titulo, Introduccion, Orientacion, ImagenPrincipal, Year, ndolocal FROM datosProyecto WHERE EstadoAdelanto= '1'" .$dondeL.$dondeG.$dondeO. "order by ndolocal";
    $results = $mysqli->query($sql);
    $content = '';
    $numerolocal = 0;

    if(mysqli_num_rows($results) == 0){
        echo "<br>";
        echo "<h2>¡No se han encontrado resultados!</h2>";
        echo "<hr>";
        echo "<h5>De momento no contamos con proyectos con esas caracteristicas.</h5>";
    }else{
        while($row = $results->fetch_array()){
        if( $numerolocal!= $row['ndolocal']){
            if($numerolocal>0){
                $content.=" </div>";
                        }
        if ( $row['ndolocal'] == 1){
            $local = "Diversificado";
        }else{
            if ( $row['ndolocal'] == 2){
                $local = "Ciclo Basico";
            }else{
                $local = "Tecnológico";
            }
        }
            $content.=" <div>
                        <h2 id='TituloProyectos'>".$local."</h2>";

            $numerolocal = $row['ndolocal'];
            }
            $sql = "SELECT Nombre FROM orientaciones WHERE idOrientacion ='".$row['Orientacion']."'";  
            $resultO = $mysqli->query($sql);
            $oo =mysqli_fetch_array($resultO, MYSQLI_ASSOC);
            $orientacion = $oo['Nombre'];
            if($row['Year'] == 7){
                $anio = $orientacion;
            }else{
                $anio = $row['Year']. "º ". $orientacion;
            }

        $content.= "<div class='listProyectoLista'>
                    <div class='listGrid'>
                        <div class='listFoto'>
                        <img class='FotoLista' src='".$row['ImagenPrincipal']."'>
                    </div>

                    <div class='textoLista'>
                        <hr id='LineaMobileProyecto' />
                        <h2 style='word-wrap: break-word;'>".$row['Titulo']."</h2>
                        <p style='word-wrap: break-word;'><b>Grupo:</b> ".$anio." </p>
                        <p>
                            <b style='word-wrap: break-word;'>Introduccion:</b> ".$row['Introduccion']."</p>
                            </div>
                            </div>
                            <a><button class='BotonProyecto' onclick=window.location.href='proximamente.html'>Ver más</button></a>
                        </div>";
                        }
                    }

    //<button class='BotonProyecto' onclick='mandarID(".$row['idProyecto'].")'>Ver más</button> los jajas
    echo $content;
    ?>
