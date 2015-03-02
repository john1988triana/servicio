<?php
/* @var $this DetalleOrdenController */
/* @var $model DetalleOrden */

$this->breadcrumbs=array(
	'Orden Orden'=>array('ordenservicio/adminn'),
	'Ver',
);

$this->menu=array(
	array('label'=>'Administrar Ordenes Servicios', 'url'=>array('ordenservicio/admin')),
);
?>

<div class="page-header">	
	<h2>Vista Detalle Orden #<?php echo $model->id; ?></h2>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'htmlOptions'=>array("class"=>"table table-striped table-hover table-bordered"),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_orden',
		'referencia',
		'serial',
		'contra_cl',
		'contra_di',
		'garantia',
		'prende',
		'imagen',
		'problema',
		'accesorio',
		'back',
		'diagnostico',
		'repuesto',
	),
)); ?>
