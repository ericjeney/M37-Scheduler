<?php $this->pageTitle=Yii::app()->name; ?>

<div align="center">
	<h2>Thanks for stopping by!</h2>
	<h3>You are currently registered for:
		
	<?php
		$assignment = Assignment::model()->currentAssignment();
		if($assignment == null) {
			echo "Nothing!  Please sign up!";
		}else {
			$offering = Offering::model()->find('id=?', array($assignment->offering_id));
			echo $offering->title;
		}
	?></h3>
        <h4><?php
			if($assignment->status == 3)
			{
				echo 'The offering selection period has ended and you cannot change your selection anymore.';
			}
			else if($assignment->status == 2)
			{
				echo 'This assignment cannot be changed.';
			}
			else
			{
				echo 'If you\'d like to change this, please ';
				echo CHtml::link("Click Here!", array("site/picker"));
			}
        ?></h4>
</div>
