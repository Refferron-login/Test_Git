<?php
/* @var $this UsersController */
/* @var $data Users */
?>
<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id' => $data->user_id)); ?>
    <br />

    <b><?php echo "Name"; ?>:</b>
    <?php echo CHtml::encode($data->fname . "  " . $data->lname); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('phno')); ?>:</b>
    <?php echo CHtml::encode($data->phno); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
    <?php echo CHtml::encode($data->location); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('usertype')); ?>:</b>
    <?php
    if ($data->usertype == 1) {
        echo CHtml::encode("Driver");
    } else {
        echo CHtml::encode("Handyman");
    }
    echo CHtml::encode($data->job->title);
    ?>
    <br />    
</div>