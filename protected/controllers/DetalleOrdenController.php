<?php
class DetalleOrdenController extends Controller
{
	public $layout='//layouts/column2';
	public $defaultAction='admin';

	public function filters()
	{
		return array(
			'accessControl', 
			'postOnly + delete',
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('view','update2'),
				'roles'=>array('tecnico'),
			),
			array('allow',
				'actions'=>array('create'),
				'roles'=>array('recepcionOtrasEmpresas'),
			),
			array('allow',
				'actions'=>array('create2'),
				'roles'=>array('recepcionPcMac'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new DetalleOrden;

		if(isset($_POST['DetalleOrden']))
		{
			$model->attributes=$_POST['DetalleOrden'];
			if($model->save()){	
				$iddetalle=DetalleOrden::model()->findByPk(Yii::app()->db->getLastInsertID('detalle_orden'));
				$modelestp = EstadoPredet::model()->findByPk(1);	
				$modelest=new Estado;
				$tiempito=$modelestp->duracion;
				$fecha=date("Y-m-d H:i:s");
				$fechaf=date("Y-m-d H:i:s", strtotime($tiempito.' hours' ));
				$modelest->id_orden= $iddetalle->id_orden;
				$modelest->estado=$modelestp->estado;
				$modelest->descripcion=$modelestp->descripcion;
				$modelest->tecnico=Yii::app()->user->id;
				$modelest->fecha_estado=$fecha;
				$modelest->fecha_futura=$fechaf;
				$modelest->tiempo=$tiempito." horas";
				if($modelest->save()){	
					$this->redirect(Yii::app()->createUrl("ordenservicio/adminn"));	
				}
			}		
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreate2()
	{
		$model=new DetalleOrden;

		if(isset($_POST['DetalleOrden']))
		{
			$model->attributes=$_POST['DetalleOrden'];
			if($model->save()){
					
				$iddetalle=DetalleOrden::model()->findByPk(Yii::app()->db->getLastInsertID('detalle_orden'));
				$modelestp = EstadoPredet::model()->findByPk(2);	
				$modelest=new Estado;
				$tiempito=$modelestp->duracion;
				$fecha=date("Y-m-d H:i:s");
				$fechaf=date("Y-m-d H:i:s", strtotime($tiempito.' hours' ));
				$modelest->id_orden= $iddetalle->id_orden;
				$modelest->estado=$modelestp->estado;
				$modelest->descripcion=$modelestp->descripcion;
				$modelest->tecnico=Yii::app()->user->id;
				$modelest->fecha_estado=$fecha;
				$modelest->fecha_futura=$fechaf;
				$modelest->tiempo=$tiempito." horas";
				if($modelest->save()){
						$this->redirect(Yii::app()->createUrl("ordenservicio/adminp"));	
				}
			}
		}
		$this->render('create2',array(
			'model'=>$model,
		));
	}

	public function actionUpdate2($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['DetalleOrden']))
		{
			$model->attributes=$_POST['DetalleOrden'];
			if($model->save())
				$this->redirect(Yii::app()->createUrl("ordenservicio/admin"));
		}

		$this->render('update2',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=DetalleOrden::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página solicitada no existe.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='detalle-orden-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}