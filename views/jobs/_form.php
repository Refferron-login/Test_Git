<?php
/* @var $this JobsController */
/* @var $model Jobs */
/* @var $form CActiveForm */
?>
<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'htmlOptions' => array('class' => 'well'),
        'id' => 'jobs-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php //echo $form->errorSummary($model);  ?>
    <div class="control-group">
            <?php echo $form->labelEx($model, 'title'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 20, 'autocomplete' => 'off')); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>
    </div>
    <div class="clearfix">
        <?php 
        echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => "btn btn-primary"));
        ?>
    </div>
<?php $this->endWidget(); ?>
</div><!-- End form -->