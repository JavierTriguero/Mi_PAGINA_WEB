<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="./style/master.css">
  <link rel="stylesheet" type="text/css" href="./style/acceso.css">
</head>
<body>
  <span class='titulo'>ALUMNOS</span>
  <form action="index.php?p=acceder" method="post" enctype="multipart/form-data">
    <div id="acceso">
      <table>
        <tr>
          <th colspan=2>ACCEDER</th>
          <th></th>
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
            <input type="password" name="pass">
          </td>
        </tr>
        <tr>
          <td colspan=2 id="enviar">
            <input type="submit" name="acceder" value="ENVIAR">
          </td>
          <td></td>
        </tr>
      </table>
    </div>
  </form>
</body>
</html>
