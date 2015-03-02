<?php
/* @var $this EstadoController */
/* @var $data Estado */
?>

<div class="view well">

<div class="row">
	<div class="span1">
		&nbsp;	
	</div>
	<div class="span6">
		
	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tecnico')); ?>:</b>
	<?php echo CHtml::encode(OrdenServicio::model()->getnombreusuario($data->tecnico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_estado')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_estado,array('id'=>'fechaestado')); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_futura')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_futura,array('id'=>'fechafutura')); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('tiempo')); ?>:</b>
	<?php echo CHtml::encode($data->tiempo); ?>
	<br />
	</div>
</div>

</div>