<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas',
);

$this->menu=array(
	array('label'=>'Crear Empresa', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#empresa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="page-header">
		<h2>Administrar Empresas</h2>
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
	'id'=>'empresa-grid',
	'itemsCssClass'=>"table table-responsive table-striped table-bordered table-hover",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'direccion',
		'telefono',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
