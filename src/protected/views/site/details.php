<?php
$this->pageTitle=Yii::app()->name . ' - Edit Account Details';
?>

<hr />

<h1 class="center">Edit Account Details</h1>

<div class="form center">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'details-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div style="max-width:400px; margin:auto">
		<div style="float:left">
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
		</div>
		
		<div style="float:right">
			<div class="row">
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email'); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($model,'emailConfirm'); ?>
				<?php echo $form->textField($model,'emailConfirm'); ?>
				<?php echo $form->error($model,'emailConfirm'); ?>
			</div>
		</div>
	</div>

	<div class="row buttons" style="clear:both">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
