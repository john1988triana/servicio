<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Ver Usuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrador Usuarios', 'url'=>array('admin')),
);
?>
<div class="page-header">	
	<h2>Modificando Usuario: <?php echo $model->nom_usuario; ?></h2>
</div>

<?php $this->renderPartial('_formup', array('model'=>$model)); ?>