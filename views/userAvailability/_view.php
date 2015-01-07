<?php
/* @var $this UserAvailabilityController */
/* @var $data UserAvailability */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('availability_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->availability_id), array('view', 'id'=>$data->availability_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('available_date')); ?>:</b>
	<?php echo CHtml::encode($data->available_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_time')); ?>:</b>
	<?php echo CHtml::encode($data->from_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_time')); ?>:</b>
	<?php echo CHtml::encode($data->to_time); ?>
	<br />


</div>