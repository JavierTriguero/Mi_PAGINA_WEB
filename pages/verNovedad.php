<?php
$comienzo=0;
if(isset($_GET['comienzo'])){
  $comienzo= $_GET['comienzo'];
}
	define("COMENTxPAG", 5);
  $total=Novedad::totalNovedad();
  $novedad=Novedad::verNovedad(COMENTxPAG,$comienzo);
  $cuantos=count($novedad);
 
  for($cont=0;$cont<$cuantos;$cont++){
      $novedad = $novedad[$cont]['novedad'];
      $fecha=$novedad[$cont]['fecha'];
      $entrada="Esta novedad fue escrita por el ADMINISTRADOR del sitio FECHA: <i>$fecha</i>:NOVEDAD<br>$novedad</p>\n";  
      echo $entrada;    
  }
  if ($total>5){
    if ($comienzo+COMENTxPAG< $total){
        $comienzo=$comienzo+COMENTxPAG;
        $verAnteriores="<a href='".$_SERVER['PHP_SELF']."?comienzo=$comienzo'>Ver Anteriores </a>";
    }
    else
        $verAnteriores="";
    echo "<br><br> $verAnteriores &nbsp;&nbsp;<a href='{$_SERVER['PHP_SELF']}'>Volver Principio </a>";
  }
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
		
		<h3>Mostrando los novedad <?php echo $comienzo+1 ." a ". (COMENTxPAG+$comienzo)?> desde los más recientes hacia atrás</h3>

		
	</div>
</body>

</html>
