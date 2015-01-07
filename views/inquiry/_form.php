<?php
/* @var $this InquiryController */
/* @var $model Inquiry */
/* @var $form CActiveForm */
?>
<div class="form">  
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'htmlOptions' => array('class' => 'well'),
        'id' => 'inquiry-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php //echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'client_id'); ?>
        <?php echo $form->textField($model, 'client_id'); ?>
        <?php echo $form->error($model, 'client_id'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'service_type'); ?>
        <?php echo $form->textField($model, 'service_type', array('size' => 2, 'maxlength' => 2)); ?>
        <?php echo $form->error($model, 'service_type'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->textField($model, 'status'); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => "btn btn-primary")); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- End form -->