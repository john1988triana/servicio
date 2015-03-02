<?php

class Estado extends CActiveRecord
{

	public function tableName()
	{
		return 'estado';
	}

	public function rules()
	{

		return array(
			array('id_orden, estado, descripcion, tecnico, fecha_estado, fecha_futura, tiempo', 'required'),
			array('id_orden, tecnico', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>100),
			array('descripcion', 'length', 'max'=>300),
			array('id, id_orden, estado, descripcion, tecnico, fecha_estado, fecha_futura, tiempo', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'idOrden' => array(self::BELONGS_TO, 'OrdenServicio', 'id_orden'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_orden' => 'Id Orden',
			'estado' => 'Estado',
			'descripcion' => 'Descripcion',
			'tecnico' => 'Tecnico',
			'fecha_estado' => 'Fecha Estado',
			'fecha_futura' => 'Fecha Final',
			'tiempo' => 'Tiempo',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_orden',$this->id_orden);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('tecnico',$this->tecnico);
		$criteria->compare('fecha_estado',$this->fecha_estado,true);
		$criteria->compare('fecha_futura',$this->fecha_futura,true);
		$criteria->compare('tiempo',$this->tiempo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getListaEstadoP()
	{
		$estadop = EstadoPredet::model()->findAll();
		return CHtml::listData($estadop,"estado","estado");
	}
}
