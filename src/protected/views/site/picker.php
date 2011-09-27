<?php
$this->pageTitle=Yii::app()->name . ' - Select Activity';
?>

<h1 class="center">Select an Activity</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'assignment-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

	<div align="center">
		<div class="row">
			<?php echo $form->labelEx($model,'offering'); ?>
			<?php echo $form->dropDownList($model,'offering', CHtml::listData(Offering::model()->findAll(), 'id', 'title'), array("prompt"=>"Please Select an Activity")); ?>
			<?php echo $form->error($model,'offering'); ?>
		</div>
	
	
		<div class="row buttons">
			<?php echo CHtml::submitButton('Submit'); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->