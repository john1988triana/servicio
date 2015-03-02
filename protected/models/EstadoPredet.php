<?php

class EstadoPredet extends CActiveRecord
{

	public function tableName()
	{
		return 'estado_predet';
	}

	public function rules()
	{

		return array(
			array('estado, descripcion, duracion', 'required'),
			array('estado', 'length', 'max'=>100),
			array('descripcion', 'length', 'max'=>300),
			array('duracion', 'length', 'max'=>15),
			array('id, estado, descripcion, duracion', 'safe', 'on'=>'search'),
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
			'estado' => 'Estado',
			'descripcion' => 'Descripcion',
			'duracion' => 'Duracion',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('duracion',$this->duracion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
