<?php 
include '../Form/conexion.php';

$content="";
$sql = "SELECT * FROM datosProyecto where Estado = '1'";
$result = $mysqli -> query($sql);
$array=array();

while ($sqlarray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  array_push($array,$sqlarray['idProyecto']); 
}

        $i = 1;
        $y = 1;
        shuffle($array);
        $x = 0;

      do{
            $random = $array[$x];
            $sql = "SELECT * FROM datosProyecto WHERE idProyecto = '".$random."'";
            $result = $mysqli -> query($sql);
            $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if(mysqli_num_rows($result) == 0){
              $x++;
          }else{

            

            //va creandpo los proyectos
            if(isset($ss['Titulo'],$ss['Introduccion'],$ss['ImagenPrincipal']) && $ss['Estado'] == '1'){
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
                          <h2  id ='titulo2'>".$ss['Titulo']."</h2>
                          <hr />
                          <p id ='intro2' style='word-wrap: break-word;'>".$ss['Introduccion']."
                          </p>
                        </div>
                        <div class='Seccion2IMG'>
                          <img src='".$ss['ImagenPrincipal']."'
                            id ='foto2'
                            class='ImagenProyectos'
                            style='max-height:50%; max-width:50%;'
                            
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
                        <img src='".$ss['ImagenPrincipal']."'
                        id ='foto".$i."'
                            class='ImagenProyectos'  
                            style='max-height:50%; max-width:50%;'
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
            
          }

          $x++;
          $i++;

            
          }
        
        
      }while($i < 3 || $array[$x] != null);
      
    
    echo $content;

?>