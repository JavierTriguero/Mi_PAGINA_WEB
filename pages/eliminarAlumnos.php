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

    if(isset($_POST['eliminar'])){
      $eliminar = Alumno::eliminarAlumno($id);
    }
  ?>
  <span class="titulo">ALUMNOS</span>
  <div id="marco">
    <span>Detalles del alumno a borrar</span>
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
            ?>" readonly>
          </td>
        </tr>
        <tr>
          <td>Apellido:</td>
          <td class="izq">
            <input type="text" name="apellido" value="<?php
              print($alumno['apellido']);
            ?>" readonly>
          </td>
        </tr>
        <tr>
          <td>Teléfono:</td>
          <td class="izq">
            <input type="text" name="telefono" value="<?php
              print($alumno['telefono']);
            ?>" readonly>
          </td>
        </tr>
        <tr>
          <td>E-mail:</td>
          <td class="izq">
            <input type="text" name="email" value="<?php
              print($alumno['email']);
            ?>" readonly>
          </td>
        </tr>
        <tr>
          <td colspan=2 class="izq">
            <input type="submit" name="eliminar" value="CONFIRMAR BORRADO">
          </td>
          <td></td>
        </tr>
      </table>
    </form>
    <?php
      if(isset($_POST['eliminar'])){
        if($eliminar){
          $msg = "ALUMNO BORRADO CORRECTAMENTE";
        }else{
          $msg = "SE HA PRODUCIDO UN ERROR AL BORRAR AL ALUMNO";
        }
        print("<div id='mensaje'>");
        print("<span>$msg</span>");
        print("</div>");
      }
    ?>
  </div>
</body>
</html>
