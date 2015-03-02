<?php

class EstadoPredetController extends Controller
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
				'actions'=>array('view','create', 'update', 'admin'),
				'roles'=>array('admin'),
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
		$model=new EstadoPredet;

		if(isset($_POST['EstadoPredet']))
		{
			$model->attributes=$_POST['EstadoPredet'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['EstadoPredet']))
		{
			$model->attributes=$_POST['EstadoPredet'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('EstadoPredet');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new EstadoPredet('search');
		$model->unsetAttributes();
		if(isset($_GET['EstadoPredet']))
			$model->attributes=$_GET['EstadoPredet'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=EstadoPredet::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página solicitada no existe.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='estado-predet-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
