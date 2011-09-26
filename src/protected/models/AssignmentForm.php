<?php

class AssignmentForm extends CFormModel
{
	public $offering;

	public function rules()
	{
		return array(
			array('offering', 'required'),
		);
	}

	/**
	 * Edits the User's password and E-Mail.
	 * @return boolean whether editing was successful or not
	 */
	public function editAssignment()
	{
		if(Yii::app()->user->isGuest) {
			return false;
		}else {
			$assignment = Assignment::model().find("user_id=?", Yii::app()->user->id);
			
			if($assignment == null) {
				$assignment = new Assignment;
				$assignment->user_id = Yii::app()->user->id;
			}
			
			$assignment->offering_id = $offering;
			$assignment->save();
		}
	}
}
