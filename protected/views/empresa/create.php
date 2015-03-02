<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrador Empresas', 'url'=>array('admin')),
);
?>
<div class="page-header">	
	<h2>Creando Empresa </h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>