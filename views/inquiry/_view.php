<?php
/* @var $this InquiryController */
/* @var $data Inquiry */
?>
<div class="view">
    <b><?php echo CHtml::encode($data->getAttributeLabel('inquiry_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->inquiry_id), array('view', 'id' => $data->inquiry_id)); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
    <?php echo CHtml::encode($data->client_id); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('service_type')); ?>:</b>
    <?php echo CHtml::encode($data->service_type); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode($data->status); ?>
    <br />
</div>