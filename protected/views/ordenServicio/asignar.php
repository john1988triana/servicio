<?php
/* @var $this OrdenServicioController */
/* @var $model OrdenServicio */

if (Yii::app()->authManager->checkAccess('recepcionPcMac',Yii::app()->user->id)){
	$this->breadcrumbs=array(
	'Orden Servicio'=>array('adminp'),
	'Asignar',
	);
	$this->menu=array(
		array('label'=>'Administrador Orden Servicio', 'url'=>array('adminp')),
	);
}	
if(Yii::app()->authManager->checkAccess('tecnico',Yii::app()->user->id)){
	$this->breadcrumbs=array(
	'Orden Servicio'=>array('admin'),
	'Asignar',
	);
	$this->menu=array(
		array('label'=>'Administrador Orden Servicio', 'url'=>array('admin')),
	);	
}
?>
<div class="page-header">	
	<h2>Vista Orden Servicio # <?php echo $model->id; ?></h2>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'htmlOptions'=>array("class"=>"table table-striped table-hover table-bordered"),
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'name'=>'id_usuario',
			'value'=>$model->getnombreempresa($model->id_usuario),
		),
		array(
			'name'=>'id_responsable',
			'value'=>$model->getnombreusuario($model->id_responsable),
		),
		'docu_cliente',
		'nom_cliente',
		'tele_cliente',
		'dire_cliente',
		'mail_cliente',
		'fecha_inicio',
		'fecha_entrega',
	),
)); ?>

<div class="page-header">
	<h2>Asignar Responsable:</h2>
</div>

<?php $this->renderPartial('_form2', array('model'=>$model, 'modelest'=>$modelest)); ?>
