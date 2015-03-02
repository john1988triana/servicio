<?php
/* @var $this DetalleOrdenController */
/* @var $model DetalleOrden */
/* @var $form CActiveForm */
?>

<div class="form well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detalle-orden-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note alert alert-info">Los campos con <span class="required">*</span> Son Requeridos</p>

	<div class="row">
		<?php //$form->labelEx($model,'id_orden',array('class'=>'span2')); ?>
		<?php echo $form->hiddenField($model,'id_orden',array('class'=>'span3','id'=>'orden')); ?>
		<?php echo $form->error($model,'id_orden',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'referencia',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'referencia',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'referencia',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'serial',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'serial',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'serial',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contra_cl',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'contra_cl',array('class'=>'span3')); ?>
		<!-- <p class="alert alert-success span5">Opcional...</p> -->
		<?php //echo $form->dateField($model,'contra_cl',array('class'=>"alert alert-success span5")); ?>
		<?php echo $form->error($model,'contra_cl',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contra_di',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'contra_di',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'contra_di',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'garantia',array('class'=>'span2')); ?>
		<?php echo $form->dropDownList($model,'garantia',array("Si"=>"Si","No"=>"No"),array('class'=>'span3','empty'=>'--')); ?>
		<?php echo $form->error($model,'garantia',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prende',array('class'=>'span2')); ?>
		<?php echo $form->dropDownList($model,'prende',array("Si"=>"Si","No"=>"No"),array('class'=>'span3','empty'=>'--')); ?>
		<?php echo $form->error($model,'prende',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagen',array('class'=>'span2')); ?>
		<?php echo $form->dropDownList($model,'imagen',array("Si"=>"Si","No"=>"No"),array('class'=>'span3','empty'=>'--')); ?>
		<?php echo $form->error($model,'imagen',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'problema',array('class'=>'span2')); ?>
		<?php echo $form->textarea($model,'problema',array('class'=>'span8')); ?>
		<?php echo $form->error($model,'problema',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accesorio',array('class'=>'span2')); ?>
		<?php echo $form->textarea($model,'accesorio',array('class'=>'span8')); ?>
		<?php echo $form->error($model,'accesorio',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'back',array('class'=>'span2')); ?>
		<?php echo $form->dropDownList($model,'back',array("Si"=>"Si","No"=>"No"),array('class'=>'span3','empty'=>'--')); ?>
		<?php echo $form->error($model,'back',array('class'=>'alert alert-error')); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'diagnostico'); ?>
		<?php echo $form->textField($model,'diagnostico',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'diagnostico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'repuesto'); ?>
		<?php echo $form->textField($model,'repuesto',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'repuesto'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-large btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	$("#orden").val("<?php echo $_GET['id']; ?>");
</script>