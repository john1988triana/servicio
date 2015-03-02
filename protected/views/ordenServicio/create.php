<?php
/* @var $this OrdenServicioController */
/* @var $model OrdenServicio */

$this->breadcrumbs=array(
	'Orden Servicio'=>array('adminn'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrador Orden Servicio', 'url'=>array('adminn')),
);
?>
<div class="page-header">	
	<h2>Creando Orden Servicio</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
