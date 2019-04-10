<h3>Mostrando los comentarios <?php echo $comienzo+1 ." a ". (COMENTxPAG+$comienzo)?> desde los más recientes hacia atrás</h3>
<?php
	
  $total=Novedad::totalNovedad()();
  $comentarios=Novedad::verNovedad(COMENTxPAG,$comienzo);
  $cuantos=count($comentarios);
  //var_dump($comentarios);
  for($cont=0;$cont<$cuantos;$cont++){
      $comentario = $comentarios[$cont]['comentario'];
      $nombre = $comentarios[$cont]['nombre'];
      $email = $comentarios[$cont]['email'];
      $fecha=$comentarios[$cont]['fecha'];
      $email = "<a href=\"mailto:$email\">$email</a>";  
      $entrada="<p><b>$nombre</b> ($email) escribió en <i>$fecha</i>:<br>$comentario</p>\n";  
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