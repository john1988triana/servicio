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
if(Yii::app()->authManager->checkAccess('tecnico',Yii::app()->user->id)){
	$this->breadcrumbs=array(
	'Ordenes Servicios'=>array('ordenservicio/admin'),
	'Estados',
	);		
	$this->menu=array(
		array('label'=>'Administrador Orden Servicio', 'url'=>array('ordenservicio/admin')),
	);	
}
?>
<div class="page-header">	
	<h3>Estado Actual:</h3>
</div>

<table class="table table-striped table-bordered">
<!-- 	<tr>
		<td class="span4"><strong style="font-size:14px"><?php echo CHtml::encode($modelultimo->getAttributeLabel('id')); ?></strong></td>
		<td class="span7"><?php echo CHtml::encode($modelultimo->id); ?></td>
	</tr>
	<tr>
		<td class="span4"><strong style="font-size:14px"><?php echo CHtml::encode($modelultimo->getAttributeLabel('id_orden')); ?></strong></td>
		<td class="span7"><?php echo CHtml::encode($modelultimo->id_orden); ?></td>
	</tr> -->
	<tr>
		<td class="span4"><strong style="font-size:14px"><?php echo CHtml::encode($modelultimo->getAttributeLabel('estado')); ?></strong></td>
		<td class="span7"><?php echo CHtml::encode($modelultimo->estado); ?></td>
	</tr>
	<tr>
		<td class="span4"><strong style="font-size:14px"><?php echo CHtml::encode($modelultimo->getAttributeLabel('descripcion')); ?></strong></td>
		<td class="span7"><?php echo CHtml::encode($modelultimo->descripcion); ?></td>
	</tr>
	<!-- <tr>
		<td class="span4"><strong style="font-size:14px"><?php echo CHtml::encode($modelultimo->getAttributeLabel('tecnico')); ?></strong></td>
		<td class="span7"><?php echo CHtml::encode($modelultimo->tecnico); ?></td>
	</tr> -->
	<tr>
		<td class="span4"><strong style="font-size:14px"><?php echo CHtml::encode($modelultimo->getAttributeLabel('fecha_estado')); ?></strong></td>
		<td class="span7"><p id="fechainicio" style="margin:0px 0px 0px"><?php echo CHtml::encode($modelultimo->fecha_estado); ?></p></td>
	</tr>
	<tr id="colores">
		<td class="span4"><strong style="font-size:14px"><?php echo CHtml::encode("Tiempo Transcurrido"); ?></strong></td>
		<td class="span7"><p id="trascurrido" style="margin:0px 0px 0px"></p></td>
	</tr>
	<tr>
		<td><strong style="font-size:14px">Tiempo Maximo</strong></td>
		<td><p id="tiempito"><?php echo CHtml::encode($modelultimo->tiempo); ?></p></td>
	</tr>
</table>

<div class="page-header">	
	<h3>Estados Anteriores:</h3>
</div>

<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
?>

<div class="page-header">
	<h3>Agregar Nuevo Estado:</h3>
</div>

<?php $this->renderPartial('_form', array('model'=>$model,'modelultimo'=>$modelultimo)); ?>

<script>
 	function convertir(cosa){	
 		return Math.floor(cosa);
 	}
	function colorear(finalito,trasnc){
		finalito = finalito*60;
		etapa1 = finalito/3;
		etapa2 = etapa1*2;
		if(etapa1<trasnc){
			document.getElementById("colores").style.background= '#eff619';
 			document.getElementById("colores").style.color= '#000000';
		} 
		if(etapa2<trasnc){
			document.getElementById("colores").style.background= '#f87a0b';
 			document.getElementById("colores").style.color= '#f1f1f1';
		} 
		if(finalito<trasnc){
			document.getElementById("colores").style.background= '#ff0000';
 			document.getElementById("colores").style.color= '#f1f1f1';
		};
	}

 	function dinamico(){

 	var getfechai = document.getElementById("fechainicio").innerHTML;
 	var tiempocolores = document.getElementById("tiempito").innerHTML;
 	var fechainicio = new Date(getfechai);
 	var fechaactual = new Date();

    var resultado = fechaactual -  fechainicio;
 	var trasn = fechaactual -  fechainicio;
 	var hora = ((trasn/1000)/60)/60;
	var minutos = (trasn/1000)/60;
 	hora = convertir(hora);
 	minutos = convertir(minutos);
 	minutosh = minutos - (60*hora); 
 	var tiempot = tiempocolores[0]+tiempocolores[1];

 	document.getElementById("trascurrido").innerHTML= hora + " Horas " + minutosh + " Minutos";
 	document.getElementById("trascurrido1").value= hora + " Horas " + minutosh + " Minutos";
 	document.getElementById("colores").style.background= '#24cd18';
 	document.getElementById("colores").style.color= '#f1f1f1';

 	setTimeout("dinamico()",1000);
 	colorear(tiempot,minutos);
 	}
 	document.addEventListener('load',dinamico(),false);
</script>