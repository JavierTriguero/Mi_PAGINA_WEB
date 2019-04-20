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
<div id=perfil>
    <span id="titulo">Mi perfil</span>
<p>Nombre: <input readonly type="text" name="nombre" id="nombre" value="<?php print($_SESSION['nombre']); ?>"></p>

<p>Correo electrónico: <input readonly type="text" name="email" id="email" value="<?php print($_SESSION['email']); ?>"></p>
<p>Password: <input readonly type="password" name="pass" id="pass" value="<?php print($_SESSION['pass']); ?>"></p>
<p>Nombre de Usuario: <input readonly type="text" name="nombre_usuario" id="nombre_usuario" value="<?php  print($_SESSION['nombre_usuario']);?>"> </p>
<p>DNI:<input readonly type="text" name="DNI" id="DNI" value="<?php  print($_SESSION['dni']);?>"></p>
<p></p>
<p></p>
</div>

</body>

</html>