<?php
/* @var $this DetalleOrdenController */
/* @var $model DetalleOrden */

$this->breadcrumbs=array(
	'Orden Orden'=>array('ordenservicio/admin'),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Administrar Ordenes Servicios', 'url'=>array('ordenservicio/admin')),
);
?>

<div class="page-header">	
	<h2>Creando Diagnostico del orden de Servicio #<?php echo $model->id; ?></h2>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'htmlOptions'=>array("class"=>"table table-striped table-hover table-bordered"),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_orden',
		'referencia',
		'serial',
		'contra_cl',
		'contra_di',
		'garantia',
		'prende',
		'imagen',
		'problema',
		'accesorio',
		'back',
	),
)); ?>
<hr>
<br>
<div class="form well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detalle-orden-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'diagnostico',array('class'=>'span2')); ?>
		<?php echo $form->textarea($model,'diagnostico',array('class'=>'span8')); ?>
		<?php echo $form->error($model,'diagnostico',array("class"=>"alert alert-error")); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'repuesto',array('class'=>'span2')); ?>
		<?php echo $form->textarea($model,'repuesto',array('class'=>'span8')); ?>
		<?php echo $form->error($model,'repuesto',array("class"=>"alert alert-error")); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-large btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->