<?php
/* @var $this EstadoPredetController */
/* @var $model EstadoPredet */

$this->breadcrumbs=array(
	'Estado Predeterminado'=>array('admin'),
	'Vista',
);

$this->menu=array(
	array('label'=>'Modificar Estado Predeterminado', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Administrador Estados Predeterminados', 'url'=>array('admin')),
);
?>
<div class="page-header">
	<h2>Vista Estado # <?php echo $model->id; ?></h2>
</div>
<div class="table-responsive">
	
<?php $this->widget('zii.widgets.CDetailView', array(
	'htmlOptions'=>array("class"=>"table table-striped table-hover table-bordered"),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'estado',
		'descripcion',
		array(
		'name'=>'duracion',
		'value'=>$model->duracion.' horas',
		),
	),
)); ?>
</div>
