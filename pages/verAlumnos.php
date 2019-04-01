<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="./style/master.css">
  <link rel="stylesheet" type="text/css" href="./style/verAlumnos.css">
</head>
<body>
  <?php
    if(!isset($_GET['i'])){
      define("contador", 0);
    }else{
      $valor = $_GET['i'];
      if($valor > 0){
        define("contador", $valor);
      }else{
        define("contador", 0);
      }
    }
    $alumnos = Alumno::devolverAlumnosPaginacion(contador);
    $totalAlumnos = Alumno::totalAlumnos();
  ?>
  <span class="titulo">Pollos rufino</span>
  <div id="marcoTabla">
    <table>
        <tr>
          <th>ID</th>
          <th>NOMBRE</th>
          <th>APELLIDO</th>
          <th>MODIF.</th>
          <th>BAJA</th>
        </tr>
        <?php
          for($c1 = 0; $c1 < count($alumnos); $c1++){
            print("<tr>");
            foreach($alumnos[$c1] as $indice => $valor){
              if($indice == 'id'){
                $id = $valor;
              }
              print("<td>");
              print($valor);
              print("</td>");
            }
            print("<td>");
            print("<a href='index.php?p=modificarAlumnos&i=" . $id . "'><img src='./images/gear.png' height=25 width=35></a>");
            print("</td>");
            print("<td>");
            print("<a href='index.php?p=eliminarAlumnos&i=" . $id . "'><img src='./images/delete.png' height=25 width=35></a>");
            print("</td>");
            print("</tr>");
          }
        ?>
    </table>
  </div>
  <div id="botones">
    <?php
      if(contador > 0){
        print("<a href='index.php?p=verAlumnos&i=" . (contador - 4) . "'><img src='./images/anterior.gif' height=50 width=100 id='anterior'></a>");
      }
      if(contador + 4 < $totalAlumnos){
        print("<a href='index.php?p=verAlumnos&i=" . (contador + 4) . "'><img src='./images/siguiente.gif' height=50 width=100 id='siguiente'></a>");
      }
    ?>
  </div>
</body>
</html>
