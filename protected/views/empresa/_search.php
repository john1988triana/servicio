<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="wide form well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'id',array('class'=>'span3')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'nombre',array('class'=>'span3')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direccion',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'direccion',array('class'=>'span3')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'telefono',array('class'=>'span3')); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton('Buscar',array('class'=>'btn btn-large btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->