<?php
/* @var $this EstadoPredetController */
/* @var $model EstadoPredet */
/* @var $form CActiveForm */
?>

<div class="form well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estado-predet-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<p class="note alert alert-info">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'estado',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'estado',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'estado',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion',array('class'=>'span2')); ?>
		<?php echo $form->textarea($model,'descripcion',array('class'=>'span10')); ?>
		<?php echo $form->error($model,'descripcion',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duracion',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'duracion',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'duracion',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-primary btn-large')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->