<?php
/* @var $this LocationMasterController */
/* @var $model LocationMaster */
/* @var $form CActiveForm */
?>
<div class="form">

<?php   $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
         'htmlOptions' => array('class' => 'well'),
        'id' => 'location-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => false,
    ));
    
    // dialog add new location
?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
           
           <div class="control-group">
		<?php echo $form->labelEx($model,'location'); ?>
             <div class="controls">
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'location'); ?>
             </div>    
	</div>
        <div class="control-group">
		<?php echo $form->labelEx($model,'address'); ?>
             <div class="controls">
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'address'); ?>
             </div>    
	</div>
         <div class="control-group">
		<?php echo $form->labelEx($model,'post_code'); ?>
             <div class="controls">
		<?php echo $form->textField($model,'post_code'); ?>
		<?php echo $form->error($model,'post_code'); ?>
             </div>    
	</div>

	<div class="control-group buttons">
		<?php  echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => "btn btn-primary")); ?>
            
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->