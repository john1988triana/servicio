<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('Admin'),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Ver Empresa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrador Empresas', 'url'=>array('admin')),
);
?>
<div class="page-header">	
	<h2>Modificando Empresa: <?php echo $model->nombre; ?></h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>