 <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'htmlOptions'=>array('class'=>'well'),
            'id'=>'settings-form',
            'enableAjaxValidation'=>false,
            'type'=>'horizontal'
        )); ?>
        <div class="control-group">
               <?php echo $form->labelEx($obj_mileage,'rate_per_km'); ?>
               <div class="controls">
                    <?php echo $form->textField($obj_mileage,'rate_per_km',array('value'=>$data[0]->rate_per_km,'onblur'=>"checknegative(this)")); ?>&nbsp;
                    <?php echo '&pound;'?>
                    <?php echo $form->error($obj_mileage,'rate_per_km'); ?>
                </div>
         </div>
         <div class="control-group buttons">
                    <?php echo CHtml::submitButton('Update',array("class"=>"btn btn-primary")); ?>
         </div>
         <?php $this->endWidget(); ?>

<script language="javascript" type="text/javascript">
    var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function checknegative(str) {
            if (parseFloat(document.getElementById(str.id).value) < 0) {
                document.getElementById(str.id).value = "";
                document.getElementById(str.id).focus();
                alert('Negative mileage rate not allowed');
                return false;
            }
        }
</script>