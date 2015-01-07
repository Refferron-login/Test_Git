<script>
    jQuery(document).ready(function() {
        setTimeout("jQuery('.alert').hide();", 3000);
    });
</script>
<?php
/* @var $this UserAvailabilityController */
/* @var $model UserAvailability */
/* @var $form CActiveForm */
$this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true, 
    'fade' => true,
    'closeText' => '&times;',
    'alerts' => array(
        'danger' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), 
    ),
));
?>
<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'htmlOptions' => array('class' => 'well'),
        'id' => 'user-availability-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php //echo $form->errorSummary($model); ?>
    <div class="control-group ">
            <?php echo CHtml::label("Select Resource Type", false) ?>
        <div class="controls">
            <?php
            echo $form->dropDownList($obj_job, 'job_id', $job_list, array(
                'prompt' => 'Select resource type',
                'ajax' => array(
                    'type' => 'POST',
                    'url' => Yii::app()->createUrl('userAvailability/resourcelist'),
                    'update' => '#resource_list',
                    'data' => array('id' => 'js:this.value'),
            )));
           ?>
        </div>   
    </div>
    <div class="control-group ">
        <?php echo $form->labelEx($model, 'user_id'); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'user_id', $serviceman_list, array('id' => "resource_list")); ?> 
            <?php echo "&nbsp;" . $form->error($model, 'user_id'); ?>
        </div>
    </div>
    <div class="control-group ">
            <?php echo $form->labelEx($model, 'available_date'); ?>
        <div class="controls">
            <?php
            if (!$model->isNewRecord) {
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'available_date',
                    'options' => array(
                        'showAnim' => 'fadeIn',
                        'showOn' => 'both',
                        'dateFormat' => 'dd-mm-yy'
                    ),
                    'htmlOptions' => array(
                    ),
                ));
            } 
            else {
                
                echo $form->textField($model, 'available_date', array('id' => 'available_date', 'readonly' => true, 'class' => 'date_insert'));
            }
            echo "&nbsp;" . $form->error($model, 'available_date'); ?>
        </div>
    </div>
    <div class="control-group ">
            <?php echo $form->labelEx($model, 'from_time'); ?>
        <div class="controls">
            <?php
            $this->widget('application.extensions.timepicker.timepicker', array(
                'model' => $model,
                'name' => 'from_time',
                'id' => 'from_time',
                'select' => 'time',
            ));
            ?>
            <?php echo $form->error($model, 'from_time'); ?>
        </div>
    </div>
    <div class="control-group ">
            <?php echo $form->labelEx($model, 'to_time'); ?>
        <div class="controls">
            <?php
            $this->widget('application.extensions.timepicker.timepicker', array(
                'model' => $model,
                'name' => 'to_time',
                'select' => 'time',
                'id' => 'to_time',
                'options' => array(
                // 'showOn'=>'focus',
                )
            ));
            ?>
            <?php echo $form->error($model, 'to_time'); ?>
        </div>
    </div>
    <div class="control-group">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => "btn btn-primary")); ?>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- End form -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#available_date').daterangepicker("setDate", "+3");
        //$('#to_time').attr('disabled', 'disabled');
        document.getElementById('from_time').readOnly = true;
        document.getElementById('to_time').readOnly = true;
    });
</script>


