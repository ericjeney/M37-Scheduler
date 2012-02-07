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
			array('email','exist', 'attributeName' => 'email', 'className' => 'User'),
		);
	}

	public function requestPasswordReset()
	{
		return;
	}
}
