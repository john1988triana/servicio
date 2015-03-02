<?php

class UserIdentity extends CUserIdentity
{
	private $_id;

	public function authenticate()
	{
		$users=Usuario::model()->findByAttributes(array('nom_usuario'=>$this->username));

		if($users===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		
		elseif(sha1($this->password)!==$users->contra_usuario)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$empresa = $users->getnombreempresa($users->empresa);
			$this->_id=$users->id;
			$this->setState("usuario",$users->nom_usuario);
			$this->setState("nempresa",$empresa);
			$this->setState("cargo",$users->descri_usuario);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	public function getId()
	{
		return $this->_id;
	}

}