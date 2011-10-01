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
			$day = date('D');
			if($day == 'Sat' || $day == 'Sun')
			{
				echo 'The offering selection period has ended and you cannot change your selection anymore.';
			}
			else
			{
				echo 'If you\'d like to change this, please ';
				echo CHtml::link("Click Here!", array("site/picker"));
			}
        ?></h4>
</div>
