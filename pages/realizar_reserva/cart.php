<?php 
if(isset($_POST['pdf'])){
echo "<p>HOLA</p>";
}
if(isset($_POST['submit'])){ 
  
    foreach($_POST['quantity'] as $key => $val) { 
        if($val==0) { 
            unset($_SESSION['cart'][$key]);
         
        }else{ 
            $_SESSION['cart'][$key]['quantity']=$val; 
        } 
    } 
    
    }
?>
    
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Carrito</title>
    
</head>
<body>
<h1>Contenido pedido</h1> 
<a href="index.php?page=products"> Volver a la página de productos</a> 
<form method="post" action="index.php?page=cart"> 
      
    <table> 
          
        <tr> 
            <th>Nombre</th> 
            <th>Cantidad</th> 
            <th>Precio</th> 
            <th>Precio * Cantidad</th> 
        </tr> 
          
        <?php 
        $mysqli=Conexion::conectarBD($server,$user,$pass,$db);          
            $sql="SELECT * FROM productos WHERE id_product IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY cod_prod ASC"; 
                    $res=$mysqli->query($sql);  
                    $totalprice=0;
                     
                    while($row=$res->fetch_assoc()){ 
                        $subtotal=$_SESSION['cart'][$row['id_product']]['quantity']*$row['pvp']; 
                        $totalprice+=$subtotal; 
                    ?> 
                        <tr> 
                            <td><?php echo $row['cod_prod'] ?></td> 
                            <td><input type="number" min="0" max ="99" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" /></td> 
                            <td><?php echo $row['pvp'] ?>$</td> 
                            <td><?php echo $_SESSION['cart'][$row['id_product']]['quantity']*$row['pvp'] ?>$</td> 
                        </tr> 
                    <?php 
                          
                    } 
        ?> 
                    <tr> 
                        <td colspan="4">Precio total: <?php echo $totalprice ?>$</td> 
                    </tr> 
          
    </table> 
    <br /> 
    
    <button type="submit" name="submit" >Actualizar Carrito</button> 
    <a href="generarpdf.php">Generar pdf</a>
</form> 
<br /> 
<p>Para eliminar un producto de tu reserva,pon a 0 la cantidad</p>   
</body>
</html>
