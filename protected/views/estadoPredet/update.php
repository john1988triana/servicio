<?php
/* @var $this EstadoPredetController */
/* @var $model EstadoPredet */

$this->breadcrumbs=array(
	'Estado Predeterminado'=>array('admin'),
	'modificar',
);

$this->menu=array(
	array('label'=>'Ver Estado Predeterminado', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrador Estados Predeterminados', 'url'=>array('admin')),
);
?>
<div class="page-header">	
	<h2>Modificando Estado: <?php echo $model->estado; ?></h2>
</div>

<?php $this->renderPartial('_formupdate', array('model'=>$model)); ?>