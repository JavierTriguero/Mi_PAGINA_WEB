<?php 
 
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
<h1>View cart</h1> 
<a href="index.php?p=compra&page=products">Go back to products page</a> 
<form method="post" action="index.php?p=compra&page=cart"> 
      
    <table> 
          
        <tr> 
            <th>Nombre</th> 
            <th>Cantidad</th> 
            <th>Precio</th> 
            <th>Precio del Producto</th> 
        </tr> 
          
        <?php 
        $mysqli=Conexion::conectarBD($server,$user,$pass,$db);          
            $sql="SELECT * FROM products WHERE id_product IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
                    $res=$mysqli->query($sql);  
                    $totalprice=0; 
                    while($row=$res->fetch_assoc()){ 
                        $subtotal=$_SESSION['cart'][$row['id_product']]['quantity']*$row['price']; 
                        $totalprice+=$subtotal; 
                    ?> 
                        <tr> 
                            <td><?php echo $row['name'] ?></td> 
                            <td><input type="number" min="0" max ="99" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" /></td> 
                            <td><?php echo $row['price'] ?>$</td> 
                            <td><?php echo $_SESSION['cart'][$row['id_product']]['quantity']*$row['price'] ?>$</td> 
                        </tr> 
                    <?php 
                          
                    } 
        ?> 
                    <tr> 
                        <td colspan="4">Total Price: <?php echo $totalprice ?>$</td> 
                    </tr> 
          
    </table> 
    <br /> 
    <button type="submit" name="submit">Update Cart</button> 
</form> 
<br /> 
<p>To remove an item, set it's quantity to 0. </p>   
</body>
</html>
