<?php
$this->pageTitle=Yii::app()->name . ' - Feedback';
?>

<h1>Feedback</h1>

<?php if(Yii::app()->user->hasFlash('feedback')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('feedback'); ?>
</div>

<?php else: ?>

<p>
If you have any comments or concerns you would like to share, please let us know!
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feedback-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'good'); ?>
		<?php echo $form->textArea($model,'good',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'good'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bad'); ?>
		<?php echo $form->textArea($model,'bad',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
