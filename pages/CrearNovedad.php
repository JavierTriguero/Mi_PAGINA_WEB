<?php
if (isset($_POST['publicar'])) {
	if (isset($_POST['texto'])) {
		$texto = $_POST['texto'];
		$texto = stripslashes(nl2br(htmlspecialchars($texto)));
		$fecha = date("Y-m-d:H:i:s");
		$novedad = new Novedad($texto, $fecha);
		$msg = $novedad->guardarNovedad();
		setcookie("PUBLICAR", "NO", time() + ESPERA);
	} else
		$msg = "Faltan datos";
}else{
	$msg="Introduce la novedad";
} ?>
		
<p style="text-align:justify;font-weight:bold; font-size:20px;border:dotted white 5px;padding:5px;" class='titulo'>CREAR NOVEDAD</p>
		<p style="text-align:justify;font-weight:bold; font-size:20px;"><?php echo "$msg" ?></p>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
		<table>
		<tr>
          <td>
		  NOVEDAD:
			
		  </td>
		  <td>
			  <textarea style="resize:none;" cols="55" rows="4" name="texto"></textarea><br>
		</td>
		</tr>	
		<tr>
          <td>
		  <input type="submit" value="Publicar" name="publicar">
			
		  </td>
			
			</table>
		</form>