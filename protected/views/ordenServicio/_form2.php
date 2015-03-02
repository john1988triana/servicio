<div class="form well">
	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orden-servicio-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<p class="note alert alert-info">El campo marcados con <span class="required">*</span> es Requerido</p>

<?php 
	$html=array(
		'ajax'=>array(
			'url'=>$this->createUrl("estado/EstadosP"),
			'type'=>'POST',
			'update'=>'#Estado_descripcion',
			),
		'class'=>'span10',
		'empty' => '--',
	);

 ?>
	 <div class="row">
		<?php echo $form->labelEx($model,'id_responsable',array('class'=>'span2')); ?>
		<?php echo $form->dropDownList($model,'id_responsable',$model->getListaUsuariospcmac(),array('class'=>'span3','empty'=>'--')); ?>
		<?php echo $form->error($model,'id_responsable',array('class'=>'alert alert-error')); ?>
	</div> 
	<div class="row">
		<?php echo $form->labelEx($modelest,'estado',array('class'=>'span2')); ?>
		<?php echo $form->dropDownList($modelest,'estado',$modelest->getListaEstadoP(),$html); ?>
		<?php echo $form->error($modelest,'estado',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelest,'descripcion',array('class'=>'span2')); ?>
		<?php echo $form->textarea($modelest,'descripcion',array('class'=>'span10')); ?>
		<?php echo $form->error($modelest,'descripcion',array('class'=>'alert alert-error')); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($modelest,'tiempo',array('class'=>'span2')); ?>
		<?php echo $form->textarea($modelest,'tiempo',array('class'=>'span2')); ?>
		<?php echo $form->error($modelest,'tiempo',array('class'=>'alert alert-error')); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn-primary btn-large ','style'=>'display:block;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>