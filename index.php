
  <header>
<?php include('cabecera.php');?>
  </header>
  
  <main>  
    <section class="grid">
    <aside class="aside-left">
    <p>
    <h3>Paginas de interes</h3>
    </p>
    <p>
       <!--Cuando es clickeado abre una nueva ventana con nada, porque me parecia mejor así quedaba mas limpio asi,-->              
        <a href="pages/reloj.html" target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=1000,top=200,left=200,toolbar=no,location=no,status=no,menubar=no');return false;">RELOJ</a>
    <a href="pages/SlideShow2/Recurso_FancyBox/index.html" target="_blank" id="producto">NUESTROS PRODUCTOS</a>
    </p>
    <p>
    <a href="pages/jungla.html"id="jungla" target="_blank"  onclick="window.open(this.href,this.target,'width=1000,height=1000,top=200,left=200,toolbar=no,location=no,status=no,menubar=no');return false;"tittle="Haz lo que quieras aquí">JUNGLA</a>
    <a href="pages/SlideShow1/Recurso_FancyBox/index.html" target="_blank" onclick="window.open(this.href,this.target,'width=1000,height=1000,top=200,left=200,toolbar=no,location=no,status=no,menubar=no');return false; "id="profesionales" tittle="los provesionales de pollos rufino">PROFESIONALES</a>
    </p>

                                                       
    
    
    </aside>
    <section class="center"> 
      <?php
      if($pagina=="paginaprincipal"){
        include('pages/paginaprincipal.html');
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
          include("pages/Condiciones de uso.php");
        }else if ($pagina == "verReservas") {
          include("pages/verReservas.php");
        }
        
        
      }
      ?>
      </section>
      <aside class="aside-rigth">
        <h2 style="align:justify;">
      AQUI ESTARÁ TU PUBLICIDAD</h2>
      </aside>
      </section>
      
    </main>
    <footer>

    <p><a href="index.php">Home</a> | <a  href="pages/historia_pollosrufino.html"id="sobre_nosotros" target="_blank"  onclick="window.open(this.href,this.target,'width=1000,height=1000,top=200,left=200,toolbar=no,location=no,status=no,menubar=no');return false;" tittle="nuestra historia"><a href="pages/contacta_con_nosotros.html" target="_blank"  onclick="window.open(this.href,this.target,'width=1000,height=1000,top=200,left=200,toolbar=no,location=no,status=no,menubar=no');return false;" tittle="Contacta con nosotros">Contacta con nosotros</a><br />
        Pollos Rufino &copy; 2019<br />
      </p>
        <!-- APARTADO JAVASCRIPT-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- scripts -->
    <script src="lib/js/jquery.min.js"></script>
    <!-- uncomment if you need some Bootstrap JS functionality -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="lib/js/simple-mobile-menu.js"></script>
    <script src="lib/js/redireccion.js"></script>  
    <script src="lib/js/bootstrap.min.js"></script>
  </footer>
 