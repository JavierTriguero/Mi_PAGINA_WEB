<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
//Incio la session
session_start();
/*Incluyo los .php que me van hacer falta para realizar la web*/
require_once("lib/conexion.php");
require_once("lib/usuario.php");
require_once("lib/alumno.php");
require_once("lib/novedad.php");
require_once("lib/productos_model.php");


require("lib/fecha.php");
define("ESPERA", 10);
?>

<?php

/*PARA ACCEDER CON TU CUENTA DE USUARIO*/
if (isset($_POST['acceder'])) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$usuario = new Usuario($email, $pass);

	$emailUsr = $usuario->buscarUsuario();
	$passUsr = $usuario->buscarPass_usu();
	$tipoUsr = $usuario->buscartipo_usuario();
	$nombre_perfilUsr = $usuario->buscarNombre();
	$nombre_Usr = $usuario->buscarNombre();
	$id_Usr = $usuario->buscarDNI();

	if ($emailUsr != false) {
		if ($email == $emailUsr && $pass == $passUsr) {
			$_SESSION['email'] = $email;
			$_SESSION['pass'] = $pass;
			$_SESSION['tipoUsr'] = $tipoUsr;
			$_SESSION['nombre'] = $nombre_perfilUsr;
			$_SESSION['nombre_usuario'] = $nombre_perfilUsr;
			$_SESSION['dni'] = $id_Usr;

			$usuario->setTipo_usu('administrador');
		} else {

			unset($usuario);
		}
	} else {
		$msg = "El correo existe en la base de datos";
		unset($usuario);
	}
}
//Si existe registro
if (isset($_POST['registro'])) {
	$msg = "";
	//Si el campo email
	if (!empty($_POST['email'])) {
		$email = $_POST['email'];
	}
	//Si el campo pass no esta vacío
	if (!empty($_POST['pass'])) {
		$pass1 = $_POST['pass'];
	}
	//Si el campo repetirPass no esta vacío
	if (!empty($_POST['repetirPass'])) {
		$pass2 = $_POST['repetirPass'];
	}
	//Si el campo nombre no esta vacío
	if (!empty($_POST['nombre'])) {
		$nombre = $_POST['nombre'];
	}
	//Si el campo nombre_usuario NO esta vacío
	if (!empty($_POST['nombre_usuario'])) {
		$nombre_usuario = $_POST['nombre_usuario'];
	}
	//Si el campo dni NO esta vacío
	if (!empty($_POST['dni'])) {
		$id = $_POST['dni'];
	}
	//Si alguno de los campos está vacío
	if (empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['repetirPass']) || empty($_POST['nombre']) || empty($_POST['nombre_usuario']) || empty($_POST['dni'])) {
		$msg = "Algún campo no ha sido rellenado";
	} else {
		//Si las contraseñas no coinciden
		if ($pass1 != $pass2) {
			$msg = "Las contraseñas no coinciden";
		} else {
			$usuario = new Usuario($email,$pass1);
			$usuario->setNombre($nombre);
			$usuario->setTipo_usu('usuario');
			$usuario->setnombre_usu($nombre_usuario);
			$usuario->setID($id);
			//Le asigno el tipo_usuario a $usuario
			if ($usuario->buscarUsuario() != $email) {
				$usuario->altaUsuario();
			} else {
				$msg = "El usuario ya existe";
			}
		}
	}
}

if (isset($_GET['a'])) {
	//Si se le da a desconectar
	$accion = $_GET['a'];
	if ($accion == "logout") {

		unset($_SESSION['email']);
		unset($_SESSION['pass']);
		unset($_SESSION['tipoUsr']);
		unset($_SESSION['nombre']);
		unset($_SESSION['nombre_usuario']);
		unset($_SESSION['dni']);
		unset($email);
		unset($pass);
		unset($usuario);
		unset($emailUsr);
		unset($passUsr);
		unset($tipoUsr);
		unset($nombre_perfilUsr);
		unset($nombre_Usr);
		unset($id_Usr);
	}
}


?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="author" content="Wink Hosting (www.winkhosting.com)" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="style/style.css" type="text/css" />
	<title>Pollos rufino</title>
</head>

<body>
	<div id="page" align="center">
		<div id="toppage" align="center">
			<div id="date">
				<div class="smalltext" style="padding:13px;"><strong>POLLOSRUFINO</strong></div>
			</div>
			<div id="topbar">
				<?php
				if (isset($_SESSION['email'])) {
					?>
					<div align="right" style="padding:12px;" class="smallwhitetext">Estás conectado como:
						<?php
					if ($_SESSION['tipoUsr'] == "usuario") {

						
						print($_SESSION['nombre_usuario']);
					} else {
						
						print($_SESSION['nombre_usuario']);
					}
					?>
					| <a href="index.php?a=logout">Desconectar</a></div>
				<?php
				}
				?>
			</div>
		</div>
		<div id="header" align="center">
			<div class="titletext" id="logo">
				<div class="logotext" style="margin:30px">MI<span class="orangelogotext">MENU</span></div>
			</div>
			<div id="pagetitle">
				<div id="title" class="titletext" align="right">Plantillas y PHP</div>
			</div>
		</div>
		<div id="content" align="center">
			<div id="menu" align="right">
				<div align="right" style="width:189px; height:8px;"><img src="images/mnu_topshadow.gif" width="189" height="8" alt="mnutopshadow" /></div>
				<div id="linksmenu" align="center">
					<?php
					if (!isset($_SESSION['email'])) { ?>
						<a href="index.php?p=acceder" title="Acceder">ACCEDER</a>
						<a href="index.php?p=registrarse" title="Registrarse">REGISTRARSE</a>

						<?php
					} else { ?>


						<?php if ($_SESSION['tipoUsr'] == "usuario") { ?>
							<a href="index.php?p=inicio" title="Inicio">INICIO</a>
							<a href="index.php?p=verNovedad" title="verNovedad"> VER NOVEDADES</a>
							<a href="index.php?p=verPerfil" title="verPerfil"> VER PERFIL</a>
							<a href="index.php?p=modificarPerfil" title="modificarPerfil"> MODIFICAR PERFIL</a>
							
							<a href="index.php?p=realizarPedido" title="realizarPedido"> REALIZAR PEDIDO</a>
								<?php
						}
						if ($_SESSION['tipoUsr'] == "administrador") { ?>
							<a href="index.php?p=inicio" title="Inicio">INICIO</a>
							<a href="index.php?p=CrearNovedad" title="CrearNovedad">CREAR NOVEDADES</a>
							<a href="index.php?p=altaProducto" title="altaProducto">ALTA PRODUCTO</a>
							<a href="index.php?p=modificarProducto" title="modificarProducto">MODIFICAR PRODUCTO</a>
							<a href="index.php?p=borrarProducto" title="borrarProducto">BORRAR PRODUCTO</a>
								<?php
						}
					}
					?>
				</div>
				<div align="right" style="width:189px; height:8px;">
					<img src="images/mnu_bottomshadow.gif" width="189" height="8" alt="mnubottomshadow" />
				</div>
			</div>
		</div>