<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Crear Role',
);

$this->menu=array(
	array('label'=>'Administrador Usuarios', 'url'=>array('admin')),
);
?>
<div class="page-header">	
	<h2>Creando Rol</h2>
</div>

<div class="form well">
	<?php $form=$this->beginWidget("CActiveForm",array(
		"id"=>"role-form",
		"enableAjaxValidation"=>true,
		"clientOptions"=>array("validateOnSubmit"=>true),
	)); ?>
		
	<p class="note alert alert-info">Los campos marcados con <span class="required">*</span> son requeridos. </p>

	<div class="row">
		<?php echo $form->labelEx($model,"name",array('class'=>'span2')); ?>
		<?php echo $form->textField($model,"name",array('class'=>'span3')); ?>
		<?php echo $form->error($model,"name",array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">	
		<?php echo $form->labelEx($model,"description",array('class'=>'span2')); ?>
		<?php echo $form->textField($model,"description",array('class'=>'span3')); ?>
		<?php echo $form->error($model,"description",array('class'=>'alert alert-error')); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Crear',array('class'=>'btn btn-primary btn-large')); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>