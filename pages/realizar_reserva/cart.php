<?php
function existencias($ID_PRODUCT)
{
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "pollosrufino";
    $mysqli = Conexion::conectarBD($server, $user, $pass, $db);
    $sql = "SELECT existencias
            FROM productos
            WHERE id_product=$ID_PRODUCT";
    $result = $mysqli->query($sql);
    $limite = 0;
    if ($result) {
        $fila = $result->fetch_assoc();
        $limite = ($result->num_rows === 0) ? 0 : $fila["existencias"];
    }
    return (int)$limite;
}
if (isset($_POST['submit'])) {
    
    foreach ($_POST['quantity'] as $key => $val) {
        if ($val == 0) {
            unset($_SESSION['cart'][$key]);
        } else {
            $_SESSION['cart'][$key]['quantity'] = $val;
        }
    }
    if(!empty($_SESSION['cart'])){
        echo "<a id='generar' href='generarpdf.php'>Generar pdf</a>";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>

<body>
    <h1>Contenido actual de tú reserva</h1>
    <a href="index.php?page=products"> Volver a la página de productos</a>
    <form method="post" action="index.php?page=cart">

        <table>


            <?php
            if (!empty($_SESSION['cart'])) {
                $mysqli = Conexion::conectarBD($server, $user, $pass, $db);
                $sql = "SELECT * FROM productos WHERE id_product IN (";
                
                foreach ($_SESSION['cart'] as $id => $value) {
                    $sql .= $id . ",";
                }

                $sql = substr($sql, 0, -1) . ") ORDER BY cod_prod ASC";
                $res = $mysqli->query($sql);
                $totalprice = 0;
                ?>

                <tr>
                    <th>Nombre</th>
                    <th>Ración</th>
                    <th>Precio</th>
                    <th>Precio * Ración</th>
                </tr>
                <?php
                while ($row = $res->fetch_assoc()) {
                    $subtotal = $_SESSION['cart'][$row['id_product']]['quantity'] * $row['pvp'];
                    $totalprice += $subtotal;
                    $limite_max = existencias($row['id_product']);
                    ?>
                    <tr>
                        <td><?php echo $row['cod_prod'] ?></td>
                        <td><input id="control_generarpdf" type="number" min="0" max="<?php print(existencias($row['id_product'])); ?>" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" /></td>
                        <td><?php echo $row['pvp'] ?>€</td>
                        <td><?php echo $_SESSION['cart'][$row['id_product']]['quantity'] * $row['pvp'] ?>€</td>
                    </tr>
                <?php

            }
            ?>
                <tr>
                    <td colspan="4">Precio total: <?php echo $totalprice ?>€</td>
                </tr>
                <form action="cart.php" method="post"></form>
                <input id="actualizar" type="submit" name="submit" value="ACTUALIZAR RESERVA">
             

                <br />

                <br />
                <p>Para eliminar un producto de tu reserva,pon a 0 la cantidad</p>
            <?php
        } else {
            echo "<h3 style='color:yellow;'>Actualmente no hay productos añadidos al carro</h3>";
            echo "<h4 style='color:yellow;'>Por favor,aseguresé de añadir productos a su reserva para poder ver el contenido de la misma</h4>";
        }
        ?>

        </table>
        <br />


    </form>

</body>

</html>