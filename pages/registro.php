    <span class="titulo">REGISTRO DE USUARIOS</span>
    <form action="index.php?p=registrarse" method="post" enctype="multipart/form-data">
        <div id="registro">
            <table>
                <tr>
                    <th colspan=2>REGISTRARSE</th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                        <label>Nombre:</label>
                    </td>
                    <td>
                        <input type="text" name="nombre" id="nombre"required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>DNI:</label>
                    </td>
                    <td>
                        <input type="text" name="dni" id="dni"required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nombre usuario:</label>
                    </td>
                    <td>
                        <input type="text" name="nombre_usuario" id="nombre_usuario"required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>E-MAIL:</label>
                    </td>
                    <td>
                        <input type="text" name="email" id="email" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>CONTRASEÑA:</label>
                    </td>
                    <td>
                        <input type="password" name="pass" id="pass" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>REPETIR CONTRASEÑA:</label>
                    </td>
                    <td>
                        <input type="password" name="repetirPass" id="repetirPass" required>
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
        if (!empty($msg)) {
          print("<div style='text-align:center; padding:10px; background:lightyellow; border:2px solid black; box-sizing:border-box; width:304px; margin-top:10px;' id='cajaMensaje'>");
          print("<span style='color:red;'><b>$msg</b></span>");
          print("</div>");
        }
        ?>
    </form> 