<?php
/* @var $this EstadoController */
/* @var $dataProvider CActiveDataProvider */



if (Yii::app()->authManager->checkAccess('recepcionPcMac',Yii::app()->user->id)){
	$this->breadcrumbs=array(
		'Ordenes Servicios'=>array('ordenservicio/adminp'),
		'Estados',
	);
	$this->menu=array(
		array('label'=>'Administrador Orden Servicio', 'url'=>array('ordenservicio/adminp')),
	);
}	
if(Yii::app()->authManager->checkAccess('recepcionOtrasEmpresas',Yii::app()->user->id)){
		$this->breadcrumbs=array(
		'Ordenes Servicios'=>array('ordenservicio/adminn'),
		'Estados',
		);
		$this->menu=array(
			array('label'=>'Administrador Orden Servicio', 'url'=>array('ordenservicio/adminn')),
		);	
}
?>
<div class="page-header">	
	<h2>Estados de la orden:</h2>
</div>

<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
?>
