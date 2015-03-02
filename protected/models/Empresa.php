<?php

class Empresa extends CActiveRecord
{

	public function tableName()
	{
		return 'empresa';
	}

	public function rules()
	{
		return array(
			array('nombre, direccion, telefono', 'required'),
			array('nombre, direccion', 'length', 'max'=>100),
			array('telefono', 'length', 'max'=>50),
			array('id, nombre, direccion, telefono', 'safe', 'on'=>'search'),
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
			'id' => 'Id',
			'nombre' => 'Nombre',
			'direccion' => 'Direcci&oacute;n',
			'telefono' => 'Tel&eacute;fono',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
