<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	/*Incluyo los .php que me van hacer falta para realizar la web*/
	require_once("lib/conexion.php");
	require_once("lib/usuario.php");
	require_once("lib/alumno.php");
?>

<?php
  session_start();
/*PARA ACCEDER CON TU CUENTA DE USUARIO*/
  if(isset($_POST['acceder'])){
		//TE QUEDA MOFICAR ACCEDER
    $email = $_POST['email'];
	$pass = $_POST['pass'];
	$nombre = $_POST['nombre'];
	$nombre_usuario=$_POST['nombre_usuario'];
	$dni=$_POST['dni'];
    $usuario = new Usuario($email, $pass,$nombre,$nombre_usuario,$id);
    $emailUsr = $usuario->buscarUsuario();
    $passUsr = $usuario->buscarPass();
		$tipoUsr = $usuario->buscarTipoUsuario();
    if($emailUsr != false){
      if($email == $emailUsr && $pass == $passUsr){
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $pass;
				$_SESSION['tipoUsr'] = $tipoUsr;
				$usuario->setTipo($tipoUsr);
      }else{
				unset($usuario);
			}
    }else{
			unset($usuario);
		}
  }

	if(isset($_POST['registro'])){
		$msg = "";
		if(!empty($_POST['email'])){
			$email = $_POST['email'];
		}
		if(!empty($_POST['pass'])){
			$pass1 = $_POST['pass'];
		}
		if(!empty($_POST['repetirPass'])){
			$pass2 = $_POST['repetirPass'];
		}
		if(!empty($_POST['nombre'])){
			$nombre=$_POST['nombre'];
		}
		if(!empty($_POST['nombre_usuario'])){
			$nombre_usuario=$_POST['nombre_usuario'];
		}
		if(!empty($_POST['dni'])){
			$id=$_POST['dni'];
		}
		if(empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['repetirPass']) || empty($_POST['nombre']) || empty($_POST['nombre_usuario']) || empty($_POST['dni'])){
			$msg = "Algún campo no ha sido rellenado";
		}else{
			if($pass1 != $pass2){
				$msg = "Las contraseñas no coinciden";
			}else{	
				$usuario = new Usuario($email,$pass1,$nombre,$nombre_usuario,$id);
				$usuario->setTipo_usu('usuario');
				if($usuario->buscarUsuario() != $email){
					$usuario->altaUsuario();
				}else{
					$msg = "El usuario ya existe";
				}
			}
		}
	}

	if(isset($_GET['a'])){
		$accion = $_GET['a'];
		if($accion == "logout"){
			unset($_SESSION['email']);
			unset($_SESSION['pass']);
			unset($_SESSION['tipoUsr']);
			unset($email);
			unset($pass);
			unset($usuario);
			unset($emailUsr);
			unset($passUsr);
			unset($tipoUsr);
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
				<div class="smalltext" style="padding:13px;"><strong>MIPAGINAWEB</strong></div>
			</div>
			<div id="topbar">
				<?php
					if(isset($_SESSION['email'])){
				?>
					<div align="right" style="padding:12px;" class="smallwhitetext">Estás conectado como:
						<?php
							if($_SESSION['tipoUsr'] == "usuario"){
								print("Usuario");
							}else{
								print("Administrador");
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
						if(!isset($_SESSION['email'])){
					?>
					<a href="index.php?p=acceder" title="Acceder">ACCEDER</a>
					<a href="index.php?p=registrarse" title="Registrarse">REGISTRARSE</a>
					<?php
						}else{
					?>
					<a href="index.php?p=inicio" title="Inicio">INICIO</a>
					<a href="index.php?p=verAlumnos" title="verAlumnos">VER ALUMNOS</a>
					<a href="index.php?p=verDetalles" title="verDetalles">VER DETALLES</a>
					<a href="index.php?p=altaAlumno" title="altaAlumno">ALTA ALUMNO</a>
					<?php
						}
					?>
				</div>
				<div align="right" style="width:189px; height:8px;"><img src="images/mnu_bottomshadow.gif" width="189" height="8" alt="mnubottomshadow" /></div>
			</div>
		</div>
