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
	<h4>If you'd like to change this, please <?php echo CHtml::link("Click Here!", array("site/picker")); ?></h4>
	
</div>