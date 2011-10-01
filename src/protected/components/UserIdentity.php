<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	/**
	 * Authenticates against the tbl_user table.
	 */
	public function authenticate()
	{
		$username = strtolower($this->username);
		$user = User::model()->find('LOWER(username)=?',array($username));
		if($user===null) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else if(!$user->validatePassword($this->password)) {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else {
			$this->login($user);
		}
		
		return $this->errorCode == self::ERROR_NONE;
	}
	
	public function login($user) {
		$this->_id = $user->id;
		$this->username = $user->username;
		$this->setState("email", $user->email);
		$this->setState("admin", $user->admin);
		$this->errorCode = self::ERROR_NONE;
	}
	
	public function getId() {
		return $this->_id;	
	}
}