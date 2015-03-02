<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Vista',
);

$this->menu=array(
	array('label'=>'Modificar Usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Administrador Usuarios', 'url'=>array('admin')),
);
?>
<div class="page-header">	
	<h2>Vista Usuario: <?php echo $model->nom_usuario; ?></h2>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'htmlOptions'=>array("class"=>"table table-striped table-hover table-bordered"),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom_usuario',
		'descri_usuario',
		array(
			'name'=>'empresa',
			'value'=>Usuario::model()->getnombreempresa($model->empresa),
			),
	),
)); ?>

<div class="page-header">	
	<h3>Asignar Roles: </h3>
</div>
<div class="table-responsive">
	
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th class="text-center">Rol</th>
			<th>Descripcion</th>
			<th>Asignar</th>
			<th>Estado</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach(Yii::app()->authManager->getAuthItems() as $data) : ?>
	<?php $si = Yii::app()->authManager->checkAccess($data->name,$model->id) ?>
		<tr>
			<td><?php echo $data->name ?></td>
			<td><?php echo $data->description ?></td>
			<td><?php echo CHtml::link($si?"No":"Si",array("usuario/assign","id"=>$model->id,"item"=>$data->name),array("class"=>$si?"btn btn-primary":"btn")) ?></td>
			<td><?php echo $si?"<span class='label label-success'>Asignado</span>":"<span class='label label-important'>No esta designado</span>" ?></td>
		</tr>
	<?php endforeach; ?>	
	</tbody>
</table>

</div>
