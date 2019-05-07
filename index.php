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
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style\responsive.css">
</head>

<body>
  <div class="container">
    <div class="header">
      <img class="logo" src="images\Icono_Plato_de_pollo_asador_barato.jpg" height="150px" width="150px">
      <h1 align="center" class="titulo"> POLLOS RUFINO</h1>
      <?php
      if (isset($_SESSION['email'])) {
        ?>
        <div align="right" class="cuenta">Estás conectado como:
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

    <div class="menu">
      <ul>
        <?php
        if (!isset($_SESSION['email'])) { ?>
          <li><a href="index.php?p=galeria_productos" title="galeria">Galeria</a></li>
          <li><a href="index.php?p=acceder" title="Acceder">ACCEDER</a></li>
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
      </ul>
    </div>
    <div class="cuerpo">
      <?php
      if (!isset($_SESSION['email'])) {
        if ($pagina == "acceder" || $pagina == "") {
          include("pages/acceso.php");
        } else if ($pagina == "registrarse") {
          include("pages/registro.php");
        }
      } else {
        if ($pagina == "inicio" || $pagina == "acceder") {
          include("pages/inicio.php");
        } else if ($pagina == "CrearNovedad") {
          include("pages/CrearNovedad.php");
        } else if ($pagina == "verNovedad") {
          include("pages/verNovedad.php");
        } else if ($pagina == "altaProducto") {
          include("pages/altaProducto.php");
        } else if ($pagina == "modificarProducto") {
          include("pages/modificarProducto.php");
        } else if ($pagina == "borrarProducto") {
          include("pages/borrarProducto.php");
        } else if ($pagina == "modificarPerfil") {
          include("pages/modificarPerfil.php");
        } else if ($pagina == "verPerfil") {
          include("pages/verPerfil.php");
        } else if ($pagina == "formulariosugerencias") {
          include("pages/formulariosugerencias.php");
        } else if ($pagina == "galeriaproducto") {
          include("pages/galeria_prductos.php");
        }
        else if ($pagina == "condiciones") {
          include("pages/condiciones de uso.html");
        }
      }
      ?>
    </div>
    <div class="aside">
      <h2>What?</h2>
      <p>Chania is a city on the island of Crete.</p>
      <h2>Where?</h2>
      <p>Crete is a Greek island in the Mediterranean Sea.</p>
      <h2>How?</h2>
      <p>You can reach Chania airport from all over Europe.</p>
    </div>


    <div class="footer">
      <p><a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Products</a> | <a href="#">Our Services</a> | <a href="#">Contact Us</a><br />
        Your Company Name &copy; 2007<br />
      </p>

    </div>
  </div>
</body>

</html>