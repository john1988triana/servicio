<?php

class Usuario extends CActiveRecord
{

	public function tableName()
	{
		return 'usuario';
	}

	public function rules()
	{
		return array(
			array('nom_usuario, contra_usuario, descri_usuario, empresa', 'required'),
			array('empresa', 'numerical', 'integerOnly'=>true),
			array('nom_usuario', 'length', 'max'=>50),
			array('contra_usuario', 'length', 'max'=>100),
			array('descri_usuario', 'length', 'max'=>100),
			array('id, nom_usuario, contra_usuario, descri_usuario, empresa', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(	
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nom_usuario' => 'Usuario',
			'contra_usuario' => 'Contrase&ntilde;a',
			'descri_usuario' => 'Cargo',
			'empresa' => 'Empresa',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nom_usuario',$this->nom_usuario,true);
		$criteria->compare('contra_usuario',$this->contra_usuario,true);
		$criteria->compare('descri_usuario',$this->descri_usuario,true);
		$criteria->compare('empresa',$this->empresa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
}
