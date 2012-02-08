<?php

/**
 * FeedbackForm class.
 * FeedbackForm is the data structure for keeping
 * feedback form data. It is used by the 'feedback' action of 'SiteController'.
 */
class ForgotPasswordForm extends CFormModel
{
	public $email;
	public $password;
	public $passwordConfirm;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('email, password, passwordConfirm', 'required'),
			array('email', 'email'),
			array('password', 'length', 'min'=>'6'),
			array('passwordConfirm', 'compare', 'compareAttribute'=>'password'),
			array('email','exist', 'attributeName' => 'email', 'className' => 'User', 'message' => 'This email was not found!'),
		);
	}
	
	public function attributeLabels() 
	{
		return array(
			'password' => 'New Password',
		);
	}

	public function requestPasswordReset()
	{
		$user = User::model()->find("email=:email", array(':email' => $this->email));
		$request = new PasswordResetRequests();
		$request->user_id = $user->id;
		
		date_default_timezone_set("America/New_York");
		$request->creation_time = strtotime("now");
		$request->new_password= User::model()->hashPassword($this->password, $user->salt);
		
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$resetCode = '';
		
		for($i = 0; $i < 15; $i++) {
		$resetCode .= substr($chars,(rand()%(strlen($chars))), 1);
		}	  
		
		$request->reset_code = $resetCode;
		$request->save();
		
		$body = $user->username . ",\r\n\r\nYou requested your password to be reset. Click this link to confirm:\r\n\r\n";
		$body .= $resetCode;
		$body .= "\r\n\r\n" . "M37 Team\r\n\r\n";

		mail($this->email,'Password Reset Request',$body, 'From: M37Scheduler@m37scheduler.com');
	}
}
