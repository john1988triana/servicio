<?php
/* @var $this OrdenServicioController */
/* @var $model OrdenServicio */
/* @var $form CActiveForm */
?>

<div class="form well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orden-servicio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note alert alert-info">Los campos marcados con <span class="required">*</span> Son Requeridos</p>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario',array('class'=>'span2')); ?>
		<?php echo $form->dropDownList($model,'id_usuario',$model->getListaEmpresa(),array('class'=>'span3','empty'=>'--')); ?>
		<?php echo $form->error($model,'id_usuario',array('class'=>'alert alert-error')); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'id_responsable',array('class'=>'span2')); ?>
		<?php echo $form->dropDownList($model,'id_responsable',$model->getListaUsuarios(),array('class'=>'span3','empty'=>'--')); ?>
		<?php echo $form->error($model,'id_responsable',array('class'=>'alert alert-error')); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'docu_cliente',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'docu_cliente',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'docu_cliente',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nom_cliente',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'nom_cliente',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'nom_cliente',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tele_cliente',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'tele_cliente',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'tele_cliente',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dire_cliente',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'dire_cliente',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'dire_cliente',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mail_cliente',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'mail_cliente',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'mail_cliente',array('class'=>'alert alert-error')); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'fecha_inicio'); ?>
		<?php echo $form->textField($model,'fecha_inicio'); ?>
		<?php echo $form->error($model,'fecha_inicio',array('class'=>'alert alert-error')); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'fecha_entrega'); ?>
		<?php echo $form->textField($model,'fecha_entrega'); ?>
		<?php echo $form->error($model,'fecha_entrega',array('class'=>'alert alert-error')); ?>
	</div>
 -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-primary btn-large ','style'=>'display:block;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->