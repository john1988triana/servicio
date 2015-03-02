<?php 
class RoleForm extends CFormModel
{
	public static $types=array("Operation","Task","Role");
	public $name;
	public $description;
	public $type=2;

	public function rules()
	{
		return array(
			array("name, type, description","required"),
		);
	}

	public function attributeLabels()
	{
		return array(
			'name' => 'Nombre',
			'description' => 'Descripci&oacute;n',
		);
	}
}
 ?>
