<?php 

class Funciones
{
	
	public $mDetalle = DetalleOrden::model();
	public $mEmpresa = Empresa::model();
	public $mEstado = Estado::model();
	public $mEstadoP = EstadoPredet::model();
	public $mOrden = OrdenServicio::model();
	public $mUsuario = Usuario::model();

	public function getNombre()
	{
		
	}
}



 ?>