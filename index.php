<body>
  <header>
   <?php include('cabecera.php');?>
  </header>
  <main>
      <aside class="aside-left">
      </aside>
      <div class="container">
      <?php
      if($pagina == "paginaprincipal"){
        include("pages\añadirpaginaprincipal.php");
      }
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
        }else if ($pagina == "condiciones") {
          include("pages/condiciones de uso.html");
        }
      }
      ?>
      <aside class="aside-rigth">
      </aside>
      </div>
    </main>
    <footer>
   <?php include('footer.php');?>      
    </footer>
  <!-- APARTADO JAVASCRIPT-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="lib\js\reloj.js"></script>
<!-- scripts -->
<script src="lib/js/jquery.min.js"></script>
    <!-- uncomment if you need some Bootstrap JS functionality -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="lib/js/simple-mobile-menu.js"></script>
</body>
</html>