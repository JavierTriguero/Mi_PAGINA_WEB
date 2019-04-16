<?php
function verNovedad(){
  $sql="select * from novedades order by fecha";
  $conexion=Conexion::conectarBD("localhost", "root", "", "pollosrufino");
  $res=$conexion->query($sql);
  //$res->free();
  Conexion::desconectarBD($conexion);
  return $res;
}
$consulta=verNovedad();

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="./style/master.css">
	<link rel="stylesheet" type="text/css" href="./style/alta_modificar_borrar_Alumnos.css">
</head>

<body>

	<div id="marco">
    <?php if ($consulta->num_rows >0){?>
    <table >
    <thead>
    <tr>
    <th>Novedad</th>
    <th>Fecha</th>
      </tr>
    </thead>
    <?php 
    
    while($novedad=$consulta->fetch_assoc()){
      ?>
      <tr>
        <td width="200px"><?php echo $novedad['novedad']?></td>
        <td width="200px"><?php echo $novedad['fecha']?></td>
        <td></td>
      </tr>
      <?php
    }
  }else {
    echo "NO HAY NOVEDADES";
  }
    ?>

	</div>
</body>

</html>
