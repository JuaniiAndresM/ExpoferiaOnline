<?php 
//DUDO QUE ANDE ALGO ASI QUE DESDE YA PERDON
include 'Form\conexion.php';
$content="";
$sql = "SELECT *FROM datosProyecto";
$result = $mysqli -> query($sql);
$row_cnt = $result->num_rows;
if($sql = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $i = 1;
        $y = 1;
        //esto no estoy segura que ande, y si esto no anda no anda nada xd
        $arr = range(1,$row_cnt);
        shuffle($arr);
        $x = 0;

      do{
          $random = $arr[$x];
            $sql3 = "SELECT * FROM datosProyecto WHERE idProyecto = '".$random."'";
            $result = $mysqli -> query($sql3);
            $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $sql3 = "SELECT url FROM imagenes WHERE idProyecto = '".$ss['idProyecto']."'";
            $resultI = $mysqli -> query($sql3);
            $sI = mysqli_fetch_array($resultI, MYSQLI_ASSOC);

            //va creandpo los proyectos
            if(isset($ss['Titulo'],$ss['Introduccion'],$sI['url'])){
                if($y == 2){
                    $y ++;
                    $content.="
                    <div
                        class='Seccion2'
                        id ='Seccion2'
                        data-aos='flip-left'
                        data-aos-duration='1000'
                      >
                        <div class='Seccion2Mobile'>
                          <img 
                            class='ImagenProyectos'
                          />
                        </div>
                        <div class='SeccionTexto'>
                          <h2  id ='titulo2'>".$ss['Titulo']."</h2>
                          <hr />
                          <p id ='intro2' style='word-wrap: break-word;'>".$ss['Introduccion']."
                          </p>
                        </div>
                        <div class='Seccion2IMG'>
                          <img src='../img/".$sI['url']."'
                            id ='foto2'
                            class='ImagenProyectos'
                            
                          />
                        </div>
                      </div>";
        
                }else{
                    $y ++;
                    $content.="
                        <div
                    id ='Seccion".$i."'
                        data-aos='flip-right'
                        data-aos-duration='1000'
                    >
                        <div>
                        <img src='../img/".$sI['url']."'
                            class='ImagenProyectos' 
                            id ='foto".$i."' 
                        />
                        </div>
                        <div class='SeccionTexto'>
                        <h2 id = 'titulo".$i."' >".$ss['Titulo']."</h2>
                        <hr />
                        <p id = 'intro".$i."' style='word-wrap: break-word;'>".$ss['Introduccion']."
                        </p>
                        </div>
                    </div>";
                }//si el if da falso no se puede mostrar el proyecto asi que no se crea nada

        }else{
            //esto no se si es necesario
            echo "<script> 
            document.getElementById('Seccion".$i."').style.visibility = 'hidden';
            </script>";
        }
        $x++;
        $i++;
        
      }while($i <= 3);
      
    }

    echo $content;

?>