<?php 
require_once("lib/conexion.php");

    $server="localhost"; 
    $user="root"; 
    $pass=""; 
    $db="pollosrufino"; 

    if(isset($_GET['page'])){ 
          
        $pages=array("products", "cart"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="products"; 
              
        } 
          
    }else{ 
          
        $_page="products"; 
          
    } 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <h1>Cart</h1> 
<?php 
  
    if(isset($_SESSION['cart'])){ 
        $mysqli=Conexion::conectarBD($server,$user,$pass,$db);
        $sql="SELECT * FROM products WHERE id_product IN ("; 

        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
        $res=$mysqli->query($sql);
        if($res!=false){
        while($row=$res->fetch_assoc()){ 
              
        ?> 
            <p><?php echo $row['cod_prod'] ?> x <?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?></p> 
        <?php 
              
        }
    }else{
        print("El carro esta vacío");
    } 
    ?> 
        <hr /> 
        <a href="index.php?p=compra&page=cart">Go to cart</a> 
    <?php 
          
    }else{ 
          
        echo "<p>Your Cart is empty. Please add some products.</p>"; 
          
    } 
  
?>  
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style/estiloproducto.css">

    <title>Shopping cart</title>

</head>

<body>

    <div id="container">

        <div id="main">
        <?php require("$_page".".php"); ?>
        </div><!--end main-->
        
        <div id="sidebar">
       
        </div><!--end sidebar-->

    </div><!--end container-->

</body>
</html>
