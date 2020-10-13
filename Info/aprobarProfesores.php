<script src="jquery-3.1.1.min.js"></script>

<style>
table,td {
	border: 1px solid black;
}
</style>

<table>

<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Mail</th>
    <th>Telefono</th>
    <th>Usuario</th>
    <th>Contraseña</th>
    <th>A/R</th>
</tr> 
<?php
    include "../Form/conexion.php";

    $sql = "SELECT * FROM solicitudes_profesor";
    $resultado = mysqli_query($mysqli,$sql);

    if($resultado){
        while($row = $resultado->fetch_array()){
            $idsolicitud=$row['idSolicitud'];
            $nombre=$row['Nombre'];
            $apellido=$row['Apellido'];
            $mail=$row['Email'];
            $telefono=$row['Telefono'];
            $usuario=$row['Usuario'];
            $contra=$row['Password'];
            
               echo "<tr>
                      <td>$idsolicitud</td>
                      <td>$nombre</td>
                      <td>$apellido</td>
                      <td>$mail</td>
                      <td>$telefono</td>
                      <td>$usuario</td>
                      <td>$contra</td>
                      <td>
                      <form action='a-r.php' method='post'>
                      <input type='checkbox' name='activo[]' value='$idsolicitud'></input>
                      <input type='checkbox' name='activo[]' value='r'></input>
                      </td>
                      </tr>
                     "; 
                    } 
                }         
                echo "                
                <input type='submit' name='enviar' value='Enviar'></input>
                </form>";    
    ?>
<tr>
<td>-</td>
<td>-</td>
<td>-</td>
<td>-</td>
<td>-</td>
<td>-</td>
<td>-</td>
</tr>
</table>