<?php 
include '..\Form\conexion.php';
$content="";
$sql = "SELECT *FROM datosProyecto where Estado = '1'";
$result = $mysqli -> query($sql);
$row_cnt = $result->num_rows;
if($sql = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $i = 1;
        $y = 1;
        $arr = range(1,$row_cnt);
        shuffle($arr);
        $x = 0;

      do{
          $random = $arr[$x];
            $sql = "SELECT * FROM datosProyecto WHERE idProyecto = '".$random."'";
            $result = $mysqli -> query($sql);
            $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if(mysqli_num_rows($result) == 0){
              $x++;
          }else{

             
            $sql3 = "SELECT url FROM imagenes WHERE idProyecto = '".$ss['idProyecto']."'";
            $resultI = $mysqli -> query($sql3);
            $sI = mysqli_fetch_array($resultI, MYSQLI_ASSOC);

            //va creandpo los proyectos
            if(isset($ss['Titulo'],$ss['Introduccion'],$sI['url']) && $ss['Estado'] == '1'){
                if($y == 2){
                    $y ++;
                    $content.="
                    <div
                        class='Seccion2'
                        id ='Seccion2'
                        data-aos='flip-left'
                        data-aos-duration='1000'
                      >
                        
                        <div class='SeccionTexto'>
                          <h2  id ='titulo2'>".utf8_encode($ss['Titulo'])."</h2>
                          <hr />
                          <p id ='intro2' style='word-wrap: break-word;'>".utf8_encode($ss['Introduccion'])."
                          </p>
                        </div>
                        <div class='Seccion2IMG'>
                          <img src='../img/".$sI['url']."'
                            id ='foto2'
                            class='ImagenProyectos'
                            style='max-height:100%; max-width:100%;'
                            
                          />
                        </div>
                      </div>";
        
                }else{
                    $y ++;
                    $content.="
                        <div
                        class='Seccion".$i."'
                    id ='Seccion".$i."'
                        data-aos='flip-right'
                        data-aos-duration='1000'
                    >
                        <div>
                        <img src='../img/".$sI['url']."'
                        id ='foto".$i."'
                            class='ImagenProyectos'  
                            style='max-height:100%; max-width:100%;'
                        />
                        </div>
                        <div class='SeccionTexto'>
                        <h2 id = 'titulo".$i."' >".utf8_encode($ss['Titulo'])."</h2>
                        <hr />
                        <p id = 'intro".$i."' style='word-wrap: break-word;'>".utf8_encode($ss['Introduccion'])."
                        </p>
                        </div>
                    </div>";
                }//si el if da falso no se puede mostrar el proyecto asi que no se crea nada

          }else{
            
          }

          $x++;
          $i++;

            
          }
        
        
      }while($i <= 3);
      
    }

    echo $content;

?>