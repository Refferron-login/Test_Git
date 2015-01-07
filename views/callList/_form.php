<?php
/* @var $this CallListController */
/* @var $model CallList */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'call-list-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'today_date'); ?>
		<?php echo $form->textField($model,'today_date'); ?>
		<?php echo $form->error($model,'today_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'job_date'); ?>
		<?php echo $form->textField($model,'job_date'); ?>
		<?php echo $form->error($model,'job_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'a'); ?>
		<?php echo $form->textField($model,'a'); ?>
		<?php echo $form->error($model,'a'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_a'); ?>
		<?php echo $form->textField($model,'n_a'); ?>
		<?php echo $form->error($model,'n_a'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_r'); ?>
		<?php echo $form->textField($model,'n_r'); ?>
		<?php echo $form->error($model,'n_r'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ans'); ?>
		<?php echo $form->textField($model,'ans'); ?>
		<?php echo $form->error($model,'ans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_id'); ?>
		<?php echo $form->textField($model,'client_id'); ?>
		<?php echo $form->error($model,'client_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->