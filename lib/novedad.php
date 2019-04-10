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
		$sql = "insert into comentarios values('$this->texto','$this->fecha')";
		//echo $sql;
		$conexion=Conexion::conectarBD("localhost", "root", "", "pollosrufino");
		if ($conexion->query($sql))
			$msg="Comentario guardado correctamente";
		else{
			$msg="Error al guardar el comentario";
			$msg.= $conexion->error;
		}
		Conexion::desconectarBD($conexion);

		return $msg;

	}

	public static function verNovedad($cuantos,$comienzo){
		$comentarios=[];
		$sql="select * from comentarios order by id desc limit $comienzo, $cuantos ";
		
		$conexion=Conexion::conectarBD("localhost", "root", "", "pollosrufino");
		$res=$conexion->query($sql);
		if ($res->num_rows >0){
			while ($linea=$res->fetch_assoc()){
				$comentarios[]=$linea;
			}
		}
		$res->free();
		Conexion::desconectarBD($conexion);

		return $comentarios;
	}

	public static function totalNovedad(){
		$total=0;
		$sql="select count('id') as 'total' from comentarios";
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
