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

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="./style/master.css">
	<link rel="stylesheet" type="text/css" href="./style/alta_modificar_borrar_Alumnos.css">
</head>

<body>

	<div id="marco">
		
		<span class="titulo">CREAR NOVEDAD</span>
		<p><?php echo "$msg" ?></p>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
			NOVEDAD:<br>
			<textarea cols="55" rows="4" name="texto"></textarea><br>

			<input type="submit" value="Publicar" name="publicar">
		</form>
		
	</div>
</body>

</html>