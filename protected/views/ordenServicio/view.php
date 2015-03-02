<?php
/* @var $this OrdenServicioController */
/* @var $model OrdenServicio */

if (Yii::app()->authManager->checkAccess('recepcionPcMac',Yii::app()->user->id)){
	$this->breadcrumbs=array(
		'Ordenes Servicios'=>array('adminp'),
		'Vista',
	);
	$this->menu=array(
		array('label'=>'Administrador Orden Servicio', 'url'=>array('adminp')),
	);
}	
if(Yii::app()->authManager->checkAccess('tecnico',Yii::app()->user->id)){
		$this->breadcrumbs=array(
			'Orden Servicio'=>array('admin'),
			'Vista',
		);
		$this->menu=array(
			array('label'=>'Administrador Orden Servicio', 'url'=>array('admin')),
		);	
}
?>
<div class="page-header">	
	<h2>Vista Orden Servicio # <?php echo $model->id; ?></h2>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'htmlOptions'=>array("class"=>"table table-striped table-hover table-bordered"),
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'name'=>'id_usuario',
			'value'=>$model->getnombreempresa($model->id_usuario),
		),
		array(
			'name'=>'id_responsable',
			'value'=>$model->getnombreusuario($model->id_responsable),
		),
		'docu_cliente',
		'nom_cliente',
		'tele_cliente',
		'dire_cliente',
		'mail_cliente',
		'fecha_inicio',
		'fecha_entrega',
		'tiempo',
		array(
			'name'=>'estado',
			'value'=>$model->getOrdenEstado(),
		),
	),
)); ?>
<div class="page-header">	
	<h2>Detalle del Orden:</h2>
</div>
<?php 
	$modeld = DetalleOrden::model();
	$criteria = new CDbCriteria();
	$criteria->addCondition("id_orden = ".$model->id);
 ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'orden-servicio-grid',
	'itemsCssClass'=>"table table-responsive table-striped table-bordered table-hover",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'dataProvider'=>$modeld->search($criteria),
	'columns'=>array(
		'referencia',
		'serial',
		'problema',
		array(
			'class'=>'CButtonColumn',
                'template'=>'{view}{diagnostico}',
                    'buttons'=>array(
                    	'view'=>array(
                           'label'=>'Ver Detalle Orden',
                           'url'=>'Yii::app()->createUrl("detalleorden/view",array("id"=>$data->id))',
                           'imageUrl'=>'images/iconos/search.png', 
                        ),   
                        'diagnostico'=>array(
                           'visible'=>'($data->diagnostico==null) ? true : false',
                           'label'=>'Agregar Diagnostico',
                           'url'=>'Yii::app()->createUrl("detalleorden/update2",array("id"=>$data->id))',
                           'imageUrl'=>'images/iconos/edit.png', 
                        ),    
              
                    ),
			),
	),
)); ?>
