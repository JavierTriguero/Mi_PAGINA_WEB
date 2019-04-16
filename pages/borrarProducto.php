<?php
if(isset($_POST['borrar_producto'])){
	$producto=new Producto();
	$producto->get($_POST['cod_prod']);
	if(isset($producto->cod_prod)){
		$producto->delete($producto->cod_prod);
		$msg="PRODUCTO {$producto->cod_prod} BORRADO";
	}
	else{ //el producto no existe
		$msg="PRODUCTO NO EXISTE";
	}
 } else{
 $producto=new Producto();
 $producto->get_todos();
 $datos=$producto->get_productos();
?>
<form action="index.php?p=borrar" method="post">
	<table>
		<tr><td align="right">CODIGO PRODUCTO: </td>
		<td align="left">
		<select name="cod_prod">
			<?php for($cont=0;$cont<count($datos);$cont++){ ?>
				<option value="<?php echo $datos[$cont]['cod_prod'] ?>"> <?php echo $datos[$cont]['descripcion'] ?> </option>
			<?php } ?>
		</select>
		</td></tr>
		<tr><td align="center" colspan="2"><input type="submit" value="BORRAR" name="borrar_producto"></td></tr>	
	</table>
</form>
<?php
 }
?>

