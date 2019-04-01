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
  <?php
    if(isset($_POST['alta'])){
      require_once("./lib/validar.php");
      $continuar = validar($_POST);
      if($continuar){
        $msg = "EL ALUMNO HA SIDO DADO DE ALTA CORRECTAMENTE";
        Alumno::altaAlumno($_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['email']);
      }else{
        $msg = "LOS DATOS INTRODUCIDOS NO SON VÁLIDOS";
      }
    }
  ?>
  <span class="titulo">ALUMNOS</span>
  <div id="marco">
    <span>Alta alumno</span>
    <?php
      if(!isset($msg)){
    ?>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td>Nombre:</td>
          <td class="izq">
            <input type="text" name="nombre">
          </td>
        </tr>
        <tr>
          <td>Apellido:</td>
          <td class="izq">
            <input type="text" name="apellido">
          </td>
        </tr>
        <tr>
          <td>Teléfono:</td>
          <td class="izq">
            <input type="text" name="telefono">
          </td>
        </tr>
        <tr>
          <td>E-mail:</td>
          <td class="izq">
            <input type="text" name="email">
          </td>
        </tr>
        <tr>
          <td colspan=2 class="izq">
            <input type="submit" name="alta" value="ALTA ALUMNO">
          </td>
          <td></td>
        </tr>
      </table>
    </form>
    <?php
      }else{
        print("<div id='mensaje'>");
        print("<span>$msg</span>");
        print("</div>");
      }
    ?>
  </div>
</body>
</html>
