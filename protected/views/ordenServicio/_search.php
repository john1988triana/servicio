<?php
/* @var $this OrdenServicioController */
/* @var $model OrdenServicio */
/* @var $form CActiveForm */
?>

<div class="wide form well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="row">
	
<div class="span6">
	
	<div class="row">
		<?php echo $form->label($model,'id',array('class'=>'span4')); ?>
		<?php echo $form->textField($model,'id',array('class'=>'span5')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario',array('class'=>'span4')); ?>
		<?php echo $form->textField($model,'id_usuario',array('class'=>'span5')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_responsable',array('class'=>'span4')); ?>
		<?php echo $form->textField($model,'id_responsable',array('class'=>'span5')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'docu_cliente',array('class'=>'span4')); ?>
		<?php echo $form->textField($model,'docu_cliente',array('class'=>'span5')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nom_cliente',array('class'=>'span4')); ?>
		<?php echo $form->textField($model,'nom_cliente',array('class'=>'span5')); ?>
	</div>
</div>
<div class="span6">
	
	<div class="row">
		<?php echo $form->label($model,'tele_cliente',array('class'=>'span4')); ?>
		<?php echo $form->textField($model,'tele_cliente',array('class'=>'span5')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dire_cliente',array('class'=>'span4')); ?>
		<?php echo $form->textField($model,'dire_cliente',array('class'=>'span5')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mail_cliente',array('class'=>'span4')); ?>
		<?php echo $form->textField($model,'mail_cliente',array('class'=>'span5')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_inicio',array('class'=>'span4')); ?>
		<?php echo $form->textField($model,'fecha_inicio',array('class'=>'span5')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_entrega',array('class'=>'span4')); ?>
		<?php echo $form->textField($model,'fecha_entrega',array('class'=>'span5')); ?>
	</div>
</div>
</div>

	<div class="row">
		<?php echo CHtml::submitButton('Buscar',array('class'=>'btn btn-large btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->