
<p style="text-align:justify;font-weight:bold; font-size:20px;border:dotted white 5px;padding:5px;" class='titulo'>VER MI PERFIL</p>
<form action="">
<table>
<tr>
                    <td>
                        <label>Nombre:</label>
                    </td>
                    <td>
                        <input readonly type="text" name="nombre" id="nombre" value="<?php print($_SESSION['nombre']); ?>">
					</td>
</tr>
<tr>
                    <td>
                        <label>Correo electrónico:</label>
                    </td>
                    <td>
					<input readonly type="text" name="email" id="email" value="<?php print($_SESSION['email']); ?>">
					</td>
</tr>
<tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
					<input readonly type="password" name="pass" id="pass" value="<?php print($_SESSION['pass']); ?>">
					</td>
</tr>
<tr>
                    <td>
                        <label>Nombre de Usuario:</label>
                    </td>
                    <td>
					<input readonly type="text" name="nombre_usuario" id="nombre_usuario" value="<?php  print($_SESSION['nombre_usuario']);?>">
					</td>
</tr>
<tr>
                    <td>
                        <label>DNI</label>
                    </td>
                    <td>
					<input readonly type="text" name="DNI" id="DNI" value="<?php  print($_SESSION['dni']);?>">
					</td>
</tr>
</table>
</form>