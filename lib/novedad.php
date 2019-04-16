<?php
class Novedad {
	private $texto; 
	private $fecha;
	
	function __construct($texto,$fecha) {
		$this->texto=$texto;
		$this->fecha=$fecha;
	}
	
	public function guardarNovedad(){
		$msg="";
		$sql = "insert into novedades values('$this->texto','$this->fecha')";
		//echo $sql;
		$conexion=Conexion::conectarBD("localhost", "root", "", "pollosrufino");
		if ($conexion->query($sql))
			$msg="Novedad publicada correctamente";
		else{
			$msg="Error al publicar la novedad";
			$msg.= $conexion->error;
		}
		Conexion::desconectarBD($conexion);

		return $msg;

	}

	public static function verNovedad(){
		$novedades=[];
		$sql="select * from novedades order by fecha";
		
		$conexion=Conexion::conectarBD("localhost", "root", "", "pollosrufino");
		$res=$conexion->query($sql);
		if ($res->num_rows >0){
			while ($linea=$res->fetch_assoc()){
				$novedades[]=$linea;
			}
		}
		$res->free();
		Conexion::desconectarBD($conexion);

		return $novedades;
	}

	public static function totalNovedad(){
		$total=0;
		$sql="select count('novedad') as 'total' from novedades";
		$conexion=Conexion::conectarBD("localhost", "root", "", "pollosrufino");
		$res=$conexion->query($sql);
		if ($res->num_rows >0)
			$fila=$res->fetch_assoc();
			$total=$fila['total'];
		$res->free();
		Conexion::desconectarBD($conexion);
		return $total;
	}
}
?>
