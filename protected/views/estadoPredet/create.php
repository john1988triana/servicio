<?php
/* @var $this EstadoPredetController */
/* @var $model EstadoPredet */

$this->breadcrumbs=array(
	'Estado Predeterminado'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrador Estados Predeterminados', 'url'=>array('admin')),
);
?>
<div class="page-header">
	<h2>Creando Estado Predeterminado</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>