<?php
/* @var $this EstadoPredetController */
/* @var $model EstadoPredet */
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
		<?php echo $form->label($model,'estado',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'estado',array('class'=>'span3')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'descripcion',array('class'=>'span3')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'duracion',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'duracion',array('class'=>'span3')); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton('Buscar',array('class'=>'btn btn-large btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->