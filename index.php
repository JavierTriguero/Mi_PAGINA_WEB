<?php
	require("cabecera.php");
	$msg="";

?>
<div id="clanci">
	<?php
		$opcion="";
		$pagina="login.php";
		$actual="Iniciar sesión";
		
		if(isset($_GET['p']))
		$opcion=$_GET['p'];

		
		if ($_SESSION['admin']) {
			
		if($opcion=="ver"){	
			$actual="VER PRODUCTO";
			$pagina="ver.php";
		}
		if($opcion=="alta" ){	
			$actual="ALTA PRODUCTO";
			$pagina="alta.php";
		}
		if($opcion=="modificar"){	
			$actual="MODIFICAR PRODUCTO";
			$pagina="modificar.php";
		}
		if($opcion=="borrar"){	
			$actual="BORRAR PRODUCTO";
			$pagina="borrar.php";
		}
		if($opcion=="verTodos"){	
			$actual="VER TODOS PRODUCTOS";
			$pagina="verTodos.php";
		}
		if($opcion=="cambiarpvp"){	
			$actual="CAMBIAR PVP";
			$pagina="cambiarpvp.php";
		}
	
		}else{
			
		if($opcion=="ver"){	
			$actual="VER PRODUCTO";
			$pagina="ver.php";
		}

		if($opcion=="verTodos"){	
			$actual="VER TODOS PRODUCTOS";
			$pagina="verTodos.php";
		}
		}
	
	
		
	?>
	<h2><a href="#"><?php echo $actual ?></a></h2>
	
	<p>
	 <?php
		require($pagina);
	?>
	</p>
	<p class='datum'><?php echo date("d-m-Y") ?> <img src='images/strelica2.gif' width='3px' height='5px' alt='' /> 
	<?php  if(isset($msg))
			echo "$msg";
	?></p>	
</div>
<?php
	require_once("pie.php");
?>