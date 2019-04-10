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
        } else if ($pagina == "verAlumnos") {
          include("pages/verAlumnos.php");
        } else if ($pagina == "modificarAlumnos") {
          include("pages/modificarAlumnos.php");
        } else if ($pagina == "eliminarAlumnos") {
          include("pages/eliminarAlumnos.php");
        } else if ($pagina == "verDetalles") {
          include("pages/verDetalles.php");
        } else if ($pagina == "altaAlumno") {
          include("pages/altaAlumno.php");
        } else if ($pagina == "CrearNovedad") {
          include("pages/CrearNovedad.php");
        } else if ($pagina == "verNovedad") {
          include("pages/verNovedad.php");
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