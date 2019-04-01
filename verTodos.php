<?php

	$producto=new Producto();
	$producto->get_Todos();
	$rows=$producto->get_productos();
	if(count($rows)>0){
		foreach ($rows as $row){
		?>
			<table>	
				<tr><td align="right">CODIGO PRODUCTO: </td><td align="left"><input value="<?php echo $row['cod_prod'] ?>" readonly="readonly" type="text" name="cod_prod" size="5" maxlength="5" /></td></tr>
				<tr><td align="right">DESCRIPCION: </td><td align="left"><input value="<?php echo $row['descripcion'] ?>" readonly="readonly" type="text" name="descripcion" size="20" maxlength="20" /></td></tr>
				<tr><td align="right">PVP: </td><td align="left"><input value="<?php echo $row['pvp'] ?>" readonly="readonly" type="text" name="pvp" size="8" maxlength="8" /></td></tr>
				<tr><td align="right">EXISTENCIAS: </td><td align="left"><input value="<?php echo $row['existencias'] ?>" readonly="readonly" type="text" name="existencias" size="8" maxlength="8" /></td></tr>
				<tr><td align="right">DESCUENTO: </td><td align="left"><input value="<?php echo $row['descuento'] ?>" readonly="readonly" type="text" name="descuento" size="8" maxlength="8" /></td></tr>
			
			</table>
		<?php
		}
	}
	else{ //NO HAY PRODUCTOS
		$msg="NO HAY PRODUCTOS";
	}
 
?>


