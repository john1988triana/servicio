<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('admin'),
	'Vista',
);

$this->menu=array(
	array('label'=>'Modificar Empresa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Administrador Empresas', 'url'=>array('admin')),
);
?>
<div class="page-header">	
	<h2>Vista Empresa # <?php echo $model->id; ?></h2>
</div>
<div class="table-responsive">
	
<?php $this->widget('zii.widgets.CDetailView', array(
	'htmlOptions'=>array("class"=>"table table-striped table-hover table-bordered"),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'direccion',
		'telefono',
	),
)); ?>
</div>
