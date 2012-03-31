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

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('good, bad', 'required'),
			// verifyCode needs to be entered correctly
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
			'good'=>'What do you think worked?',
			'bad'=>'What do you think didn\'t work?'
		);
	}

	public function sendFeedback()
	{
		$admins = User::model()->findAll("admin = 1");
		$to = '';
		foreach($admins as $admin)
			$to .= $admin->email . ', ';
		$to = substr($to, 0, -2); //Remove trailing ', '
		
		$body = "Feedback for M37 was submitted by " . Yii::app()->user->name . " (". Yii::app()->user->email . ")" . ".\r\nHere's what they said:\r\n\r\n";
		$body .= "What worked:\r\n" . $this->good . "\r\n\r\n";
		$body .= "What didn't work:\r\n" . $this->bad . "\r\n\r\n";

		mail($to,'Feedback for M37',$body);
	}
}
