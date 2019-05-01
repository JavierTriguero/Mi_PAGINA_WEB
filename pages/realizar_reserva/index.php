<?php 

    session_start();
  
    require("include/connection.php"); 
    $server="localhost"; 
    $user="tutorial"; 
    $pass="supersecretpassword"; 
    $db="tutorials"; 

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
<h1>Carrito</h1> 
<?php 
  
    if(isset($_SESSION['cart'])){ 
        $mysqli=Conexion::conectarBD($server,$user,$pass,$db);
        $sql="SELECT * FROM products WHERE id_product IN ("; 

        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
        $res=$mysqli->query($sql);
        while($row=$res->fetch_assoc()){ 
              
        ?> 
            <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?></p> 
        <?php 
              
        } 
    ?> 
        <hr /> 
        <a href="index.php?page=cart">Ir al carrito</a> 
    <?php 
          
    }else{ 
          
        echo "<p>Tu carrito esta vacío.Por favor añade algún producto.</p>"; 
          
    } 
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/style/style.css">

    <title>Carrito de la reserva</title>

</head>

<body>

    <div id="container">

        <div id="main">
        <?php require($_page.".php"); ?>
        </div><!--end main-->
        
        <div id="sidebar">
       <a href="../../index.php?p=inicio">Volver al principio</a>
        </div><!--end sidebar-->

    </div><!--end container-->

</body>
</html>
