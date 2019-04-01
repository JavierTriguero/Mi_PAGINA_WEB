<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="./style/master.css">
  <link rel="stylesheet" type="text/css" href="./style/verDetalles.css">
</head>
<body>
  <?php
    if(isset($_GET['i'])){
      $id = $_GET['i'];
      $alumno = Alumno::devolverAlumnoID($id);
    }
    $alumnos = Alumno::devolverAlumnos();

    if(isset($_GET['f'])){
      $idFalta = $_GET['f'];
      Alumno::bajaFalta($idFalta);
    }

    if(isset($_POST['altaFalta'])){
      if(!empty($_POST['fechaFalta'])){
        $fecha = $_POST['fechaFalta'];
      }
      if(!empty($_POST['asignaturaFalta'])){
        $asignatura = $_POST['asignaturaFalta'];
      }
      Alumno::altaFalta($id, $asignatura, $fecha);
    }
  ?>
  <span class="titulo">ALUMNOS</span><br>
  <div id="marco">
    <form action="index.php?p=verDetalles" method="post">
      <span>Seleccione un alumno de la lista para ver detalles:</span>
      <select name="seleccionado" onchange="recargarPagina()" id="seleccionado">
        <option value="blank" selected>-- Seleccione un alumno --</option>
        <?php
          for($c1 = 0; $c1 < count($alumnos); $c1++){
            $idAlumno = $alumnos[$c1]['id'];
            $nombre = $alumnos[$c1]['nombre'];
            $apellido = $alumnos[$c1]['apellido'];
            print("<option value='$idAlumno'>$nombre $apellido</option>");
          }
        ?>
      </select>
    </form>
    <?php
      if(isset($id)){
    ?>
      <form action="index.php?p=verDetalles&i=<?php print($id)?>" method="post" enctype="multipart/form-data">
        <div id="marcoTabla">
          <table>
            <tr>
              <th class="id">ID</th>
              <th>NOMBRE</th>
              <th>APELLIDO</th>
              <th>TELEFONO</th>
              <th>EMAIL</th>
            </tr>
            <?php
              print("<tr>");
              foreach($alumno as $indice => $valor){
                if($indice == 'id'){
                  print("<td class='id'>");
                }else{
                  print("<td>");
                }
                print($valor);
                print("</td>");
              }
              print("<tr>");
            ?>
          </table>
          <?php
            if(isset($_POST['verFaltas']) || isset($_POST['altaFalta']) || (isset($_GET['i']) && isset($_GET['f']))){
              $faltas = Alumno::faltasAlumno($id);
              if(count($faltas) > 0){
          ?>
            <table id="faltas">
              <tr>
                <th>ASIGNATURA</th>
                <th>FECHA FALTA</th>
              </tr>
              <?php
                for($c1 = 0; $c1 < count($faltas); $c1++){
                  print("<tr>");
                  foreach($faltas[$c1] as $indice => $valor){
                    if($indice == 'id'){
                      $idFalta = $valor;
                    }
                    if($indice == 'falta' || $indice == 'asignatura'){
                      print("<td>");
                      print($valor);
                      print("</td>");
                    }
                  }
                  if($_SESSION['tipoUsr'] == "admin"){
                    print("<td>");
                    print("<a href='index.php?p=verDetalles&i=$id&f=$idFalta'><img src='./images/delete.png' width=35 height=25></a>");
                    print("</td>");
                  }
                  print("</tr>");
                }
              ?>
            </table>
          <?php
            }else{
              print("<div id='mensaje'>");
              print("<span>El alumno " . $alumno['nombre'] . " " . $alumno['apellido'] . " no tiene faltas</span>");
              print("</div>");
            }
            if($_SESSION['tipoUsr'] == "admin"){
              $f = date("Y-m-d");
              print("<form action='index.php?p=verDetalles' method='post' enctype='multipart/form-data'>");
              print("<div id='añadirFalta'>");
              print("<table id='extra'>");
              print("<caption>AÑADIR FALTA</caption>");
              print("<tr>");
              print("<th>");
              print("FECHA");
              print("</th>");
              print("<th>");
              print("ASIGNATURA");
              print("</th>");
              print("</tr>");
              print("<tr>");
              print("<td>");
              print("<input type='text' name='fechaFalta' value='$f'>");
              print("</td>");
              print("<td>");
              print("<input type='text' name='asignaturaFalta'>");
              print("</td>");
              print("<td>");
              print("<input type='submit' name='altaFalta' value='AGREGAR FALTA'>");
              print("</td>");
              print("</tr>");
              print("</table>");
              print("</div>");
              print("</form>");
            }
          }else if(!isset($_POST['verFaltas'])){
            print('<input type="submit" name="verFaltas" value="VER FALTAS">');
          }
          ?>
        </div>
      </form>
    <?php
      }
    ?>
  </div>
  <script type="text/javascript">
    function recargarPagina(id){
      var valor = document.getElementById('seleccionado').value;
      location.href = "http://localhost/navidad/index.php?p=verDetalles&i=" + valor;
    }
  </script>
</body>
</html>
