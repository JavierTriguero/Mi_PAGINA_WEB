<?php
if(isset($_POST['buscar'])){
 $correo=$_POST['email'];
 $mysqli=Conexion::conectarBD('localhost','root','','pollosrufino');
 $sql="SELECT * FROM reservas
        WHERE email=$correo";
$res=$mysqli->query($sql);

?>
    <?php 
    
    while($f=$res->fetch_assoc()){
        ?>
        <div>
          <p>
          Numero reserva <?php echo $f['num_reserva']?>
            </p>
        <p>
          NOMBRE: <?php echo $f['nombre']?>
        </p>
        <p>
          NOMBRE DE USUARIO: <?php echo $f['nom_usuario']?>
        </p>
        <p>
          DNI: <?php echo $f['dni']?>
        </p>
        <p>
          EMAIL: <?php echo $f['email']?>
        </p>
        <p>
          CONTENIDO: <?php echo $f['cuerpo_reserva']?>
        </p>
      </div>
      <?php
    }
 
Conexion::desconectarBD($mysqli);
      
    echo "<tr>
       <td align='center' style='color:red;' >NO HAY NOVEDADES></td>
     </tr>";
  }
?>
<form action="index.php?p=verReservas" method="post"  enctype="multipart/form-data"> 
 EMAIL: <input type="text" name="email" >

 <input type="submit" value="BUSCAR" name="buscar">
</form>