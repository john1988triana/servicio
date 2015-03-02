<?php

class EstadoController extends Controller
{
	public $layout='//layouts/column2';

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
				'actions'=>array('prueba','estadosp','estadof'),
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('estado'),
				'roles'=>array('recepcionOtrasEmpresas'),
			),
			array('allow', 
				'actions'=>array('index'),
				'roles'=>array('tecnico'),
			),
			array('allow', 
				'actions'=>array('index'),
				'roles'=>array('recepcionPcMac'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex($id)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_orden = ".$id);
		$criteria->order="id DESC";
		$dataProvider=new CActiveDataProvider('Estado',array('criteria'=>$criteria)); 
		$modelultimo= Estado::model()->findByAttributes(array("id_orden"=>$_GET['id']),array('order'=>'id DESC'));
		$model = new Estado;
		if(isset($_POST['Estado']))
		{
			$model->attributes=$_POST['Estado'];
			$modespre=EstadoPredet::model()->findByAttributes(array('estado'=>$_POST['Estado']['estado']));
			$tiempito=$modespre->duracion;
			$fecha=date("Y-m-d H:i:s");
			$fechaf=date("Y-m-d H:i:s", strtotime($tiempito.' hours' ));
			$model->id_orden=$id;
			$model->estado=$_POST['Estado']['estado'];
			$model->descripcion=$_POST['Estado']['descripcion'];
			$model->tecnico=Yii::app()->user->id;
			$model->fecha_estado=$fecha;
			$model->fecha_futura=$fechaf;
			$model->tiempo=$tiempito." horas";
			if($model->save()){
				$modelultimo->attributes;
				$modelultimo->fecha_futura=date("Y-m-d H:i:s");
				$modelultimo->tiempo=$_POST['Estado']['tiempo'];
				if($modelultimo->save()){	
	 				$this->redirect(array('index','id'=>$id));
				}
			}
		}
		$this->render('index',array(
			'dataProvider'=>$dataProvider,'model'=>$model,'modelultimo'=>$modelultimo,
		));
	}

	public function actionPrueba()
	{
		$i=0;
		$model=OrdenServicio::model()->findAllByAttributes(array('estado'=>1));
		foreach($model as $data):	
		$i=$i+1; 
		$fi = $data->fecha_inicio;
		$ff = date("Y-m-d H:i:s");
		$segundos=strtotime($ff) - strtotime($fi);
		$diferencia_dias=intval($segundos/60/60/24);
		$data->attributes;
		$data->tiempo=$diferencia_dias;
		if ($data->save()) {
			echo $i."Exitosamente...<br>";
		}
		echo "$fi - $ff = $diferencia_dias dias <hr>";
		endforeach;
		$c = 24;
		$f = date("Y-m-d H:i:s");
	 	$t = date("Y-m-d H:i:s", strtotime($c.' hours' ));
		$fecha="2015-01-21 22:50:00";
		$fechah=strtotime('now');
		$segundos=strtotime($f) - strtotime($t);
		$diferencia_dias=intval($segundos/60/60/24);
		echo "La cantidad de días entre el ".$t." - ".$f." = <b>".$diferencia_dias."</b>";
		return;
	}

	public function actionEstadosP()
	{
		$buscar = $_POST['Estado']['estado'];
		$model= EstadoPredet::model()->findByAttributes(array('estado'=>$buscar));
		echo $model->descripcion;
	}

	public function actionEstado($id)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_orden = ".$id);
		$criteria->order="id DESC";
		$modelultimo= Estado::model()->findByAttributes(array("id_orden"=>$_GET['id']),array('order'=>'id DESC'));

		$dataProvider=new CActiveDataProvider('Estado',array('criteria'=>$criteria));
		$this->render('estado',array(
			'dataProvider'=>$dataProvider,'modelultimo'=>$modelultimo,
		));
	}

	public function actionEstadof($id)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_orden = ".$id);
		$criteria->order="id DESC";

		$dataProvider=new CActiveDataProvider('Estado',array('criteria'=>$criteria));
		$this->render('estadof',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function loadModel($id)
	{
		$model=Estado::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página solicitada no existe.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='estado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
