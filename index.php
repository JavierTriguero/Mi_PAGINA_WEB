
  <header>
<?php include('cabecera.php');?>
  </header>
  
  <main>
  <div id="ventanaModal" style="display:none;">
         <h2>Título de la ventana</h2>
         <p> Lorem ipsum </p>
  </div> 
  
    <section class="grid">
    <aside class="aside-left">
    <a data-fancybox  data-src="#ventanaModal"  href="javascript:;" >
       Abrir ventana
</a> 
    <a class="single-image"  href="" title="Ubuntu Computer"><img src="" alt=""/></a>
    </aside>
    <section class="center"> 
      <?php
      if($pagina=="paginaprincipal"){
        include('pages/galeria.html');
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
      </section>

     
      <aside class="aside-rigth">
        <h2 style="align:justify;"></h2>
      </aside>
      </section>
      
    </main>
    <footer>
    <p><a href="index.php?">Home</a> | <a href="#">About Us</a> | <a href="#">Products</a> | <a href="#">Our Services</a> | <a href="#">Contact Us</a><br />
        Pollos Rufino &copy; 2019<br />
      </p>     
    </footer>
 