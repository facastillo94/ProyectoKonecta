<?php 

class Producto {

	private $table = 'producto';
	private $conection;

	public function __construct() {
		
	}

	/* Set conexion */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* obtener todos los productos habilitados */
	public function getProductos(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table." ORDER BY nombre_producto;";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Ingresar nuevo producto */
	public function guardarProducto($nombre_producto, $referencia_producto, $precio_producto, $peso_producto, $categoria_producto, $stock_producto){
		$this->getConection();
		$sql = "INSERT INTO ".$this->table. " VALUES (NULL, '".$nombre_producto."', '".$referencia_producto."', '".$precio_producto."', '".$peso_producto."', '".$categoria_producto."', '".$stock_producto."', '".date("Y-m-d")."')";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute();
	}
	/* obtener producto por id */
	public function obtenerProducto($id_producto){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table." WHERE id_producto='".$id_producto."' ORDER BY nombre_producto;";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}
	/* Guardar Edicion Producto */
	public function guardaredicionProducto($id_producto, $nombre_producto, $referencia_producto, $precio_producto, $peso_producto, $categoria_producto){
		$this->getConection();
		$sql = "UPDATE ".$this->table. " SET nombre_producto='".$nombre_producto."', referencia_producto='".$referencia_producto."', precio_producto='".$precio_producto."', peso_producto='".$peso_producto."', categoria_producto='".$categoria_producto."' WHERE id_producto='".$id_producto."';";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute();
	}

	/* Guardar Movimiento de producto */
	public function guardarMovimiento($id_producto, $cantidad_producto, $movimiento_producto, $stockactual){
		$this->getConection();
		if(intval($movimiento_producto) == 1){//SI ES SALIDA
			$sql = "UPDATE ".$this->table. " SET stock_producto='".($stockactual - $cantidad_producto)."' WHERE id_producto='".$id_producto."';";
		}
		if(intval($movimiento_producto) == 0){//SI ES ENTRADA
			$sql = "UPDATE ".$this->table. " SET stock_producto='".($stockactual + $cantidad_producto)."' WHERE id_producto='".$id_producto."';";
		}
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();
		$stmt1 = $this->conection->prepare("INSERT INTO movimientos VALUES (NULL, '".$id_producto."', '".$cantidad_producto."', '".$movimiento_producto."', '".date("Y-m-d H:i:s")."')");
		$stmt1->execute();
	}

	/** Obtener movimientos de producto */
	public function obtenerMovimientosProducto($id_producto){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table." INNER JOIN movimientos ON id_producto_movimiento=id_producto AND id_producto='".$id_producto."' ORDER BY nombre_producto;";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}
}

?>