<?php

class UsuarioController extends Controller
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
				'actions'=>array('contra'),
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('admin','create','view','update','delete','assign','roles'),
				'roles'=>array('admin'),
				// 'users'=>array('@'),
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

	public function actionRoles()
	{
		$model=new RoleForm;
		if(isset($_POST['ajax']) && $_POST['ajax']==='role-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['RoleForm']))
		{
			$model->attributes=$_POST['RoleForm'];
			if($model->validate())
			{
				Yii::app()->authManager->createRole($model->name,$model->description);
				// Yii::app()->authManager->assign($model->name,$id);
				$this->redirect(array("admin"));
			}
		}
		$this->render('roles',array(
			'model'=>$model,
		));
	}

	public function actionCreate()
	{
		$model=new Usuario;

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			$model->contra_usuario=sha1($_POST['Usuario']['contra_usuario']);
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

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			// $model->contra_usuario=sha1($_POST['Usuario']['contra_usuario']);
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

	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes(); 
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAssign($id)
	{
		if(Yii::app()->authManager->checkAccess($_GET['item'],$id)){
			Yii::app()->authManager->revoke($_GET['item'],$id);
			$this->redirect(array("view","id"=>$id));
		}
		else{
			Yii::app()->authManager->assign($_GET['item'],$id);
			$this->redirect(array("view","id"=>$id));
		}
	}

	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página solicitada no existe.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
