<?php
/* @var $this ClientDetailController */
/* @var $data ClientDetail */
?>
<div class="view">
    <b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->client_id), array('view', 'id' => $data->client_id)); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('fname')); ?>:</b>
    <?php echo CHtml::encode($data->fname); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('lname')); ?>:</b>
    <?php echo CHtml::encode($data->lname); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('phno')); ?>:</b>
    <?php echo CHtml::encode($data->phno); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
    <?php echo CHtml::encode($data->address); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('post_code')); ?>:</b>
    <?php echo CHtml::encode($data->post_code); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('DOB')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br />
     <b><?php echo CHtml::encode($data->getAttributeLabel(  'next_of_kin_name')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br />
     <b><?php echo CHtml::encode($data->getAttributeLabel( 'next_of_kin_contact')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br />
</div>



      
       