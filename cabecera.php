<?php
//Iincio la session
session_start();
/*Incluyo los .php que me van hacer falta para el correcto funcionamiento de la web*/
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
//usuario o administrador
      $usuario->setTipo_usu('usuario');
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
      $usuario = new Usuario($email, $pass1);
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
//Si exista paramatro a =desconectar
if (isset($_GET['a'])) {
  //Si se le da a desconectar
  $accion = $_GET['a'];
  if ($accion == "logout") {
    session_destroy();
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
<?php
$pagina = "";
if (isset($_GET['p'])) {
  $pagina = $_GET['p'];
}else{
  $pagina = "paginaprincipal";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css\relojanalogico.css">
    <!-- styles -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/simple-mobile-menu.css" type="text/css">
    <link rel="stylesheet" href="css/simple-mobile-menu-responsive.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" >
    <link rel="stylesheet" href="css/estilo_galeria.css"type="text/css">
    
</head>
<div class="smm">
        <div class="container">
          <div class="smm__container js-smm-container">
            <h1 class="smm__logo-wrapper"><a href="#"><img src="images\Icono_Plato_de_pollo_asador_barato.jpg" alt="Logo" width="120" height="60"></a></h1>
            <button class="btn btn-default smm__toggle js-smm-toggle visible-xs-block visible-sm-block"><i class="fa fa-bars"></i></button>
            <nav class="smm__collapse">
              <ul class="smm__primary-menu">
              <?php
        if (!isset($_SESSION['email'])) { ?>
          <li><a style="border:solid 1;background:green;color:white;" href="index.php?p=acceder" title="Acceder">ACCEDER</a></li>
          <li><a href="index.php?p=registrarse" title="Registrarse">REGISTRARSE</a></li>
        <?php
      } else { ?>
          <?php if ($_SESSION['tipoUsr'] == "usuario") { ?>
            <li><a href="index.php?p=inicio" title="Inicio">INICIO</a></li>
            <li><a href="index.php?p=verNovedad" title="verNovedad"> VER NOVEDADES</a></li>
            <li><a href="index.php?p=verPerfil" title="verPerfil"> VER PERFIL</a></li>
            <li><a href="index.php?p=modificarPerfil" title="modificarPerfil"> MODIFICAR PERFIL</a></li>
            <li><a href="index.php?p=formulariosugerencias" title="Sugerencia">SUGERENCIAS</a></li>
            <li><a href="pages\realizar_reserva\index.php" title="realizar_reserva"> REALIZAR RESERVA</a></li>
          <?php
        }
        if ($_SESSION['tipoUsr'] == "administrador") { ?>
            <li><a href="index.php?p=inicio" title="Inicio">INICIO</a>
            <li><a href="index.php?p=CrearNovedad" title="CrearNovedad">CREAR NOVEDADES</a>
            <li><a href="index.php?p=altaProducto" title="altaProducto">ALTA PRODUCTO</a>
            <li><a href="index.php?p=modificarProducto" title="modificarProducto">MODIFICAR PRODUCTO</a>
            <li><a href="index.php?p=borrarProducto" title="borrarProducto">BORRAR PRODUCTO</a>
            <?php
          }
        }
        ?>
                <?php
      if (isset($_SESSION['email'])) {
        ?>
                <li><a style="border:solid 1;background:red;color:white;" href="index.php?a=logout">Desconectar</a></li>
      <?php
    }
    ?>
           
              </ul>
              <ul class="smm__secondary-menu">
                <li><a href="https://www.facebook.com/pages/category/Restaurant/Pollos-Asados-Rufino-219905888101869/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/?hl=es" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/?lang=es" target="_blank"><i class="fa fa-twitter"></i></a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>