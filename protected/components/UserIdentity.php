<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public $persona=null;
	

	public function authenticate()
	{
		$users=array(

			'Admin'=>'admin',
		);
		
		$criteria=new CDbCriteria;
		$criteria->compare('correo',$this->username,true);
		$criteria->compare('password',$this->password,true);
		//$criteria->limit='10';
       	$cursor = Persona::model()->findAll($criteria);

		
		$persona = null;
		foreach ($cursor as $valor)	{
			$persona = $valor;
			//echo '<pre>'; print_r ($valor); echo '</pre>';
		}	
		//echo '<pre>'; print_r ($persona); echo '</pre>';
		//echo '<pre>'; print_r ($persona===null); echo '</pre>';
		
		if($persona===null  && !(isset($users[$this->username]) && $users[$this->username]==$this->password ))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else{
			$this->persona=$persona;
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}