<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'htmlOptions' => array('class' => 'well'),
        'id' => 'duty-officers-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php //echo $form->errorSummary($model);  ?>
    <div class="control-group">
            <?php echo $form->labelEx($model, 'username'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'username', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>
    </div>
    <div class="control-group">
            <?php echo $form->labelEx($model, 'password'); ?>
        <div class="controls">
            <?php echo $form->passwordField($model, 'password', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>
    </div>
    <div class="control-group">
            <?php echo $form->labelEx($model, 'email'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>
    </div>
    <div class="control-group">
            <?php echo $form->labelEx($model, 'rights'); ?>
        <div class="controls">
            <?php echo $form->checkBox($model, 'rights'); ?>
            <?php echo $form->error($model, 'rights'); ?>
        </div>
    </div>
    <div class="control-group buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => "btn btn-primary")); ?>
    </div>
<?php $this->endWidget(); ?>
</div><!-- End form -->