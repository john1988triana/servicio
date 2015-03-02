<?php

class DetalleOrden extends CActiveRecord
{

	public function tableName()
	{
		return 'detalle_orden';
	}

	public function rules()
	{
		return array(
			array('id_orden, referencia, serial, garantia, prende, imagen, problema, accesorio, back', 'required'),
			array('id_orden', 'numerical', 'integerOnly'=>true),
			array('referencia, serial, contra_cl, contra_di', 'length', 'max'=>30),
			array('garantia, prende, imagen, back', 'length', 'max'=>10),
			array('problema, accesorio, diagnostico, repuesto', 'length', 'max'=>300),
			array('id, id_orden, referencia, serial, contra_cl, contra_di, garantia, prende, imagen, problema, accesorio, back, diagnostico, repuesto', 'safe', 'on'=>'search'),
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
			'id' => 'Id',
			'id_orden' => 'Orden Servicio',
			'referencia' => 'Referencia',
			'serial' => 'Serial',
			'contra_cl' => 'Clave Icloud(Iphone)',
			'contra_di' => 'Clave Equipo',
			'garantia' => 'Garantia',
			'prende' => 'Enciende',
			'imagen' => 'Da Imagen',
			'problema' => 'Problema',
			'accesorio' => 'Accesorios',
			'back' => 'Backup',
			'diagnostico' => 'Diagn&oacute;stico',
			'repuesto' => 'Repuesto',
		);
	}

	public function search($c = null)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_orden',$this->id_orden);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('serial',$this->serial,true);
		$criteria->compare('contra_cl',$this->contra_cl,true);
		$criteria->compare('contra_di',$this->contra_di,true);
		$criteria->compare('garantia',$this->garantia,true);
		$criteria->compare('prende',$this->prende,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('problema',$this->problema,true);
		$criteria->compare('accesorio',$this->accesorio,true);
		$criteria->compare('back',$this->back,true);
		$criteria->compare('diagnostico',$this->diagnostico,true);
		$criteria->compare('repuesto',$this->repuesto,true);

		$criteria = ($c != null) ? $c : $criteria;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
