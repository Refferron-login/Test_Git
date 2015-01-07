<?php
/* @var $this UserAvailabilityController */
/* @var $model UserAvailability */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'availability_id'); ?>
		<?php echo $form->textField($model,'availability_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'available_date'); ?>
		<?php echo $form->textField($model,'available_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'from_time'); ?>
		<?php echo $form->textField($model,'from_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'to_time'); ?>
		<?php echo $form->textField($model,'to_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array("class"=>"btn btn-primary")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->