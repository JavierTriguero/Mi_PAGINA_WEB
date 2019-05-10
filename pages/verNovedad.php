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
     ?>
<p style="text-align:justify;font-weight:bold; font-size:20px;border:dotted white 5px;padding:5px;" class='titulo'>VER NOVEDAD</p>

     <form action="">
     <table>
</tr> <?php
    while($novedad=$consulta->fetch_assoc()){
      
     ?>
      
      <tr>
                    <td>
                        <label>NOVEDAD:</label>
                    </td>
                    <td>
                    <?php echo $novedad['novedad']?>
                    </td>

      </tr>
      <tr>
                    <td>
                        <label>FECHA:</label>
                    </td>
                    <td>
                    <?php echo $novedad['fecha']?>
                    </td>
      </tr>
      
      <?php
    }
  }else {
    echo "<tr>
       <td align='center' style='color:red;' >NO HAY NOVEDADES></td>
     </tr>";
  }?>
  </table>
      </form>
      
