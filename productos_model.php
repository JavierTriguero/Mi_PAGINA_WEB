<?php
require_once('db_abstract_model.php');
class Producto extends DBAbstractModel {
	public $cod_prod;
	public $descripcion;
	public $pvp;
	public $existencias;
	public $descuento;
	function __construct() {
		$this->db_name = 'ALMACEN_EX';
		
	}
	
	public function get_productos(){
		return $this->rows;
	}
	public function get($cod_prod='') {
		if($cod_prod != ''):
			$this->query = "
			SELECT cod_prod,descripcion,pvp,existencias,descuento
			FROM productos
			WHERE cod_prod = '$cod_prod'
			";
			$this->get_results_from_query();
		endif;
		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
				$this->$propiedad = $valor;
			endforeach;
		endif;
	}
	
	public function get_todos() {
		$this->query = "
		SELECT cod_prod,descripcion,pvp,existencias,descuento
		FROM productos";
		$this->get_results_from_query(); //en el atributo rows del DBAbstractModel están todos los datos.
		// como es protected no se pueden leer desde el progama principal, por eso implementamos el get_productos()
		//tambien se podría hacer con un return de $this->rows aqui;
		
	}
	
	public function set($prod_data=array()) {
		if(array_key_exists('cod_prod', $prod_data)):
			$this->get($prod_data['cod_prod']); //leemos el producto por si existe, no crearlo de nuevo
			
			if($prod_data['cod_prod'] != $this->cod_prod):
				foreach ($prod_data as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
				INSERT INTO productos
				(cod_prod,descripcion,pvp,existencias,descuento)
				VALUES
				('$cod_prod', '$descripcion', '$pvp', '$existencias','$descuento')
				";
				$this->execute_single_query();
			endif;
		endif;
	}
	public function edit($prod_data=array()) {
		foreach ($prod_data as $campo=>$valor):
			$$campo = $valor;
		endforeach;
		$this->query = "
			UPDATE productos
			SET pvp='$pvp',
			descripcion='$descripcion',
			existencias='$existencias',
			descuento='$descuento'
			WHERE cod_prod = '$cod_prod'
		";
		$this->execute_single_query();
		}
	public function delete($cod_prod='') {
		$this->query = "
		DELETE FROM productos
		WHERE cod_prod = '$cod_prod'
		";
		$this->execute_single_query();
	}
	public function editar_pvp($pvp,$cambio){
		$this->query = "
		UPDATE productos
		SET pvp=pvp+pvp*$cambio/100,
		WHERE pvp >= $pvp'$'
	";
	$this->execute_single_query();
	}
	function __destruct() {
		//unset($this);
	}
}
?>