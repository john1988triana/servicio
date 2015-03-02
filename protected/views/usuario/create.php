<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrador Usuarios', 'url'=>array('admin')),
);
?>
<div class="page-header">	
	<h2>Creando Usuario</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>