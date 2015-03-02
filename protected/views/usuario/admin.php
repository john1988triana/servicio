<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Crear Rol', 'url'=>array('roles')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="page-header">	
	<h2>Administrar Usuarios</h2>
</div>	

<p class="alert alert-info">Tambi&eacute;n puede escribir un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al inicio de cada uno de los valores de b&uacute;squeda para especificar como se debe hacer la comparaci&oacute;n.</p>

<?php echo CHtml::link('B&uacute;queda Avanzada','#',array('class'=>'search-button label label-info')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="table-responsive">	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'itemsCssClass'=>"table table-responsive table-striped table-bordered table-hover",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nom_usuario',
		'descri_usuario',
		array(
			'name'=>'empresa',
			'filter'=>$model->getListaEmpresa(),
			'value'=>'$data->getnombreempresa($data->empresa)',
			),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
