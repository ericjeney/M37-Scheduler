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
	
	public function attributeLabels()
	{
		return array(
			'offering' => 'Activity',
		);
	}

	public function editAssignment()
	{
		if(Yii::app()->user->isGuest || $this->offering == '') {
			return false;
		}else {
			date_default_timezone_set("America/New_York");
			$date = new CDbExpression(strtotime("next monday"));
			$assignment = Assignment::model()->find('user_id=:id and assignment_date=:date', array(':id'=>Yii::app()->user->id, ':date'=>strtotime("next monday")));
			
			if($assignment == null) {
				$assignment = new Assignment;
				$assignment->user_id = Yii::app()->user->id;
			}
			
			$assignment->assignment_date = $date;
			$assignment->offering_id = $this->offering;
			$assignment->save();
			return true;
		}
	}
}
