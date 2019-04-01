﻿<?php
if(isset($_POST['guarda_cambios'])){
	$datos_prod=array('cod_prod'=>$_POST['cod_prod'],'descripcion'=>$_POST['descripcion'],'pvp'=>$_POST['pvp'],'existencias'=>$_POST['existencias'],'descuento'=>$_POST['descuento']);
	$producto=new Producto();
	$producto->edit($datos_prod);
	$msg="producto {$_POST['cod_prod']} modificado";
}
if(isset($_POST['modi_producto'])){
	$producto=new Producto();
	$producto->get($_POST['cod_prod']);
	if(isset($producto->cod_prod)){
?>
		<form action="index.php?p=modificar" method="post">
			<table>	
				<tr><td align="right">CODIGO PRODUCTO: </td><td align="left"><input value="<?php echo $producto->cod_prod ?>" readonly="readonly" type="text" name="cod_prod" size="5" maxlength="5" /></td></tr>
				<tr><td align="right">DESCRIPCION: </td><td align="left"><input value="<?php echo $producto->descripcion ?>"  type="text" name="descripcion" size="20" maxlength="20" /></td></tr>
				<tr><td align="right">PVP: </td><td align="left"><input value="<?php echo $producto->pvp ?>"  type="text" name="pvp" size="8" maxlength="8" /></td></tr>
				<tr><td align="right">EXISTENCIAS: </td><td align="left"><input value="<?php echo $producto->existencias ?>"  type="text" name="existencias" size="8" maxlength="8" /></td></tr>
				<tr><td align="right">DESCUENTO: </td><td align="left"><input value="<?php echo $producto->descuento ?>" type="text" name="descuento" size="8" maxlength="8" /></td></tr>
				
				<tr><td align="center" colspan="2"><input type="submit" value="GUARDAR CAMBIOS" name="guarda_cambios"></td></tr>
			
			</table>
		</form>
<?php
	}
	else{ //el producto no existe
		$msg="PRODUCTO NO EXISTE";
	}
 } else{
 $producto=new Producto();
 $producto->get_todos();
 $datos=$producto->get_productos();
?>
<form action="index.php?p=modificar" method="post">
	<table>
		<tr><td align="right">CODIGO PRODUCTO: </td>
		<td align="left">
		<select name="cod_prod">
			<?php for($cont=0;$cont<count($datos);$cont++){ ?>
				<option value="<?php echo $datos[$cont]['cod_prod'] ?>"> <?php echo $datos[$cont]['descripcion'] ?> </option>
			<?php } ?>
		</select>
		</td></tr>
		<tr><td align="center" colspan="2"><input type="submit" value="MODIFICAR" name="modi_producto"></td></tr>	
	</table>
</form>
<?php
 }
?>