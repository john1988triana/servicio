<?php
/* @var $this OrdenServicioController */
/* @var $model OrdenServicio */

$this->breadcrumbs=array(
	'Ordenes Servicios',
);

$this->menu=array(
	array('label'=>'Crear Orden Servicio', 'url'=>array('createp')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#orden-servicio-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="page-header">	
	<h2>Administrador Orden Servicio</h2>
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
	'id'=>'orden-servicio-grid',
	'itemsCssClass'=>"table table-striped table-bordered table-hover",
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'id_usuario',
			'value'=>'$data->getnombreempresa($data->id_usuario)',
			),
		array(
			'name'=>'id_responsable',
			'filter'=>$model->getListaUsuarios(),
			'value'=>'$data->getnombreusuario($data->id_responsable)',
		),
		'docu_cliente',
		'nom_cliente',
		'tele_cliente',
		'fecha_inicio',
		'tiempo',
		array(
			'name'=>'estado',
			'filter'=>array('1'=>'En Proceso...','2'=>'Finalizado'),
			'value'=>'$data->getOrdenEstado()',
		),
		array(
			'class'=>'CButtonColumn',
				'template'=>'{exportar}{view}{update}{estado}{asignar}{finalizar}{estadof}',
				'buttons'=>array(
					'exportar'=>array(
                           'label'=>'Vista PDF',
                           'url'=>'Yii::app()->createUrl("ordenservicio/exportar",array("id"=>$data->id))',
                           'imageUrl'=>'images/iconos/pdf.gif', 
                    ), 
					'asignar'=>array(
							'visible'=>'($data->estado==1) ? true : false',
                           	'label'=>'Asignar',
                           	'url'=>'Yii::app()->createUrl("ordenservicio/asignar",array("id"=>$data->id))',
                           	'imageUrl'=>'images/iconos/user.png', 
                    ),
                    'estado'=>array(
                    		'visible'=>'($data->estado==1) ? true : false',
                           	'label'=>'Ver Estado',
                           	'url'=>'Yii::app()->createUrl("estado/index",array("id"=>$data->id))',
                           	'imageUrl'=>'images/iconos/time.png', 
                    ),
                    'finalizar'=>array(
                    		'visible'=>'($data->estado==1) ? true : false',
                    		'label'=>'Finalizar Orden',
                           	'url'=>'Yii::app()->createUrl("ordenservicio/finalizar",array("id"=>$data->id))',
                           	'imageUrl'=>'images/iconos/ok.png', 	
                    ),
                    'estadof'=>array(
                    		'visible'=>'($data->estado==2) ? true : false',
                           	'label'=>'Ver Estado',
                           	'url'=>'Yii::app()->createUrl("estado/estadof",array("id"=>$data->id))',
                           	'imageUrl'=>'images/iconos/time.png', 
                    ),
				),   
			),
	),
)); 
?>
</div>