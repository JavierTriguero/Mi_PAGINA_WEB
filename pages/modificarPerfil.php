<?php 
if(isset($_POST['modificar'])){
    $usuario=new Usuario($_SESSION['email'],$_SESSION['pass']);
    $usuario->setNombre($_SESSION['nombre']);
    $usuario->setTipo_usu($_SESSION['tipoUsr']);
    $usuario->setnombre_usu($_SESSION['nombre_usuario']);
    $usuario->setID($_SESSION['dni']);
    if($_SESSION['email']!=$_POST['email']){
        $_SESSION['email']=$_POST['email'];
    }
    if($_SESSION['pass']!=$_POST['pass']){
        $_SESSION['pass']=$_POST['pass'];
    }
    if($_SESSION['nombre']!=$_POST['nombre']){
        $_SESSION['nombre']=$_POST['nombre'];
    }
    if($_SESSION['nombre_usuario']!=$_POST['nombre_usuario']){
        $_SESSION['nombre_usuario']=$_POST['nombre_usuario'];
    }
    if($_SESSION['dni']!=$_POST['dni']){
        $_SESSION['dni']=$_POST['dni'];
    }
    

}



?>

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
    <span class="titulo">Modificar perfil de <?php $_SESSION['nombre']?></span>
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
                        <label>E-MAIL:</label>
                    </td>
                    <td>
                        <input type="text" name="email" id="email" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>CONTRASEÑA:</label>
                    </td>
                    <td>
                        <input type="password" name="pass" id="pass" >
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
</body>

</html> 