<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="./style/master.css">
  <link rel="stylesheet" type="text/css" href="./style/registro.css">
</head>
<body>
  <span class="titulo">ALUMNOS</span>
  <form action="index.php?p=registrarse" method="post" enctype="multipart/form-data">
    <div id="registro">
      <table>
        <tr>
          <th colspan=2>REGISTRARSE</th>
          <th></th>
        </tr>
        <tr>
        
        </tr>
        <tr>
          <td>
            <label>E-MAIL:</label>
          </td>
          <td>
            <input type="text" name="email">
          </td>
        </tr>
        <tr>
          <td>
            <label>CONTRASEÑA:</label>
          </td>
          <td>
            <input type="text" name="pass">
          </td>
        </tr>
        <tr>
          <td>
            <label>REPETIR CONTRASEÑA:</label>
          </td>
          <td>
            <input type="text" name="repetirPass">
          </td>
        </tr>
        <tr>
          <td colspan=2 id="enviar">
            <input type="submit" name="registro" value="REGISTRAR">
          </td>
          <td></td>
        </tr>
      </table>
    </div>
    <?php
      if(!empty($msg)){
        print("<div style='text-align:center; padding:10px; background:lightyellow; border:2px solid black; box-sizing:border-box; width:304px; margin-top:10px;' id='cajaMensaje'>");
        print("<span style='color:red;'><b>$msg</b></span>");
        print("</div>");
      }
    ?>
  </form>
</body>
</html>
