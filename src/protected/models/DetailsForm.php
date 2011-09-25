<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class DetailsForm extends CFormModel
{
	public $password;
	public $email;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('password, email', 'required'),
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
			$user = User::model()->find('id=?', Yii::app()->user->id);
			$user->password = $user->hashPassword($this->password,$user->salt);
			$user->email = $this->email;
			$user->save();
			
			Yii::app()->user->setState("email", $email);
			return true;
		}
	}
}
