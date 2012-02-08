<?php
$this->pageTitle=Yii::app()->name . ' - Forgot Password';
?>

<hr />

<h1 class="center">Forgot Password</h1>

<div class="center" style="max-width:450px; margin:auto">To reset your account password, type in the email address associated with it and a new password. You will be sent a confirmation email on the provided address to activate the new password. </div>

<p /> 

<div class="form center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forgotPassword-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passwordConfirm'); ?>
		<?php echo $form->passwordField($model,'passwordConfirm'); ?>
		<?php echo $form->error($model,'passwordConfirm'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->