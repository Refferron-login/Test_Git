<?php
/* @var $this ClientDetailController */
/* @var $obj_client ClientDetail */
/* @var $form CActiveForm */
?>
<script>
   jQuery(document).ready(function() {
     /*$("#add").click(function() {
         
        var intId = $("#jobfield div").length + 1;
        if(intId<=21)
        {
            var fieldWrapper = $("<div class=\"control-group\" id=\"job" + intId + "\"/>");
            var fieldWrapper2 = $("<div class=\"controls\" >");
            var fName = $("<input type=\"text\" class=\"job\" />");
            var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\"/>");

            removeButton.click(function() {
                $(this).parent().parent().remove();

            });
            fieldWrapper2.append(fName);
            fieldWrapper2.append(removeButton);
            fieldWrapper.append(fieldWrapper2);
            $("#jobfield").append(fieldWrapper);
        }
        else
        {
            alert("You can't add more than 10 jobs.");
        }
        
    });*/
       $('#dropdown_job').hide();
        setTimeout("jQuery('.alert').hide();", 3000);
          $("#department").attr("disabled","disabled");    
          $("#location_list").change(function(){
            $("#to_location").val("");
            if($.trim($("#location_list").val()))
            {
                $("#department").removeAttr("disabled");
                
            }
            else
            {   $("#department").val("");
                $("#department").attr("disabled","disabled");
                
            }
        });
        $("#confirm").click(function(){
           
            var department=$("#department").val();
            var location_list=$("#location_list option:selected").text();
            var to_location=$("#to_location").val();
            if(department && to_location && location_list)
                $("#to_location").val("Address :  "+to_location+"\nLocation : "+location_list+"\nDepartment : "+department);
            /*if($("#service_type").val()!=1)
            {
                var job_fields_value="";
                $("#jobfield .job").each(function() {
                    job_fields_value+=$(this).val()+",";
                });
                job_fields_value = job_fields_value.substring(0, job_fields_value.length-1);
                $("#Inquiry_job_detail").val(job_fields_value);
            }*/
           
            $("#inquiry-form").submit();
            
        });
    }); 
    
</script>
<?php
Yii::app()->clientScript->registerCss('autocompleteSize', "
.ui-autocomplete {
max-height: 400px;
overflow-y: auto;
/* prevent horizontal scrollbar */
overflow-x: hidden;
/* add padding to account for vertical scrollbar */
padding-right: 20px;
}
", 'screen', CClientScript::POS_HEAD);
$this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true, 
    'fade' => true, 
    'closeText' => 'close',
    'alerts' => array(// configurations per alert type
        'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;')
    )
));
Yii::app()->clientScript->registerScript('jobtype', "
$('#handyman').hide(); 
        var v=$('#service_type').val();
        if(v==1)
        {
            $('#driver').show();
            $('#handyman').hide();
            $('#pickup_date').text('Pick Up Time').append($('<span></span>').addClass('required').text('*'));
            $('#find').attr('value','Find Driver');
        }
        else
        {
             $('#handyman').show();
             $('#driver').hide();
             $('#pickup_date').text('Service Time').append($('<span></span>').addClass('required').text('*'));
             $('#find').attr('value','Find Handyman');
        }
        
        
$('#service_type').click(function(){
        var v=this.value;
        if(v==1)
        {
            $('#driver').show();
            $('#handyman').hide();
             $('#pickup_date').text('Pick Up Time').append($('<span></span>').addClass('required').text('*'));
             $('#find').attr('value','Find Driver');
        }
        else
        {
             $('#handyman').show();
             $('#driver').hide();
             $('#pickup_date').text('Service Time').append($('<span></span>').addClass('required').text('*'));
             $('#find').attr('value','Find Handyman');
        }
      
        return false;
});
$('#service_type').change(function()
{
         $('#result').hide();
         $('#confirm').attr('disabled',true);
});
$('#job').change(function(){
         $('#result').hide();
         $('#confirm').attr('disabled',true);
});
");

?>
<?php   $do=DutyOfficers::model()->findAllByAttributes(array('username'=> Yii::app()->user->name));?>

<div class="form">
    <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                    'htmlOptions' => array('class' => 'well'),
                    'id' => 'inquiry-form',
                    'type' => 'horizontal',
                    'enableAjaxValidation' => false,
                ));
    ?>
     
    <h2>Duty Officer : <?php echo $do[0]->username; ?></h2>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
   
   <!-- <div class="control-group ">
        <?php 
      
        
        //echo $form->labelEx($obj_inquiry, 'do_id', array('class' => 'control-label')); 
        ?>
        <div class="controls">
            <?php 
           // echo $form->hidden($obj_inquiry, 'do_id',$do_list, array('id' => "do_id")); 
            //echo $form->error($obj_inquiry, 'do_id'); 
            ?>
        </div>
    </div>-->
    
       
    <div class="control-group">
        <?php 
        echo $form->hiddenField($obj_handyman_job, 'allocation_id', array('id' => 'aval_val'));
        echo $form->hiddenField($obj_handyman_job, 'user_id', array('id' => 'aval_all_val','value'=>0));
        echo $form->hiddenField($obj_inquiry, 'do_id', array('id' => "do_id",'value'=>$do[0]->do_id));
        ?>
    </div> 
    
    
    <div class="control-group ">
        <?php
        echo $form->labelEx($obj_client, 'title', array('class' => 'control-label')); 
        ?>
        <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'title',
            'attribute' => 'title',
            'id' => 'title',
            'source' => Yii::app()->db->createCommand("SELECT distinct title FROM client_detail")->queryColumn(),
            'model' => $obj_client
        ));
        echo $form->error($obj_client, 'title'); 
        ?>
        </div>
    </div>
    <div class="control-group ">
        <?php 
        echo $form->labelEx($obj_client, 'client_name', array('class' => 'control-label')); 
        ?>
        <div class="controls">
        <?php
        $url = $this->createAbsoluteUrl("clientDetail/autofill");
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'client_name',
            'attribute' => 'client_name',
            'id' => 'client_name',
            'source' => Yii::app()->db->createCommand("SELECT DISTINCT client_name FROM client_detail order by client_name")->queryColumn(),
            
            //Yii::app()->db->createCommand("SELECT lname FROM client_detail ")->queryColumn(),
            'model' => $obj_client,
             'options' => array(
                                    'close' => 'js:function(request, response) {
                                                //$("#fname").val("");
                                                $.ajax({
                                                     url:"' . $url . '",
                                                     data:$("#inquiry-form").serialize(),  
                                                     type:"POST",
                                                     dataType:"json",
                                                     success: function(data)
                                                     {
                                                         $("#family_name").val(data.family_name);
                                                         $("#address").val(data.address);
                                                         $("#country").val(data.country);
                                                         $("#town").val(data.town);
                                                         $("#state").val(data.state);
                                                         $("#post_code").val(data.post_code);
                                                         $("#phno").val(data.phno);
                                                         $("#home_phno").val(data.home_phno);
                                                         $("#email").val(data.email);
                                                         $("#dob").val(data.DOB); 
                                                         $("#next_of_kin_name").val(data.next_of_kin_name); 
                                                         $("#next_of_kin_contact").val(data.next_of_kin_contact);
                                                         $("#next_of_kin_home_phno").val(data.next_of_kin_home_phno);
                                                         $("#relationship").val(data.relationship);
                                                     },
                                                     
                                                });}')
               
                                   
        ));
        echo $form->error($obj_client, 'client_name');
        ?>
        </div>
    </div>
    <!-- <div class="control-group ">
        <?php 
        //echo $form->labelEx($obj_client, 'fname', array('class' => 'control-label')); 
        ?>
        <div class="controls">
            <?php
            /* $url = $this->createAbsoluteUrl("clientDetail/autofill");
             $url1 = $this->createAbsoluteUrl("clientDetail/fnamefill");
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'name' => 'fname',
                'id' => 'fname',
                'attribute' => 'fname',
               
                'model' => $obj_client,
                'source' =>'js:function(request, response) {
                                                $.ajax({
                                                     url:"' . $url1 . '",
                                                     data:$("#inquiry-form").serialize(),  
                                                     type:"POST",
                                                     dataType:"json",
                                                     success: function(data)
                                                     {
                                                         response(data);
                                                     }
                                                });}', 
                 'options' => array(
                                    'close' => 'js:function(request, response) {
                                                $.ajax({
                                                     url:"' . $url . '",
                                                     data:$("#inquiry-form").serialize(),  
                                                     type:"POST",
                                                     dataType:"json",
                                                     success: function(data)
                                                     {

                                                         $("#email").val(data.email);
                                                         $("#fname").val(data.fname);
                                                         $("#phno").val(data.phno);
                                                         $("#address").val(data.address);
                                                         $("#state").val(data.state);
                                                         $("#country").val(data.country);
                                                         $("#town").val(data.town);
                                                         $("#post_code").val(data.post_code);
                                                         $("#dob").val(data.DOB); 
                                                         $("#next_of_kin_name").val(data.next_of_kin_name); 
                                                         $("#next_of_kin_contact").val(data.next_of_kin_contact);
                                                     },
                                                     
                                                });}'
                
            )));
            ?>
            <?php echo $form->error($obj_client, 'fname');*/ ?>
        </div>
    </div>-->
     <div class="control-group ">
        <?php
        echo $form->labelEx($obj_client, 'family_name', array('class' => 'control-label')); 
        ?>
        <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'family_name',
            'attribute' => 'family_name',
            'id' => 'family_name',
            'source' => Yii::app()->db->createCommand("SELECT family_name FROM client_detail")->queryColumn(),
            'model' => $obj_client
        ));
        echo $form->error($obj_client, 'family_name'); 
        ?>
        </div>
    </div>
     <div class="control-group">
            <?php 
            echo $form->labelEx($obj_client, 'address', array('class' => 'control-label')); 
            ?>
        <div class="controls">
            <?php 
            echo $form->textArea($obj_client, 'address', array('maxlength' => 200,'rows' => 3, 'cols' => 50, 'id' => 'address'));             
            echo $form->error($obj_client, 'address'); 
            ?>
        </div>
    </div>
    <div class="control-group">
            <?php 
            echo $form->labelEx($obj_client, 'country', array('class' => 'control-label')); 
            ?>
        <div class="controls">
            <?php 
            echo $form->textField($obj_client, 'country', array('size' => 60, 'maxlength' => 200, 'id' => 'country'));             echo $form->error($obj_client, 'country'); 
            ?>
        </div>
    </div>
     <div class="control-group">
            <?php 
            echo $form->labelEx($obj_client, 'state', array('class' => 'control-label')); 
            ?>
        <div class="controls">
            <?php 
            echo $form->textField($obj_client, 'state', array('size' => 60, 'maxlength' => 200, 'id' => 'state'));             echo $form->error($obj_client, 'state'); 
            ?>
        </div>
    </div>
     <div class="control-group">
            <?php 
            echo $form->labelEx($obj_client, 'town', array('class' => 'control-label')); 
            ?>
        <div class="controls">
            <?php 
            echo $form->textField($obj_client, 'town', array('size' => 60, 'maxlength' => 200, 'id' => 'town'));             echo $form->error($obj_client, 'town'); 
            ?>
        </div>
    </div>
     <div class="control-group">
        <?php
        echo $form->labelEx($obj_client, 'post_code', array('class' => 'control-label')); 
        ?>
        <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'post_code',
            'attribute' => 'post_code',
            'id' => 'post_code',
            'source' => Yii::app()->db->createCommand("SELECT post_code FROM client_detail")->queryColumn(),
            'model' => $obj_client
        ));
        echo $form->error($obj_client, 'post_code'); 
        ?>
        </div>
    </div>
      <div class="control-group">
        <?php
        echo $form->labelEx($obj_client, 'phno', array('class' => 'control-label')); 
        ?>
        <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'phno',
            'attribute' => 'phno',
            'id' => 'phno',
            'source' => Yii::app()->db->createCommand("SELECT phno FROM client_detail")->queryColumn(),
            'model' => $obj_client
        ));
        echo $form->error($obj_client, 'phno'); 
        ?>
        </div>
    </div>
     <div class="control-group">
        <?php
        echo $form->labelEx($obj_client, 'home_phno', array('class' => 'control-label')); 
        ?>
        <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'home_phno',
            'attribute' => 'home_phno',
            'id' => 'home_phno',
            'source' => Yii::app()->db->createCommand("SELECT home_phno FROM client_detail")->queryColumn(),
            'model' => $obj_client
        ));
        echo $form->error($obj_client, 'home_phno'); 
        ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        $url = $this->createAbsoluteUrl("clientDetail/autofill");
        echo $form->labelEx($obj_client, 'email', array('class' => 'control-label'));
        ?>
        <div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'name' => 'email',
                'id' => 'email',
                'attribute' => 'email',
                'source' => Yii::app()->db->createCommand("SELECT email FROM client_detail")->queryColumn(),
                'model' => $obj_client,
                'options' => array(
                                    'close' => 'js:function(request, response) {
                                                $.ajax({
                                                     url:"' . $url . '",
                                                     data:$("#inquiry-form").serialize(),  
                                                     type:"POST",
                                                     dataType:"json",
                                                     success: function(data)
                                                     {

                                                         $("#client_name").val(data.client_name);
                                                         $("#family_name").val(data.family_name);
                                                         $("#address").val(data.address);
                                                         $("#country").val(data.country);
                                                         $("#town").val(data.town);
                                                         $("#state").val(data.state);
                                                         $("#post_code").val(data.post_code);
                                                         $("#phno").val(data.phno);
                                                         $("#home_phno").val(data.home_phno);
                                                         $("#email").val(data.email);
                                                         $("#dob").val(data.DOB); 
                                                         $("#next_of_kin_name").val(data.next_of_kin_name); 
                                                         $("#next_of_kin_contact").val(data.next_of_kin_contact);
                                                         $("#next_of_kin_home_phno").val(data.next_of_kin_home_phno);
                                                         $("#relationship").val(data.relationship);

                                                     }
                                                });}'
                                   )));
           echo $form->error($obj_client, 'email');
           ?>
        </div>
    </div>
     <div class="control-group">
        <?php echo $form->labelEx($obj_client,'DOB'); ?>
         <div class="controls">
            <?php //echo $form->dateField($obj_client,'DOB'); 
                  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $obj_client,
                     'id'=>'dob', 
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
                <?php echo $form->labelEx($obj_inquiry, 'special_requirment', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textArea($obj_inquiry, 'special_requirment',array('maxlength'=>100,'rows'=>3)); ?>
                    <?php echo $form->error($obj_inquiry, 'special_requirment'); 
                   ?>
                </div>
     </div>
     <div class="control-group">
        <?php echo $form->labelEx($obj_client,'next_of_kin_name'); ?>
          <div class="controls">
                <?php echo $form->textField($obj_client,'next_of_kin_name',array('size'=>60,'maxlength'=>100,'id'=>'next_of_kin_name')); ?>
                <?php echo $form->error($obj_client,'next_of_kin_name'); ?>
          </div> 
     </div>

     <div class="control-group">
        <?php echo $form->labelEx($obj_client,'next_of_kin_contact'); ?>
          <div class="controls">
                <?php echo $form->textField($obj_client,'next_of_kin_contact',array('size'=>20,'maxlength'=>20,'id'=>'next_of_kin_contact')); ?>
                <?php echo $form->error($obj_client,'next_of_kin_contact'); ?>
          </div>   
     </div>
    <div class="control-group">
        <?php echo $form->labelEx($obj_client,'next_of_kin_home_phno'); ?>
          <div class="controls">
                <?php echo $form->textField($obj_client,'next_of_kin_home_phno',array('size'=>20,'maxlength'=>20,'id'=>'next_of_kin_contact')); ?>
                <?php echo $form->error($obj_client,'next_of_kin_home_phno'); ?>
          </div>   
     </div>
    <div class="control-group">
        <?php echo $form->labelEx($obj_client,'relationship'); ?>
          <div class="controls">
                <?php echo $form->textField($obj_client,'relationship',array('size'=>20,'maxlength'=>20,'id'=>'next_of_kin_contact')); ?>
                <?php echo $form->error($obj_client,'relationship'); ?>
          </div>   
     </div>

    <div class="control-group ">
        <?php 
        echo $form->labelEx($obj_inquiry, 'service_type', array('class' => 'control-label')); 
        ?>
        <div class="controls">
            <?php 
            echo $form->dropDownList($obj_inquiry, 'service_type', array(1 => 'Transport', 0 => 'Handyman'), array('id' => "service_type")); 
            echo $form->error($obj_inquiry, 'service_type'); 
            ?>
        </div>
    </div>
    
    <div class="control-group" id="handyman">
        <div id="dropdown_job">
        <?php echo $form->labelEx($obj_job, 'job_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($obj_job, 'job_id', array(2=>'Handyman'), array('id' => 'job')); ?>
            <?php echo $form->error($obj_job, 'job_id'); ?>
        </div> 
        </div>
        
        <!-- Job boxes-->
        <!--<div class="control-group">
            <div id="jobfield" >
                <div class="control-group">
                     <label>Work Required to be displayed</label>
                    <div class="controls">
                          <?php //echo $form->hiddenField($obj_inquiry, 'job_detail',array('value'=>"Transport")); ?>
                        <input class="job" type="text">
                        <input type="button" value="+" class="add" id="add" />  
                     </div>
                </div>
           </div>
        </div>
    -->
        <div class="control-group">
           
                     <label>Work Required to be displayed</label>
                    <div class="controls">
                          <?php echo $form->textArea($obj_inquiry, 'job_detail',array('rows'=>3)); ?> 
                         <?php echo $form->error($obj_inquiry, 'job_detail'); ?>
                     </div>
                     
        </div>
    </div>
     <div class="control-group ">
        <?php echo $form->labelEx($obj_inquiry, 'appointment_date', array('class' => 'control-label')); ?>
   <div class="controls">
       <div style="display: none">
                <?php
                $this->widget('application.extensions.timepicker.timepicker', array(
                'model' => $obj_handyman_job,
                'name' => 'date_time'
                ));
                ?>
            </div>
            <?php
                if(isset($_POST['appointment_date']))
                {
                       $date=$_POST['appointment_date'];
                }
                else 
                 { 
                    $date=date('Y-m-d H:i:s');
                    //$date=null;
                 }
                //echo '<i class=""><img src="themes/blackboot/css/css/calendar.png" /></i>';
                $this->widget('ext.timepicker1.BJuiDateTimePicker', array(
                    'model' => $obj_inquiry,
                    'name' => 'appointment_date',
                    'id' => 'appointment_date',
                    'type' => 'datetime', // available parameter is datetime or time
                    //'language'=>'de', // default to english
                    //'themeName'=>'sunny', // jquery ui theme, file is under assets folder
                    'value'=>$date,
                    'options' => array(
                        // put your js options here check http://trentrichardson.com/examples/timepicker/#slider_examples for more info            
                        'timeFormat' => 'h:mm',
                         'dateFormat' => 'dd-mm-yy',
                        //'showSecond'=>true,
                        'hourGrid' => 4,
                        'minuteGrid' => 10,
                         'defaultDate'=>null,
                    ),
                    'htmlOptions' => array(
                        // 'class'=>'input-medium'
                        'readOnly' => true,
                        
                    )
                ));
                echo $form->error($obj_inquiry, 'appointment_date'); 
                ?>
        </div>
    </div>
    <div id="div_unfullfill">
    <div class="control-group ">
        <?php echo $form->labelEx($obj_handyman_job, 'date_time', array('class' => 'control-label','id'=>'pickup_date')); ?>
        <div class="controls">
            <div style="display: none">
                <?php
                $this->widget('application.extensions.timepicker.timepicker', array(
                'model' => $obj_handyman_job,
                'name' => 'date_time'
                ));
                ?>
            </div>
                <?php
                if(isset($_POST['date_time']))
                {
                       $date=$_POST['date_time'];
                }
                else 
                 { 
                    //$date=date("m/d/Y h:i:s");
                    $date=null;
                 }
                //echo '<i class=""><img src="themes/blackboot/css/css/calendar.png" /></i>';
                $this->widget('ext.timepicker1.BJuiDateTimePicker', array(
                    'model' => $obj_handyman_job,
                    'name' => 'date_time',
                    'id' => 'date_time',
                    'type' => 'datetime', // available parameter is datetime or time
                    //'language'=>'de', // default to english
                    //'themeName'=>'sunny', // jquery ui theme, file is under assets folder
                    'value'=>$date,
                    'options' => array(
                        // put your js options here check http://trentrichardson.com/examples/timepicker/#slider_examples for more info            
                        'timeFormat' => 'h:mm:ss',
                         'dateFormat' => 'dd-mm-yy',
                        //'showSecond'=>true,
                        'hourGrid' => 4,
                        'minuteGrid' => 10,
                         'defaultDate'=>null,
                    ),
                    'htmlOptions' => array(
                        // 'class'=>'input-medium'
                        'readOnly' => true,
                        
                    )
                ));
                echo $form->error($obj_handyman_job, 'date_time'); 
                ?>
        </div>
       
      
        
    </div>
         <div class="control-group ">
        <?php echo $form->labelEx($obj_handyman_job, 'est_time_taken', array('class' => 'control-label')); ?>
        <div class="controls">
            <div style="display: none">
                <?php
                $this->widget('application.extensions.timepicker.timepicker', array(
                'model' => $obj_handyman_job,
                'name' => 'date_time'
                ));
                ?>
            </div>
                <?php
                if(isset($_POST['est_time_taken']))
                {
                       $hrs_taken=$_POST['est_time_taken'];
                }
                else 
                 { 
                    
                    $hrs_taken=null;
                 }
                 echo $form->textField($obj_handyman_job, 'est_time_taken',array('value'=>$hrs_taken));
                echo $form->error($obj_handyman_job, 'est_time_taken'); 
                ?>
        </div>
               <div class="clearfix">
            <?php
            echo CHtml::ajaxButton('Find Driver', array('clientDetail/findavailable'), array(
                'update' => '#div_find',
                'type' => 'POST',
                'data' => array('date_time' => "js:$('#date_time').val()", 'job_type' => "js:$('#job').val()", 'service_type' => "js:$('#service_type').val()",'hrs_taken' => "js:$('#HandymanJobAllocation_est_time_taken').val()"),
                'beforeSend' => 'function() {$("#formdata").hide().fadeOut(900);}',
                'complete' => 'function(data) {
                                    $("#formdata").hide().fadeIn(900);
                                    $("#jobDialog").dialog("open"); 
                                    $("#jobDialog").find(".avail_select").click(function(){
                                         $("#aval_val").val($(this).val());
                                          $("#aval_all_val").val(0);
                                         $("#avail_rcrd").html($(this).parent().parent().html());
                                         $("#avail_rcrd").find(".avail_select").hide();
                                         $("#result").show();
                                         $("#confirm").removeAttr("disabled", "disabled");
                                         $("#unfullfill").attr("disabled", "disabled");
                                    });
                                }'
                ), array("class" => "btn btn-primary",'disabled'=>'true','id'=>'find'));
            ?>
        </div>
    </div>
    
    <div class="control-group ">
        <div id="driver">
            
            <div class="control-group ">
                <?php echo $form->labelEx($obj_driver_job, 'from_location', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textArea($obj_driver_job, 'from_location',array('rows'=>3)); ?>
                    <?php echo $form->error($obj_driver_job, 'from_location'); ?>
                    </div>
                <div class="above_address">
                    <input type="checkbox" id="home_address" name="home_address"/> Same as Client address   
                </div>
            </div>
            <div class="control-group ">
                <?php echo $form->labelEx($obj_driver_job, 'from_post_code', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($obj_driver_job, 'from_post_code'); ?>
                    <?php echo $form->error($obj_driver_job, 'from_post_code'); ?>
                 </div>
               
            </div>
          
        
        <div class="control-group">
		<?php echo CHtml::label("Location",false) ?>
             <div class="controls">
                 
		<?php echo CHtml::dropDownList('type',null,$location_list, array(
                            'prompt' => 'Select Location',
                            'id'=>'location_list',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => Yii::app()->createUrl('locationMaster/locationlist'),
                                //'update' => '#to_location',
                                'dataType'=>'json',
                                'data' => array('id' => 'js:this.value'),
                                'success'=>'function(data) {
                                    //$("#to_location").val(data.tolocation);
                                }'
                                
                               ))); 
                 /*echo CHtml::button('New', array('class'=>'btn btn-primary','id'=>'open_location',
                        'onclick'=>'$("#new_location").dialog("open"); return false;',
                    ));*/
                  echo CHtml::ajaxButton('New', array('clientDetail/newdialog'), array(

                        'type' => 'POST',
                        'data' => array('type' => 1),
                        'complete' => 'function(data) {
                                         $("#new_location").dialog("open");
                                        }'
                        ),array("class" => "btn btn-primary",'id'=>'open_location'));
                  
        
	   
            // dialog add new location
            $url = $this->createAbsoluteUrl("locationMaster/create");
            $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	        'id'=>'new_location',
                'options'=>array(
	            'title'=>'Add New Location',
	            'autoOpen'=>false,
	            'modal'=>true,
	            'buttons'=>array(
	                'Add Item'=>'js:function(request, response) {
                                                $(this).dialog("close");
                                                  $.ajax({
                                                     url:"' . $url . '",
                                                     data:{new_location:$.trim($("#txt_new_location").val()),address_new_location:$.trim($("#txt_address_new_location").val()),postcode_new_location:$.trim($("#txt_postcode_new_location").val())},                                                      type:"POST",
                                                     dataType:"json",
                                                     success: function(data)
                                                     {     if(!$.isEmptyObject(data.value))
                                                            {
                                                                $("#location_list").append("<option value=" + data.value + ">"+data.label+"</option>"); 
                                                            }
                                                      }
                                                });}',
	                'Cancel'=>'js:function(){ $(this).dialog("close");}',
	            ),
	        ),
	    ));
	 
	    echo '<div class="dialog_input">Location:</br></br><input type="text" id="txt_new_location" name="txt_new_location"/></br></br>Address:</br></br><input type="text" id="txt_address_new_location" name="txt_address_new_location"/></br></br>Post Code:</br></br><input type="text" id="txt_postcode_new_location" name="txt_postcode_new_location"/></div>';
	 
	    $this->endWidget('zii.widgets.jui.CJuiDialog');
                ?>
		
             </div>
	</div>
        
             <div class="control-group ">
                <?php echo $form->labelEx($obj_driver_job, 'to_location', array('class' => 'control-label')); ?>     
                <div class="controls">
                    <?php echo $form->textArea($obj_driver_job, 'to_location',array('id'=>'to_location','rows'=>3)); ?>
                    <?php echo $form->error($obj_driver_job, 'to_location'); ?>
                </div>
            </div>
             <div class="control-group">
		<?php echo CHtml::label("Department",false) ?>
             <div class="controls">
                 
		<?php echo CHtml::textArea('type',null,array( 'id'=>'department','rows'=>3)) ?>
		
             </div>
	</div>
            <div class="control-group ">
                <?php echo $form->labelEx($obj_driver_job, 'to_post_code', array('class' => 'control-label')); ?>     
                <div class="controls">
                    <?php echo $form->textField($obj_driver_job, 'to_post_code',array('id'=>'to_post_code')); ?>
                    <?php echo $form->error($obj_driver_job, 'to_post_code'); ?>
                </div>
            </div>
             
        </div>
        
    </div>
    <div class="control-group ">
                <?php echo $form->labelEx($obj_inquiry, 'note', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textArea($obj_inquiry, 'note',array('rows'=>3)); ?>
                    <?php echo $form->error($obj_inquiry, 'note'); ?>
                </div>
     </div>
   
    <div class="control-group">
    <div class="controls">
                    <input type="checkbox" id="unfullfill" name="unfullfill"/> Save as Unfullfill Enquiry   
     </div>
        </div>
    <div>
        <div id="result" style="display: none;" class="well">
            <table>
                <tr id="avail_rcrd"></tr>
            </table>
        </div>
        <?php
        $findall = $this->createAbsoluteUrl("clientDetail/findall");
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'jobDialog',
            'options' => array(
                                'title' => Yii::t('job', 'Find availability'),
                                'autoOpen' => false,
                                'modal' => 'true',
                                'width' => '60%',
                                'height' => 'auto',
                                'buttons' => array('Ok' => 'js:function(){ $(this).dialog("close");}',
                                                   'View All' => 'js:function(){ $(this).dialog("close");
                                                     $("#viewall_dialog").dialog("open"); 
                                                     $.ajax({
                                                        url:"' . $findall . '",
                                                        type:"POST",
                                                         data:{service_type:$.trim($("#service_type").val()),job_type:$.trim                                                               ($("#job").val())}, 
                                                        success: function(data)
                                                        {
                                                                $("#div_find_all").html(data);
                                                                $("#viewall_dialog").find(".avail_select").click(function(){
                                                                $("#aval_all_val").val($(this).val());
                                                                 $("#aval_val").val(0);
                                                                $("#avail_rcrd").html($(this).parent().parent().html());
                                                                $("#avail_rcrd").find(".avail_select").hide();
                                                                $("#result").show();
                                                                $("#confirm").removeAttr("disabled", "disabled");
                                                                $("#unfullfill").attr("disabled", "disabled");
                                                           });
                                                        }
                                                    });}'
                                                ),
                              ),
        ));
        
        ?>
        <div id='div_find'></div>
         
         <?php $this->endWidget('zii.widgets.jui.CJuiDialog'); 
            
         $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'viewall_dialog',
            'options' => array(
                                'title' => Yii::t('job', 'Find availability'),
                                'autoOpen' => false,
                                'modal' => 'true',
                                'width' => '60%',
                                'height' => '600',
                                'buttons' => array('Ok' => 'js:function(){ $(this).dialog("close");}'),
                              ),
        ));
        ?>
        <div id='div_find_all'></div>
            <?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
            
        
        
        <div class="clearfix">
            <?php 
            echo CHtml::submitButton($obj_inquiry->isNewRecord ? 'Confirm' : 'Save', array('id' => 'confirm', 'class' => "btn btn-primary",'disabled'=>'true'));
            ?>    
        </div> 
        
    </div>
    <?php $this->endWidget(); ?>
</div><!-- End form -->
<script type="text/javascript">
   
    $('#home_address').click(function() {
        if (this.checked) {
            $("#DriverJobAllocation_from_location").val($("#address").val());
             $("#DriverJobAllocation_from_post_code").val($("#post_code").val());
        }
        else
        {
            $("#DriverJobAllocation_from_location").val("");
             $("#DriverJobAllocation_from_post_code").val("");
        }
        
    });
    
    $('#unfullfill').click(function() {
        if (this.checked) {
            //$("#driver").hide();
            //$("#div_unfullfill").hide();
            $("#confirm").removeAttr("disabled", "disabled");
        }
        else
        {
             if($('#service_type').val()==1)
                 $("#driver").show();
             $("#div_unfullfill").show();
             $("#confirm").attr("disabled", "disabled");
        }
               
    });
    $("#date_time").change(function(){
            var date_time=$("#date_time").val();
            if(date_time!='')
            {
                $("#find").removeAttr("disabled", "disabled");  
            }
            else
            {
                $("#find").attr("disabled", "disabled");  
            }
        });
</script>    