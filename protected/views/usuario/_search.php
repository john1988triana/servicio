<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id',array('class'=>'span2')); ?>
		<?php echo $form->passwordField($model,'id',array('class'=>'span3')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nom_usuario',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'nom_usuario',array('class'=>'span3')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contra_usuario',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'contra_usuario',array('class'=>'span3')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descri_usuario',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'descri_usuario',array('class'=>'span3')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'empresa',array('class'=>'span2')); ?>
		<?php echo $form->dropDownList($model,'empresa',$model->getListaEmpresa(),array('class'=>'span3','empty'=>'--')); ?>
	</div>
	<div class="row">
		<?php echo CHtml::submitButton('Buscar',array('class'=>'btn btn-large btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->