<?php

class DetailsForm extends CFormModel
{
	public $password;
	public $passwordConfirm;
	public $email;
	public $emailConfirm;

	private $_identity;

	public function rules()
	{
		return array(
			array('password, passwordConfirm, email, emailConfirm', 'required'),
			array('email', 'email'),
			array('password', 'length', 'min'=>'6'),
			array('passwordConfirm', 'compare', 'compareAttribute'=>'password'),
			array('emailConfirm', 'compare', 'compareAttribute'=>'email'),
		);
	}

	/**
	 * Edits the User's password and E-Mail.
	 * @return boolean whether editing was successful or not
	 */
	public function editDetails()
	{
		if(Yii::app()->user->isGuest) {
			return false;
		}else {
			$user = User::model()->find('id=?', array(Yii::app()->user->id));
			$user->password = $user->hashPassword($this->password,$user->salt);
			$user->email = $this->email;
			$user->save();
			
			Yii::app()->user->setState("email", $this->email);
			return true;
		}
	}
}
