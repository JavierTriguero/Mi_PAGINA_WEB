<?php 
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        }else{ 
            $mysqli=Conexion::conectarBD($server,$user,$pass,$db);
            $sql="SELECT * FROM products 
                WHERE id_product={$id}"; 
            $res=$mysqli->query($sql);
            if($res->num_rows > 0){ 
                $result= $res->fetch_assoc();
                 
               $_SESSION['cart'][$result['id_product']]=array( 
                        "quantity" => 1, 
                        "price" => $result['price'] 
                    ); 
                //  var_dump($_SESSION['cart'][$result['id_product']]);
                
                  
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
            Conexion::desconectarBD($res);
              
        } 
          
    } 
  
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Productos</title>
   
</head>

<body>
    <h1>Lista de productos</h1>
    <?php 
    if(isset($message)){ 
        echo "<h2>$message</h2>"; 
    } 
?>
    <table>
        <tr>
            <th>Nombre </th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
        <?php 
  
   $mysqli=Conexion::conectarBD($server,$user,$pass,$db);
    $sql="SELECT * FROM products ORDER BY name ASC"; 
    $res=$mysqli->query($sql); 
      
    while ($f=$res->fetch_assoc()) { 
          
?> 
        <tr> 
            <td><?php echo $f['name'] ?></td> 
            <td><?php echo $f['description'] ?></td> 
            <td><?php echo $f['price'] ?>$</td> 
            <td><a href="index.php?page=products&action=add&id=<?php echo $f['id_product'] ?>">Añadir al carrito</a></td> 
        </tr> 
<?php 
          
    } 
  Conexion::desconectarBD($res);
?>
    </table>
</body>

</html>