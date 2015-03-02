<div class="form well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estado-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note alert alert-info">Los campos marcados con <strong>*</strong> Son Requeridos.</p>


<?php 
	$html=array(
		'ajax'=>array(
			'url'=>$this->createUrl("EstadosP"),
			'type'=>'POST',
			'update'=>'#Estado_descripcion',
			),
		'class'=>'span10',
		'empty' => '--',
	);

 ?>
	<div class="row">
		<?php echo $form->labelEx($model,'estado',array('class'=>'span2')); ?>
		<?php echo $form->dropDownList($model,'estado',$model->getListaEstadoP(),$html); ?>
		<?php echo $form->error($model,'estado',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion',array('class'=>'span2')); ?>
		<?php echo $form->textarea($model,'descripcion',array('class'=>'span10')); ?>
		<?php echo $form->error($model,'descripcion',array('class'=>'alert alert-error')); ?>
	</div>
	<div class="row">
		<?php //echo $form->labelEx($modelultimo,'tiempo',array('class'=>'span2')); ?>
		<?php echo $form->hiddenField($modelultimo,'tiempo',array('class'=>'span10','id'=>'trascurrido1')); ?>
		<?php echo $form->error($modelultimo,'tiempo',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-primary btn-large','id'=>'enviar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>

