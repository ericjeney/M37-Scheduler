<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'assignment-picker-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'offering_id'); ?>
		<?php echo $form->textField($model,'offering_id'); ?>
		<?php echo $form->error($model,'offering_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'assignment_date'); ?>
		<?php echo $form->textField($model,'assignment_date'); ?>
		<?php echo $form->error($model,'assignment_date'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->