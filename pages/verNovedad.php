<?php
function verNovedad(){
  $sql="select * from novedades order by fecha desc";
  $conexion=Conexion::conectarBD("localhost", "root", "", "pollosrufino");
  $res=$conexion->query($sql);
  //$res->free();
  Conexion::desconectarBD($conexion);
  return $res;
}
$consulta=verNovedad();

?>
    <?php if ($consulta->num_rows >0){?>
    <?php 
    
    while($novedad=$consulta->fetch_assoc()){
      ?>
      <div>
        <p>
        Novedad: <?php echo $novedad['novedad']?>
        <br>
        Fecha: <?php echo $novedad['fecha']?>
      </p>
    </div>
      <?php
    }
  }else {
    echo "<tr>
       <td align='center' style='color:red;' >NO HAY NOVEDADES></td>
     </tr>";
  }
    ?>
