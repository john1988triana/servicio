<?php
/* @var $this OrdenServicioController */
/* @var $model OrdenServicio */

$this->breadcrumbs=array(
	'Orden Servicio'=>array('adminp'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrador Orden Servicio', 'url'=>array('adminp')),
);
?>
<div class="page-header">	
	<h2>Creando Orden Servicio</h2>
</div>

<?php $this->renderPartial('_formp', array('model'=>$model)); ?>