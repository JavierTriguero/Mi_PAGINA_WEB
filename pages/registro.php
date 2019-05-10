
    <p style="font-size=12px;font-weight:bold;">Formato:
        <ul>
        <li>DNI:8 NÚMEROS + UNA LETRA EN MAYÚSCALA DE A HASTA LA Z</li>
        <li>CORREO ELÉCTRONICO:una o más letras minúsculas,números,barrabaja,
            puntos o guiones,directamente después de eso debe a 
            ver una arroba,una o más letras minúsculas, números, subrayados,
            puntos o guiones.  
        </li>
        <li>Contraseña:Debe de tener al menos 3 dígitos,
            Debe de tener al menos 3 mayúsculas,
            Debe de tener al menos 3 minúsculas,
            Y tener longitud de 3-16 caracteres</li>
        <li>Repetir contraseña: Debe de ser igual sino saltará un error</li>
        <li>Nombre:  El nombre empieza por una letra mayúscula,
                    y que los caracteres que le siguien son minúsculas y letras empleadas en español,
                    y que no son números;</li>
        <li>Nombre de usuario: Letras y digitos longitud entre 3 y 16</li>
    </ul>
    </p>
    <p style="text-align:justify;font-weight:bold; font-size:20px;border:dotted white 5px;padding:5px;" class='titulo'>REGISTRO DE USUARIOS</p>
        
<form action="index.php?p=registrarse" method="post" enctype="multipart/form-data">
        <div id="registro">

            <table>
                
                <tr>
                    <td>
                        <span style="color:red;">*</span><label>Nombre: </label>
                    </td>
                    <td>
                        <!--
                            La expresión es la siguiente:
                            El pattern valida que el campo nombre cumple con los siguientes requisitos:
                            El nombre empieza por una letra mayúscula,
                            y que los caracteres que le siguien son minúsculas y letras empleadas en español,
                            y que no son números;
                            Ejemplo:Javier,Ángel...
                      
                        -->
                        <input  type="text" name="nombre" id="nombre" pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$" required>
                    </td>
                </tr>
                <tr>
                    <td>
                    <span style="color:red;">*</span><label>DNI: </label>
                    </td>
                    <td>
                         <!--
                            La expresión es la siguiente:
                            El pattern valida que el campo dni cumple con los siguientes requisitos:
                            El dni tiene una letra y 8 digitos.
                      
                        -->
                        <input type="text" name="dni" id="dni" pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))" required>
                    </td>
                </tr>
                <tr>
                    <td>
                    <span style="color:red;">*</span><label>Nombre usuario: </label>
                    </td>
                    <td>
                        <input type="text" name="nombre_usuario" id="nombre_usuario" pattern="^[a-z0-9]{3,16}$" required>
                    </td>
                </tr>
                <tr>
                    <td>
                    <span style="color:red;">*</span><label>E-MAIL: </label>
                    </td>
                    <td>
                         <!--
                            La expresión es la siguiente:
                            El pattern valida que el campo email cumple con los siguientes requisitos:
                            una o más letras minúsculas,números,barrabaja,
                            puntos o guiones,directamente después de eso debe a ver una arroba,
                            una o más letras minúsculas, números, subrayados,
                            puntos o guiones.  
                      
                        -->
                        <input type="text" name="email" id="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                    </td>
                </tr>
                <tr>
                    <td>
                    <span style="color:red;">*</span><label>CONTRASEÑA: </label>
                    </td>
                    <td>
                        <!--
                    La expresión es la siguiente:
                            El pattern valida que el campo email cumple con los siguientes requisitos:
                    Debe de tener al menos 3 dígitos,
                    Debe de tener al menos 3 mayúsculas,
                    Debe de tener al menos 3 minúsculas,
                    Y tener longitud de 3-16 caracteres
            -->
                        <input type="password" name="pass" id="pass" pattern="^(?=(?:.*\d){3})(?=(?:.*[A-Z]){3})(?=(?:.*[a-z]){3})\S{8,}$" required>
                    </td>
                </tr>
                <tr>
                    <td>
                    <span style="color:red;">*</span><label>REPETIR CONTRASEÑA: </label>
                    </td>
                    <td>
                        <!--DEBE COINCIDIR CON LA CONTREÑA PARA QUE SE PUEDA REGISTRAR -->
                        <input type="text" name="repetirPass" id="repetirPass" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="registro" value="REGISTRAR">
                   
                    </td>
                    <td><input type="reset" name="reset" value="BORRAR"></td>
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