<?php
  function validar($campos){
    foreach($campos as $indice => $valor){
      switch($indice){
        case 'nombre':
          if('nombre' == ""){
            return false;
          }
        break;
        case 'apellido':
          if('apellido' == ""){
            return false;
          }
        break;
        case 'telefono':
          if(strlen($valor) != 9){
            return false;
          }
        break;
        case 'email':
          if(!filter_var($valor, FILTER_VALIDATE_EMAIL)){    //<--- Parece ser que no admite el carácter 'ñ'.
            return false;
          }
        break;
      }
    }
    return true;
  }
?>
