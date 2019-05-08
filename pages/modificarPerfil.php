<?php 
if(isset($_POST['modificar'])){
    //Datos usuario
    $msg="Se ha modificado:<bt> ";
    if($_SESSION['pass']!=$_POST['pass']){
        //Cabiamos las variables de la sesión por las del $_POST
        $_SESSION['pass']=$_POST['pass'];
        $msg=$msg."<br> la Contraseña";
    }
    if($_SESSION['nombre']!=$_POST['nombre']){
        //Cabiamos las variables de la sesión por las del $_POST
        $_SESSION['nombre']=$_POST['nombre'];
        $msg=$msg."<br> el Nombre";
    }
    if($_SESSION['nombre_usuario']!=$_POST['nombre_usuario']){
        //Cabiamos las variables de la sesión por las del $_POST
        $_SESSION['nombre_usuario']=$_POST['nombre_usuario'];
        $msg=$msg."<br> Nombre de usuario";

    }
    if($_SESSION['dni']!=$_POST['dni']){
        //Cabiamos las variables de la sesión por las del $_POST
        $_SESSION['dni']=$_POST['dni'];
        $msg=$msg."<br> DNI";
    }
  
    $usuario=new Usuario($_SESSION['email'],$_SESSION['pass']);
    $usuario->setNombre($_SESSION['nombre']);
    $usuario->setTipo_usu($_SESSION['tipoUsr']);
    $usuario->setnombre_usu($_SESSION['nombre_usuario']);
    $usuario->setID($_SESSION['dni']);
    $usuario->modificarUsuario();
}



?>
    <span class="titulo">Modificar perfil de <?php print( $_SESSION['nombre']);?></span>
    <form action="index.php?p=modificarPerfil" method="post" enctype="multipart/form-data">
        <div id="registro">
            <table>
                <tr>
                    <th colspan=2>MODIFICAR</th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                        <label>Nombre:</label>
                    </td>
                    <td>
                        <input type="text" name="nombre" id="nombre" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>DNI:</label>
                    </td>
                    <td>
                        <input type="text" name="dni" id="dni">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nombre usuario:</label>
                    </td>
                    <td>
                        <input type="text" name="nombre_usuario" id="nombre_usuario">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Contraseña</label>
                    </td>
                    <td>
                        <input type="password" name="pass" id="pass">
                    </td>
                </tr>
                <tr>
                    <td colspan=2 id="enviar">
                        <input type="submit" name="modificar" value="Modificar">
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