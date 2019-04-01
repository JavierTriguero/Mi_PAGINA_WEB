<?php
  class Conexion{

    public static function conectarBD($servidor, $usuario, $pass, $bd){
      $mysqli = new mysqli($servidor, $usuario, $pass, $bd);

      if($mysqli->connect_errno){
        print("ERROR: No se ha podido establecer la conexión con la base de datos debido a: <br>");
        print("ERRNO: " . $mysqli->connect_errno . "<br>");
        print("ERROR: " . $mysqli->connect_error . "<br>");
        exit;
      }
      $mysqli->set_charset("utf8");
      return $mysqli;
    }

    public static function desconectarBD($mysqli){
      $mysqli->close();
    }

  }
?>
