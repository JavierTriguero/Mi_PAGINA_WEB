<?php 
    session_start();
    require("include/connection.php"); 
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/style/style.css">

    <title>Carrito :Reserva</title>

</head>

<body>

    <div id="container">

        <div id="main">
        <?php require($_page.".php"); ?>
        </div><!--end main-->
        
        <div id="sidebar">
       <a href="../../index.php?p=inicio">Volver a la página principal</a>
        </div><!--end sidebar-->

    </div><!--end container-->

</body>
</html>
