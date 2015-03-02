<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="form well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'empresa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note alert alert-info">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'nombre',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'nombre',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'direccion',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'direccion',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'telefono',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'telefono',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-primary btn-large')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->