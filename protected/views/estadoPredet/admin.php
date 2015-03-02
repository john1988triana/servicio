<?php
/* @var $this EstadoPredetController */
/* @var $model EstadoPredet */

$this->breadcrumbs=array(
	'Estados Predeterminados',
);

$this->menu=array(
	array('label'=>'Crear Estado Predeterminado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#estado-predet-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="page-header">	
	<h2>Administrador Estado Predeterminados</h2>
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
	'id'=>'estado-predet-grid',
	'itemsCssClass'=>"table table-responsive table-striped table-bordered table-hover",
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'estado',
		'descripcion',
		'duracion',
		array(
			'class'=>'CButtonColumn',
                'template'=>'{view}{update}',
			),
	),
)); ?>
</div>
