<?php
 
 $mysqli=Conexion::conectarBD('localhost','root','','pollosrufino');
 $sql="SELECT * FROM reservas ORDER BY num_reserva ASC";
$res=$mysqli->query($sql);
$row_cnt = $res->num_rows;

?>
<p style="text-align:justify;font-weight:bold; font-size:20px;border:dotted white 5px;padding:5px;" class='titulo'>RESERVAS</p> 
<form>
    <?php
      
  if($row_cnt>0){    
    while($f=$res->fetch_assoc()){
        ?>
       
        <table>
          <tr><td><-----------------------------------------></td></tr>
          <tr>
          <td> Numero reserva <?php echo $f['num_reserva']?><td>
          </tr>
        <tr>
           <td> NOMBRE: <?php echo $f['nombre']?></td>
        </tr>
        <tr>
           <td> NOMBRE DE USUARIO: <?php echo $f['nom_usuario']?></td>
        </tr>
        <tr>
           <td> DNI: <?php echo $f['dni']?></td>
        </tr>
        <tr>
           <td> EMAIL: <?php echo $f['email']?></td>
        </tr>
        <tr>
           <td> CONTENIDO: <?php echo $f['cuerpo_reserva']?></td>
        </tr>
    </table>
    </form>
      <?php
    }
    Conexion::desconectarBD($mysqli);
  }else{

      
    echo "<tr>
       <td align='center' style='color:red;' >NO HAY RESERVAS></td>
     </tr>";
  }
?>
