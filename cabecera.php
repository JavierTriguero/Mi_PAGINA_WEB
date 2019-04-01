<?php

session_start();
$admin = false;
if (!isset($_SESSION['admin'])) {
	$_SESSION['admin'] = $admin;
} else {
	$admin = $_SESSION['admin'];
}
if (isset($_POST['modo'])) {
	$admin = !$admin;
	$_SESSION['admin'] = $admin;
}
require("productos_model.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-15" />
<meta name="Author" content="Author" />
<meta name="Robots" content="index,follow" />
<meta name="Description" content="Description" />
<meta name="Keywords" content="key, words" />
<link rel="stylesheet" type="text/css" href="images/style.css" />
<title>Gestión productos</title>
</head>
<body>
	<div id="bg">
		<div id="sadrzaj">
			<div id="toplinks">
				<?php if ($admin) { ?>
					<a href="index.php?p=alta">Alta</a>
					<a href="index.php?p=modificar">Modificar</a>
					<a href="index.php?p=borrar">Borrar</a>
					<a href="index.php?p=cambiarpvp">Cambiar PVP</a>
				<?php 
		} ?>
				<a href="index.php?p=ver">Ver</a>
					<a href="index.php?p=verTodos">Ver Todos</a>
			</div>

			<div id="zaglavlje">
				<div id="title">
					<a href="#">Gestion Productos</a>
				</div>
				<div id="title_info">
					<form action="index.php" method="post">
					<?php if (!$admin) { ?>
					<input type="submit" name="modo" value="Cambiar a modo administrador">
					<?php } else { ?>
				<input type="submit" name="modo" value="Cambiar a modo usuario">
			<?php }?>
					</form>
				
				</div>
			</div>