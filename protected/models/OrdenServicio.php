<?php

class OrdenServicio extends CActiveRecord
{

	public function tableName()
	{
		return 'orden_servicio';
	}

	public function rules()
	{
		return array(
			array('id_usuario, id_responsable, docu_cliente, nom_cliente, tele_cliente, dire_cliente, mail_cliente, fecha_inicio, tiempo, estado', 'required'),
			array('id_usuario, id_responsable, tiempo, estado', 'numerical', 'integerOnly'=>true),
			array('docu_cliente, tele_cliente', 'length', 'max'=>30),
			array('nom_cliente', 'length', 'max'=>100),
			array('dire_cliente, mail_cliente', 'length', 'max'=>50),
			array('mail_cliente', 'email'),
			array('id, id_usuario, id_responsable, docu_cliente, nom_cliente, tele_cliente, dire_cliente, mail_cliente, fecha_inicio, fecha_entrega, tiempo, estado', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'detalleOrdens' => array(self::HAS_MANY, 'DetalleOrden', 'id_orden'),
			'diagnosticoOrdens' => array(self::HAS_MANY, 'DiagnosticoOrden', 'id_orden'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_usuario' => 'Empresa',
			'id_responsable' => 'Responsable',
			'docu_cliente' => 'Identificaci&oacute;n',
			'nom_cliente' => 'Nombre Completo',
			'tele_cliente' => 'Tel&eacute;fono',
			'dire_cliente' => 'Direcci&oacute;n',
			'mail_cliente' => 'E-Mail',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_entrega' => 'Fecha Estimada',
			'tiempo'=>'Tiempo En dias',
			'estado'=>'Estado',
		);
	}

	public function search()
	{
		
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_responsable',$this->id_responsable);
		$criteria->compare('docu_cliente',$this->docu_cliente,true);
		$criteria->compare('nom_cliente',$this->nom_cliente,true);
		$criteria->compare('tele_cliente',$this->tele_cliente,true);
		$criteria->compare('dire_cliente',$this->dire_cliente,true);
		$criteria->compare('mail_cliente',$this->mail_cliente,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('tiempo',$this->tiempo,true);
		$criteria->compare('estado',$this->estado,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

		public function searchTecnico()
	{
		
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_responsable',Yii::app()->user->id,true);
		$criteria->compare('docu_cliente',$this->docu_cliente,true);
		$criteria->compare('nom_cliente',$this->nom_cliente,true);
		$criteria->compare('tele_cliente',$this->tele_cliente,true);
		$criteria->compare('dire_cliente',$this->dire_cliente,true);
		$criteria->compare('mail_cliente',$this->mail_cliente,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('tiempo',$this->tiempo,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

		public function searchUsuario()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_usuario',$this->getidempresa(Yii::app()->user->getState('nempresa')),true);
		$criteria->compare('id_responsable',$this->id_responsable);
		$criteria->compare('docu_cliente',$this->docu_cliente,true);
		$criteria->compare('nom_cliente',$this->nom_cliente,true);
		$criteria->compare('tele_cliente',$this->tele_cliente,true);
		$criteria->compare('dire_cliente',$this->dire_cliente,true);
		$criteria->compare('mail_cliente',$this->mail_cliente,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('tiempo',$this->tiempo,true);
		$criteria->compare('estado',$this->estado,true);
		// $criteria->order='tiempo';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getListaUsuariospcmac()
	{
		$usuarios = Usuario::model()->findAll('empresa = 1');
		return CHtml::listData($usuarios,"id","nom_usuario");
	}
	public function getListaUsuarios()
	{
		$usuarios = Usuario::model()->findAll();
		return CHtml::listData($usuarios,"id","nom_usuario");
	}
	public function getnombreusuario($id)
	{
		$usuario = Usuario::model()->findByPk($id);
		return $usuario->nom_usuario;
	}
	public function getListaEmpresa()
	{
		$empresas = Empresa::model()->findAll();
		return CHtml::listData($empresas,"id","nombre");
	}
	public function getnombreempresa($id)
	{
		$empresa = Empresa::model()->findByPk($id);
		return $empresa->nombre;
	}
	public function getidempresa($id){
		$ide = Empresa::model()->findByAttributes(array('nombre'=>$id));
		return $ide->id;
	}

	public function getOrdenEstado(){
		if($this->estado=='1'){
				return 'En Proceso...';	
			}
			if($this->estado=='2'){
				return 'Finalizado';	
			}
	}
}
