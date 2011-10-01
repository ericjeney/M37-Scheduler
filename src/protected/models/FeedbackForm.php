<?php

/**
 * FeedbackForm class.
 * FeedbackForm is the data structure for keeping
 * feedback form data. It is used by the 'feedback' action of 'SiteController'.
 */
class FeedbackForm extends CFormModel
{
	public $good;
	public $bad;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('good, bad', 'required'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
                        'good'=>'What Worked',
                        'bad'=>'What Didn\'t Work'
		);
	}
}
