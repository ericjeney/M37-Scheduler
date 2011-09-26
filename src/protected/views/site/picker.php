<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'assignment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'offering'); ?>
		<?php echo $form->dropDownList($model,'offering', CHtml::listData(Offering::model()->findAll(), 'id', 'title')); ?>
		<?php echo $form->error($model,'offering'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->