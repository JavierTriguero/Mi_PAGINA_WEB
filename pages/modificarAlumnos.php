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
    if(isset($_GET['i'])){
      $id = $_GET['i'];
    }
    $alumno = Alumno::devolverAlumnoID($id);

    if(isset($_POST['modificar'])){
      $modificar = Alumno::modificarAlumno($id, $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['email']);
      $alumno = Alumno::devolverAlumnoID($id);
    }
  ?>
  <span class="titulo">ALUMNOS</span>
  <div id="marco">
    <span>Detalles del alumno a modificar</span>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td>ID:</td>
          <td class="izq"><?php print($id);?></td>
        </tr>
        <tr>
          <td>Nombre:</td>
          <td class="izq">
            <input type="text" name="nombre" value="<?php
              print($alumno['nombre']);
            ?>">
          </td>
        </tr>
        <tr>
          <td>Apellido:</td>
          <td class="izq">
            <input type="text" name="apellido" value="<?php
              print($alumno['apellido']);
            ?>">
          </td>
        </tr>
        <tr>
          <td>Teléfono:</td>
          <td class="izq">
            <input type="text" name="telefono" value="<?php
              print($alumno['telefono']);
            ?>">
          </td>
        </tr>
        <tr>
          <td>E-mail:</td>
          <td class="izq">
            <input type="text" name="email" value="<?php
              print($alumno['email']);
            ?>">
          </td>
        </tr>
        <tr>
          <td colspan=2 class="izq">
            <input type="submit" name="modificar" value="MODIFICAR">
          </td>
          <td></td>
        </tr>
      </table>
    </form>
    <?php
      if(isset($_POST['modificar'])){
        if($modificar){
          $msg = "DATOS MODIFICADOS CORRECTAMENTE";
        }else{
          $msg = "SE HA PRODUCIDO UN ERROR AL MODIFICAR LOS DATOS";
        }
        print("<div id='mensaje'>");
        print("<span>$msg</span>");
        print("</div>");
      }
    ?>
  </div>
</body>
</html>
