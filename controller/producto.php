<?php 

require_once 'model/producto.php';

class productoController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->view = 'list_producto';
		$this->page_title = '';
		$this->noteObj = new Producto();
	}

	/* Listar productos */
	public function list(){
		$this->page_title = 'Listado de productos';
		return $this->noteObj->getProductos();
	}
	/* Nuevo Producto */
	public function nuevo(){
		$this->page_title = 'Nuevo Producto';
		$this->view = 'nuevo_producto';
	}

	/* Guardar Nuevo */
	public function guardarnuevo(){
		$guardar = $this->noteObj->guardarProducto($_GET['nombre_producto'], $_GET['referencia_producto'], $_GET['precio_producto'], $_GET['peso_producto'], $_GET['categoria_producto'], $_GET['stock_producto']);
		echo '<script>alert("Producto guardado correctamente"); location.href="./index.php?controller=producto&action=list";</script>';
	}

	/* Editar Producto */
	public function editar(){
		$this->page_title = 'Editar Producto';
		$this->view = 'editar_producto';
		return $this->noteObj->obtenerProducto($_GET['id_producto']);
	}

	/* Guardar Edicion Producto */
	public function guardaredicion(){
		$guardar = $this->noteObj->guardaredicionProducto($_GET['id_producto'], $_GET['nombre_producto'], $_GET['referencia_producto'], $_GET['precio_producto'], $_GET['peso_producto'], $_GET['categoria_producto']);
		echo '<script>alert("Producto actualizado correctamente"); location.href="./index.php?controller=producto&action=list";</script>';
	}

	/* Nuevo movimiento */
	public function nuevomovimiento(){
		$this->page_title = 'Nuevo Movimiento a Producto';
		$this->view = 'movimiento_producto';
		return $this->noteObj->obtenerProducto($_GET['id_producto']);
	}

	/** Guardar Movimiento */
	public function guardarmovimiento(){
		$stockactual = intval($_GET['stockactual']);
		$cantidad_producto = intval($_GET['cantidad_producto']);
		$movimiento_producto = intval($_GET['movimiento_producto']);
		if($movimiento_producto == 1 && ($cantidad_producto > $stockactual)){//SI ES SALIDA COMPARAMOS QUE HAYA STOCK
			$mensaje = 'Lo sentimos, la salida no puede superar el stock actual del producto';
		}else{
			$guardar = $this->noteObj->guardarMovimiento($_GET['id_producto'], $cantidad_producto, $movimiento_producto, $stockactual);
			$mensaje = 'Movimiento registrado exitosamente';
		}
		
		echo '<script>alert("'.$mensaje.'"); location.href="./index.php?controller=producto&action=list";</script>';
	}

	/** Ver movimientos de producto */
	public function vermovimientos(){
		$this->page_title = 'Movimientos de Producto';
		$this->view = 'detallemovimientos_producto';
		return $this->noteObj->obtenerMovimientosProducto($_GET['id_producto']);
	}
}

?>