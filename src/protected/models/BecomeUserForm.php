<?php

class BecomeUserForm extends CFormModel
{
	public $username;

	public function rules()
	{
		return array(
			array('username', 'required'),
		);
	}

	public function becomeUser()
	{
		if(Yii::app()->user->getState("admin", false) != false) {
			$user = User::model()->find("username=?", array($this->username));
			if($user != null) {
				$identity = new UserIdentity($this->username, "");
				$identity->login($user);
				
				Yii::app()->user->login($identity, 0);
			}
		}
	}
}
