<p style="text-align:justify;font-weight:bold; font-size:20px;border:dotted white 5px;padding:5px;" class='titulo'>INICIAR SESIÓN</p>
  
  <form action="index.php?p=acceder" method="post" enctype="multipart/form-data">
 <p style="justify-content:center;">
   <?php if (!empty($msg)) {
          print("<div style='text-align:center; padding:10px; background:lightyellow; border:2px solid black; box-sizing:border-box; width:304px; margin-top:10px;' id='cajaMensaje'>");
          print("<span style='color:red;'><b>$msg</b></span>");
          print("</div>");
        }
        ?>
  <p>
      <table>
        <tr>
          <th colspan=2>ACCEDER</th>
          <th></th>
        </tr>
        <tr>
          <td>
            <label>E-MAIL: </label>
          </td>
          <td>
            <input style="background: white;" type="text" name="email" required>
          </td>
        </tr>
        <tr>
          <td>
            <label>CONTRASEÑA: </label>
          </td>
          <td>
            <input style="background: white;" type="password" name="pass">
          </td>
        </tr>
        <tr>
          <td colspan=2 id="enviar">
            <input type="submit" name="acceder" value="ENVIAR">
          </td>
          <td></td>
        </tr>
      </table>
  </form>
