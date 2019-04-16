<?php
include("cabecera.php");
?>

<?php
$pagina = "";
if (isset($_GET['p'])) {
  $pagina = $_GET['p'];
}
?>
<div id="contenttext">
  <div class="bodytext" style="padding:12px;" align="justify">
  </div>
  <div class="panel" align="justify">
    <span class="bodytext">
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
        }
        else if ($pagina == "altaProducto") {
          include("pages/altaProducto.php");
        }
        else if ($pagina == "modificarProducto") {
          include("pages/modificarProducto.php");
        }
        else if ($pagina == "borrarProducto") {
          include("pages/borrarProducto.php");
        }
      
      
      }
      ?>
    </span>
  </div>
</div>
</div>
<?php
      include("footer.php");
      ?>