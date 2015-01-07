<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'htmlOptions' => array('class' => 'well'),
        'id' => 'client-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => false
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php //echo $form->errorSummary(array($obj_client)); ?>
    <div class="control-group">
        <?php echo $form->labelEx($obj_client, 'title'); ?>
        <div class="controls">
            <?php echo $form->textField($obj_client, 'title'); ?>
            <?php echo $form->error($obj_client, 'title'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($obj_client, 'client_name'); ?>
        <div class="controls">
            <?php echo $form->textField($obj_client, 'client_name', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($obj_client, 'client_name'); ?>
        </div>
    </div>
     <div class="control-group">
        <?php echo $form->labelEx($obj_client, 'family_name'); ?>
        <div class="controls">
            <?php echo $form->textField($obj_client, 'family_name', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($obj_client, 'family_name'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($obj_client, 'phno'); ?>
        <div class="controls">
            <?php echo $form->textField($obj_client, 'phno'); ?>
            <?php echo $form->error($obj_client, 'phno'); ?>
        </div>
    </div>
     <div class="control-group">
        <?php echo $form->labelEx($obj_client, 'home_phno'); ?>
        <div class="controls">
            <?php echo $form->textField($obj_client, 'home_phno'); ?>
            <?php echo $form->error($obj_client, 'home_phno'); ?>
        </div>
    </div>
    <div class="control-group">
            <?php 
            echo $form->labelEx($obj_client, 'country'); 
            ?>
        <div class="controls">
            <?php 
            echo $form->textField($obj_client, 'country', array('size' => 60, 'maxlength' => 200, 'id' => 'country'));             echo $form->error($obj_client, 'country'); 
            ?>
        </div>
    </div>
    <div class="control-group">
            <?php 
            echo $form->labelEx($obj_client, 'state'); 
            ?>
        <div class="controls">
            <?php 
            echo $form->textField($obj_client, 'state', array('size' => 60, 'maxlength' => 200, 'id' => 'state'));             echo $form->error($obj_client, 'state'); 
            ?>
        </div>
    </div>
     <div class="control-group">
            <?php 
            echo $form->labelEx($obj_client, 'town'); 
            ?>
        <div class="controls">
            <?php 
            echo $form->textField($obj_client, 'town', array('size' => 60, 'maxlength' => 200, 'id' => 'town'));             echo $form->error($obj_client, 'town'); 
            ?>
        </div>
    </div>
     
    <div class="control-group">
        <?php echo $form->labelEx($obj_client, 'address'); ?>
        <div class="controls">
            <?php echo $form->textField($obj_client, 'address', array('size' => 60, 'maxlength' => 200)); ?>
            <?php echo $form->error($obj_client, 'address'); ?>
        </div>
    </div>
     <div class="control-group">
        <?php echo $form->labelEx($obj_client, 'post_code'); ?>
        <div class="controls">
            <?php echo $form->textField($obj_client, 'post_code'); ?>
            <?php echo $form->error($obj_client, 'post_code'); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($obj_client, 'email'); ?>
        <div class="controls">
            <?php echo $form->textField($obj_client, 'email', array('size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($obj_client, 'email'); ?>
        </div>
    </div>
     <div class="control-group">
        <?php echo $form->labelEx($obj_client,'DOB'); ?>
         <div class="controls">
            <?php //echo $form->dateField($obj_client,'DOB'); 
                  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $obj_client,
                    'attribute' => 'DOB',
                    'options' => array(
                        'showAnim' => 'fadeIn',
                        //'showOn' => 'both',
                         'dateFormat' => 'dd-mm-yy',
                        'changeYear'=>true,
                        'yearRange'=>'1900',
                    ),
                    'htmlOptions' => array(
                        'readOnly' => true,   
                        
                    ),
                ));
            ?>
            <?php echo $form->error($obj_client,'DOB'); ?>
         </div>
     </div>

     <div class="control-group">
        <?php echo $form->labelEx($obj_client,'next_of_kin_name'); ?>
          <div class="controls">
                <?php echo $form->textField($obj_client,'next_of_kin_name',array('size'=>60,'maxlength'=>100)); ?>
                <?php echo $form->error($obj_client,'next_of_kin_name'); ?>
          </div> 
     </div>

     <div class="control-group">
        <?php echo $form->labelEx($obj_client,'next_of_kin_contact'); ?>
          <div class="controls">
                <?php echo $form->textField($obj_client,'next_of_kin_contact',array('size'=>20,'maxlength'=>20)); ?>
                <?php echo $form->error($obj_client,'next_of_kin_contact'); ?>
          </div>   
     </div>
    <div class="control-group">
        <?php echo $form->labelEx($obj_client,'next_of_kin_home_phno'); ?>
          <div class="controls">
                <?php echo $form->textField($obj_client,'next_of_kin_home_phno'); ?>
                <?php echo $form->error($obj_client,'next_of_kin_home_phno'); ?>
          </div>   
     </div>
    <div class="control-group">
        <?php echo $form->labelEx($obj_client,'relationship'); ?>
          <div class="controls">
                <?php echo $form->textField($obj_client,'relationship'); ?>
                <?php echo $form->error($obj_client,'relationship'); ?>
          </div>   
     </div>

    
    <div class="control-group buttons">
        <?php echo CHtml::submitButton($obj_client->isNewRecord ? 'Create' : 'Save', array("class" => "btn btn-primary")); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- End form -->