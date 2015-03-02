<?php
/* @var $this OrdenServicioController */
/* @var $model OrdenServicio */

if (Yii::app()->authManager->checkAccess('recepcionPcMac',Yii::app()->user->id)){
	$this->breadcrumbs=array(
		'Orden Servicio'=>array('adminp'),
		'Modificar',
	);
	$this->menu=array(
		array('label'=>'Administrador Orden Servicio', 'url'=>array('ordenservicio/adminp')),
	);
}	
if(Yii::app()->authManager->checkAccess('recepcionOtrasEmpresas',Yii::app()->user->id)){
	$this->breadcrumbs=array(
		'Orden Servicio'=>array('adminn'),
		'Modificar',
	);
	$this->menu=array(
		array('label'=>'Administrador Orden Servicio', 'url'=>array('adminn')),
	);	
}
?>
<div class="page-header">	
	<h2>Modificando Orden Servicio # <?php echo $model->id; ?></h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>