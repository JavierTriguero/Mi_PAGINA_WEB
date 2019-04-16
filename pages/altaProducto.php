<?php
if(isset($_POST['guardar_producto'])){
	$datos_prod=array('cod_prod'=>$_POST['cod_prod'],'descripcion'=>$_POST['descripcion'],'pvp'=>$_POST['pvp'],'existencias'=>$_POST['existencias']);
	$producto=new Producto();
	$producto->set($datos_prod);
	$msg="producto {$_POST['cod_prod']} dato de alta";
}

?>
<form action="index.php?p=alta" method="post">
	<table>
		<tr><td align="right">CODIGO PRODUCTO: </td><td align="left"><input type="text" name="cod_prod" size="5" maxlength="5"></td></tr>
		<tr><td align="right">DESCRIPCION: </td><td align="left"><input type="text" name="descripcion" size="20" maxlength="20"></td></tr>
		<tr><td align="right">PVP: </td><td align="left"><input type="text" name="pvp" size="8" maxlength="8"></td></tr>
		<tr><td align="right">EXISTENCIAS: </td><td align="left"><input type="text" name="existencias" size="8" maxlength="8"></td></tr>
		<tr><td align="center" colspan="2"><input type="submit" value="GUARDAR" name="guardar_producto"></td></tr>	
	</table>
</form>