<?php
/* @var $this DetalleOrdenController */
/* @var $model DetalleOrden */

$this->breadcrumbs=array(
	'Orden Orden'=>array('ordenservicio/adminn'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrar Ordenes de Servicio', 'url'=>array('ordenservicio/adminn')),
);
?>

<div class="page-header">	
	<h2>Creando Detalle Orden</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>