<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>
<?php
Yii::app()->clientScript->registerScript('jobtype', "
var type=$('#service_type').val();
 $('#jobtype').hide();
if(type==1)
{
     $('#jobtype').hide();
}
$('#service_type').click(function(){
        var v=this.value;        
        if(v==0)
        {
            //$('#jobtype').show(); 
        }
        else
        {
            $('#jobtype').hide();
        }
        return false;
});
");
?>
<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'htmlOptions' => array('class' => 'well'),
        'id' => 'users-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php //echo $form->errorSummary($model);  ?>
    <div class="control-group">
            <?php echo $form->labelEx($model, 'title'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'title'); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>
    </div>
    <div class="control-group">
            <?php echo $form->labelEx($model, 'user_name'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'user_name', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'user_name'); ?>
        </div>
    </div>
    
    <div class="control-group">
            <?php echo $form->labelEx($model, 'family_name'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'family_name', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'family_name'); ?>
        </div>
    </div>
     <div class="control-group">
            <?php echo $form->labelEx($model, 'address'); ?>
        <div class="controls">
            <?php echo $form->textArea($model, 'address', array('size' => 60, 'maxlength' => 200,'rows'=>3)); ?>
            <?php echo $form->error($model, 'address'); ?>
        </div>
    </div>
    <div class="control-group">
            <?php echo $form->labelEx($model, 'location'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'location', array('size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'location'); ?>
        </div>
    </div>
     <div class="control-group">
            <?php echo $form->labelEx($model, 'country'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'country', array('size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'country'); ?>
        </div>
    </div>
     <div class="control-group">
            <?php echo $form->labelEx($model, 'state'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'state', array('size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'state'); ?>
        </div>
    </div>
     <div class="control-group">
            <?php echo $form->labelEx($model, 'town'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'town', array('size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'town'); ?>
        </div>
    </div>
      <div class="control-group">
            <?php echo $form->labelEx($model, 'post_code'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'post_code'); ?>
            <?php echo $form->error($model, 'post_code'); ?>
        </div>
    </div>
    <div class="control-group">
            <?php echo $form->labelEx($model, 'phno'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'phno'); ?>
            <?php echo $form->error($model, 'phno'); ?>
        </div>
    </div>
    <div class="control-group">
            <?php echo $form->labelEx($model, 'home_phno'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'home_phno'); ?>
            <?php echo $form->error($model, 'home_phno'); ?>
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
            <?php echo $form->labelEx($model, 'car_make'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'car_make', array('size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'car_make'); ?>
        </div>
    </div>
     <div class="control-group">
            <?php echo $form->labelEx($model, 'car_model'); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'car_model', array('size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'car_model'); ?>
        </div>
    </div>
    
    <div class="control-group">
            <?php echo $form->labelEx($model, 'note'); ?>
        <div class="controls">
            <?php echo $form->textArea($model, 'note', array('maxlength' => 200,'rows'=>10,)); ?>
            <?php echo $form->error($model, 'note'); ?>
        </div>
    </div>
    
    <div class="control-group">
            <?php echo $form->labelEx($model, 'usertype'); ?>
        <div class="controls">
            <?php 
            if($model->isNewRecord)
            {    
                echo $form->dropDownList($model, 'usertype', array(1 => 'Driver', 2 => 'Handyman',3=>'Volunteer'), array('id' => "service_type")); 
            }
            else
            {
                
                
                    echo $form->dropDownList($model, 'usertype', array(2 => 'Handyman',1 => 'Driver',3=>'Volunteer'), array('id' => "service_type")); 
                
            }
?> 
            <?php echo $form->error($model, 'usertype'); ?>
        </div>
    </div>
    <div class="control-group" id="jobtype">
            <?php echo $form->labelEx($obj_job, 'job_id'); ?>
        <div class="controls">
            <?php echo $form->dropDownList($obj_job, 'job_id', array(2=>'Handyman'), array('id' => 'job')); ?>
            <?php echo $form->error($obj_job, 'job_id'); ?>
        </div>
    </div>  
    <div class="clearfix">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => "btn btn-primary")); ?>
    </div>
<?php $this->endWidget(); ?>

</div><!-- End form -->