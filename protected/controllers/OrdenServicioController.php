<?php

class OrdenServicioController extends Controller
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
				'actions'=>array('adminp','asignar','createp','estado','finalizar','update','view','exportar'),
				'roles'=>array('recepcionPcMac'),
			),
			array('allow', 
				'actions'=>array('admin','view','asignar'),
				'roles'=>array('tecnico'),
			),
			array('allow', 
				'actions'=>array('adminn','create','exportar','update','delete',),
				'roles'=>array('recepcionOtrasEmpresas'),
			),
			array('deny', 
				'users'=>array('*'),
			),
		);
	}

	public function actionExportar($id)
	{
		$model=$this->loadModel($id);
		$modetalle=DetalleOrden::model()->findByAttributes(array('id_orden'=>$model->id));
		$content = $this->renderPartial("exportar",array('id'=>$id,'model'=>$model,'modetalle'=>$modetalle,),true);
		$mdpf = Yii::app()->ePdf->mpdf();
		$mdpf->WriteHTML($content);
		$mdpf->Output();
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new OrdenServicio;
		$modelito= OrdenServicio::model();
		if(isset($_POST['OrdenServicio']))
		{
			$Fechai=date("Y-m-d");
			$Fechae=date("Y-m-d", strtotime($Fechai. ' 4 day' ));
			$model->attributes=$_POST['OrdenServicio'];
			$model->id_usuario=$modelito->getidempresa(Yii::app()->user->getState('nempresa'));
	 	 	$model->id_responsable=Yii::app()->user->id;
			$model->fecha_inicio=$Fechai;
	 	 	$model->fecha_entrega=$Fechae;
	 	 	$model->tiempo=0;
	 	 	$model->estado=1;
			if($model->save())
				$this->redirect(array('detalleorden/create','id'=>Yii::app()->db->getLastInsertID('orden_servicio')));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreatep()
	{
		$model=new OrdenServicio;

		if(isset($_POST['OrdenServicio']))
		{
			$Fechai=date("Y-m-d");
			$Fechae=date("Y-m-d", strtotime($Fechai. ' 4 day' ));
			$model->attributes=$_POST['OrdenServicio'];
	 	 	$model->id_responsable=Yii::app()->user->id;
			$model->fecha_inicio=$Fechai;
	 	 	$model->fecha_entrega=$Fechae;
	 	 	$model->tiempo=0;
	 	 	$model->estado=1;
			if($model->save())
				$this->redirect(array('detalleorden/create2','id'=>Yii::app()->db->getLastInsertID('orden_servicio')));
		}

		$this->render('createp',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['OrdenServicio']))
		{
			$model->attributes=$_POST['OrdenServicio'];
			if($model->save())
				$this->redirect(Yii::app()->createUrl("ordenservicio/adminn"));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionFinalizar($id)
	{
		$model=$this->loadModel($id);
		$model->attributes;
		$model->fecha_entrega=date("Y-m-d");
		$model->estado=2;
		if($model->save())
		{	
				$modelest=new Estado;
				$tiempito=0;
				$fecha=date("Y-m-d H:i:s");
				$fechaf=date("Y-m-d H:i:s", strtotime($tiempito.' hours' ));
				$modelest->id_orden=$model->id;
				$modelest->estado="Finalizado";
				$modelest->descripcion="Se da por finalizada la orden y se entrega el producto sin novedad";
				$modelest->tecnico=Yii::app()->user->id;
				$modelest->fecha_estado=$fecha;
				$modelest->fecha_futura=$fechaf;
				$modelest->tiempo=$tiempito." horas";
				if($modelest->save()){		
					$this->redirect(array('adminp'));
				}
		}
	}


	public function actionAsignar($id)
	{
		$model=$this->loadModel($id);
		$modelest=new Estado;

		if(isset($_POST['OrdenServicio']) && isset($_POST['Estado']))
		{
			$model->attributes=$_POST['OrdenServicio'];
			$modelest->attributes=$_POST['Estado'];
			$modespre=EstadoPredet::model()->findByAttributes(array('estado'=>$_POST['Estado']['estado']));
			$tiempito=$modespre->duracion;
			$fecha=date("Y-m-d H:i:s");
			$fechaf=date("Y-m-d H:i:s", strtotime($tiempito.' hours' ));
			$modelest->id_orden=$model->id;
			$modelest->estado=$_POST['Estado']['estado'];
			$modelest->descripcion=$_POST['Estado']['descripcion'];
			$modelest->tecnico=Yii::app()->user->id;
			$modelest->fecha_estado=$fecha;
			$modelest->fecha_futura=$fechaf;
			$modelest->tiempo=$tiempito." horas";

			if($model->save() && $modelest->save()){
				if(Yii::app()->authManager->checkAccess('recepcionPcMac',Yii::app()->user->id)){
					$this->redirect(Yii::app()->createUrl("ordenservicio/adminp"));
				}
				if(Yii::app()->authManager->checkAccess('tecnico',Yii::app()->user->id)){
					$this->redirect(Yii::app()->createUrl("ordenservicio/admin"));
				}
				
			}

		}

		$this->render('asignar',array(
			'model'=>$model,
			'modelest'=>$modelest,
		));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('OrdenServicio');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new OrdenServicio('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdenServicio']))
			$model->attributes=$_GET['OrdenServicio'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAdminn()
	{
		$model=new OrdenServicio('search');
		$modelito=OrdenServicio::model()->findAll();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdenServicio']))
			$model->attributes=$_GET['OrdenServicio'];

		$this->render('adminn',array(
			'model'=>$model,'modelito'=>$modelito,
		));
	}

	public function actionAdminp()
	{
		$model=new OrdenServicio('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdenServicio']))
			$model->attributes=$_GET['OrdenServicio'];

		$this->render('adminp',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=OrdenServicio::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página solicitada no existe.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='orden-servicio-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}