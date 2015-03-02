<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note alert alert-info">Los campos marcados con <span class="required">*</span> son requeridos. </p>

	<div class="row">
		<?php echo $form->labelEx($model,'nom_usuario',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'nom_usuario',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'nom_usuario',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contra_usuario',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'contra_usuario',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'contra_usuario',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descri_usuario',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'descri_usuario',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'descri_usuario',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'empresa',array('class'=>'span2')); ?>
		<?php echo $form->dropDownList($model,'empresa',$model->getListaEmpresa(),array('class'=>'span3','empty'=>'--')); ?>
		<?php echo $form->error($model,'empresa',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-primary btn-large')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->