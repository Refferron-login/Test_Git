<?php
Yii::app()->clientScript->registerScript('donation', "
var rate=parseInt($('#rate').val(),10);
var mileage=parseInt($('#mileage').val(),10);
var donation=parseInt($('#donation').val(),10);
var exp=rate*mileage;
if(mileage>0 && donation>0)
{
    $('#exp').html('&pound;'+Math.abs(exp));
    $('#earn').html('&pound;'+Math.abs((donation-exp)));
}
else if(mileage>0)
{
     $('#exp').html('&pound;'+Math.abs(rate*mileage));
}
else if(donation>0)
{
    $('#earn').html('&pound;'+Math.abs((donation)));
}
$('#donation').keyup(function(){
    
    var mileage=parseInt($('#mileage').val(),10);
    var donation=parseInt($('#donation').val(),10);
    var exp=rate*mileage;
    if(mileage>0 && donation>0)
    {
       
        $('#exp').html('&pound;'+Math.abs(exp));
        if(exp<donation)
               $('#earn').html('&pound;'+Math.abs((donation-exp)));
        else
               $('#earn').html('&pound;'+0);
    }
    else if(donation>0)
    {
        $('#earn').html('&pound;'+(donation));
        $('#exp').html('&pound;'+0);
    }
    else
    {
        $('#earn').html('&pound;'+0);
        $('#exp').html('&pound;'+0);
    }
});
$('#mileage').keyup(function(){
    var mileage=parseInt($('#mileage').val(),10);
    var donation=parseInt($('#donation').val(),10);
    var exp=rate*mileage;
    if(mileage>0 && donation>0)
    {
        $('#exp').html('&pound;'+Math.abs(exp));
        if(exp<donation)
            $('#earn').html('&pound;'+Math.abs((donation-exp)));
        else
               $('#earn').html('&pound;'+0);    
    }
    else if(donation>0)
    {
        $('#earn').html('&pound;'+(donation));
        $('#exp').html('&pound;'+0);
    }
});
$('.user_id').click(function(){
     $('#viewall').removeAttr('disabled', 'true');
});
");

/* @var $this DonationController */
/* @var $model Donation */
/* @var $form CActiveForm */
$this->menu = array(array('label' => 'List Enquiry', 'url' => array('inquiry/admin')));
?>
<h1>Enquiry Detail</h1> 
<?php
$inquiry_model = Inquiry::model()->findByPk($id);

if($inquiry_model->service_type!=1)
{
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $inquiry_model,
    'id' => 'inquiry_list',
    'attributes' => array(
       'inquiry_id', 
        array(
            'name'=>'client.client_name',
            'value'=>$inquiry_model->client->title." ".$inquiry_model->client->client_name
        ),
        //'client.fname',
        //'client.lname',
        'client.family_name',
        array( 'name' => 'appointment_date',
               'value' => $inquiry_model->appointment_date?Yii::app()->dateFormatter->format("dd-MM-y  HH:mm:ss",strtotime($inquiry_model->appointment_date)):NULL
            ),
        //'appointment_date',
        'client.email',
        'client.phno',
        'client.home_phno',
        'client.country',
        'client.state',
       // 'client.city',
        'client.town',        
        'client.address',
         array(
            'name' => 'Duty Officer',
            'value' => $inquiry_model->do->username
        ),
        
        array(
            'name' => 'service_type',
            'value' => array($inquiry_model, 'renderServicetype')
        ),
        array(
            'name' => 'job_detail',
            'value' => $inquiry_model->job_detail,
        ),
        array(
            'name' => 'Resource',
            'value' => array($inquiry_model, 'renderResourcename')
        ),
       array(
            //'name' => 'Date of job',
           'name' => 'Date Job Allocated',
            'value' => array($inquiry_model, 'renderJobdate')
        ),
        array(
            'name' => 'Estimated Time(Hrs)',
            'value' => array($inquiry_model, 'renderTimetaken')
        ),
        array(
            'name'=>'Job Description',
            'oneRow'=>true,
            'type'=>'raw',
            'value'=>$inquiry_model->note,
        ),
        array(
            'name'=>'Special Requirement',
            'oneRow'=>true,
            'type'=>'raw',
            'value'=>$inquiry_model->special_requirment,
        )
    )
));
}
else
{
    $this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $inquiry_model,
    'id' => 'inquiry_list',
    'attributes' => array(
        'inquiry_id', 
         array(
             'name'=>'client.client_name',
             'value'=>$inquiry_model->client->title."".$inquiry_model->client->client_name
        ),
        //'client.fname',
        //'client.lname',
        'client.family_name',
         array( 'name' => 'appointment_date',
               'value' => $inquiry_model->appointment_date?Yii::app()->dateFormatter->format("dd-MM-y  HH:mm:ss",strtotime($inquiry_model->appointment_date)):NULL
            ),
        //'appointment_date',
        'client.email',
        'client.phno',
        'client.home_phno',
        'client.country',
        'client.state',
       // 'client.city',
        'client.town',        
        'client.address',
        array(
            'name' => 'Duty Officer',
            'value' => $inquiry_model->do->username
        ),
        array(
            'name' => 'service_type',
            'value' => array($inquiry_model, 'renderServicetype')
        ),
       array(
            'name' => 'Resource',
            'value' => array($inquiry_model, 'renderResourcename')
        ),
       array(
            //'name' => 'Date of job',
              'name' => 'Date Job Allocated',
            'value' => array($inquiry_model, 'renderJobdate')
        ),
         array(
            'name' => 'Estimated Time(Hrs)',
            'value' => array($inquiry_model, 'renderTimetaken')
        ),
        array(
            'name' => 'To Location',
            'value' => array($inquiry_model, 'renderTolocation')
        ),
        array(
            'name' => 'From Location',
            'value' => array($inquiry_model, 'renderFromlocation')
        ),
        array(
            'name'=>'Job Description',
            'oneRow'=>true,
            'type'=>'raw',
            'value'=>$inquiry_model->note,
        )
       
        
    )
));
}
$inquiry_type = Inquiry::model()->findAllByAttributes(array('inquiry_id' => $id));
$status = $inquiry_type[0]->status;
$type=$inquiry_type[0]->service_type;
if ($status == 0)
 {
        ?>
        <div class="form">
            <?php
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'htmlOptions' => array('class' => 'well'),
                'id' => 'donation-insert-form',
                'type' => 'horizontal',
                'enableAjaxValidation' => false,
            ));
            ?>
            <p class="note">Fields with <span class="required">*</span> are required.</p>
            <?php //echo $form->errorSummary($model);  ?>
            <div class="control-group">
                <?php echo $form->hiddenField($model, 'inquiry_id', array('value' => $id)); ?>
            </div>
            <?php  if($type!=1) {?>
             <div class="control-group">
                <?php echo $form->labelEx($obj_material,'time_taken'); ?>
                   <div class="controls">
                <?php echo $form->textField($obj_material,'time_taken')." Hrs"; ?>
                <?php echo $form->error($obj_material,'time_taken'); ?>
                   </div>
            </div>

            <div class="control-group">
                <?php echo $form->labelEx($obj_material,'description'); ?>
                  <div class="controls">
                <?php echo $form->textArea($obj_material,'description',array('size'=>60,'maxlength'=>200)); ?>
                <?php echo $form->error($obj_material,'description'); ?>
                  </div>
            </div>

            <div class="control-group">
                <?php echo $form->labelEx($obj_material,'quantity'); ?>
                  <div class="controls">
                <?php echo $form->textField($obj_material,'quantity'); ?>
                <?php echo $form->error($obj_material,'quantity'); ?>
                  </div>
            </div>

            <div class="control-group">
                <?php echo $form->labelEx($obj_material,'cost'); ?>
                  <div class="controls">
                <?php echo $form->textField($obj_material,'cost'); ?>
                <?php echo $form->error($obj_material,'cost'); ?>
                  </div>
            </div>
            <?php } //end of if?>

            <div class="control-group">
                <?php echo $form->labelEx($model, 'amount'); ?>
                <div class="controls">
                    <?php echo "&pound;".$form->textField($model, 'amount', array('id' => 'donation')); ?>
                    <?php echo $form->error($model, 'amount'); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->labelEx($model, 'mileage'); ?>
                <div class="controls">
                    <?php echo "miles".$form->textField($model, 'mileage', array('id' => 'mileage')); ?>
                    <?php echo $form->error($model, 'mileage'); ?>
                </div>
            </div>
            <div class="control-group">
                 
                <?php
                echo CHtml::label('Expenditure', false);
                echo CHtml::label('&pound;0', false, array('id' => 'exp'));
                ?>

            </div>
             <div class="control-group">
                
                <?php 
                echo CHtml::label('Earning', false);
                echo CHtml::label('&pound;0', false, array('id' => 'earn'));
                ?>
                
            </div>
        
            <div class="control-group">
                <?php echo CHtml::submitButton('Update', array('class' => 'btn btn-primary')); ?>
            </div>
            <?php
            $this->endWidget();
            echo CHtml::hiddenField('rate', $rate, array('id' => 'rate'));
            ?>
        </div><!-- End form -->
        

<?php
/* @var $this EnquiryMaterialController */
/* @var $model EnquiryMaterial */
/* @var $form CActiveForm */
?>


        <?php
} 
else if($status==1)
{
    
    if($type!=1)
    {
        $material_id=EnquiryMaterial::model()->findAllByAttributes(array('inquiry_id' => $id));
        $material=EnquiryMaterial::model()->findByPk($material_id[0]->material_id);
        $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'id' => 'donation_grid',
        'attributes' => array(
         array(
            'name'=>'Time Taken',
            'oneRow'=>true,
            'type'=>'raw',
            'value'=>$material->time_taken.' Hrs',
        ),
             array(
            'name'=>'Material Used',
            'oneRow'=>true,
            'type'=>'raw',
            'value'=>$material->description,
        ),
             array(
            'name'=>'Quantity',
            'oneRow'=>true,
            'type'=>'raw',
            'value'=>$material->quantity,
        ),
             array(
            'name'=>'Cost',
            'oneRow'=>true,
            'type'=>'raw',
            'value'=>$material->cost,
        )
           
        )));
        
    }
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'id' => 'donation_grid',
        'attributes' => array(
         array(
            'name'=>'amount',
            'oneRow'=>true,
            'type'=>'raw',
            'value'=>'&pound; '.$model->amount,
        ),
             array(
            'name'=>'mileage',
            'oneRow'=>true,
            'type'=>'raw',
            'value'=>$model->amount.' miles',
        )
           
        )));
}
else
{   $url=$this->createAbsoluteUrl("clientDetail/assignresource",array('id'=>$id));
    
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'from_user_list',
        'action' =>$url,  
      
));
    $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'user-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $user_model->search(),
    'filter' => $user_model,
    'columns' => array(
                       array(
                          'header' => '',
                          'value' => 'CHtml::radioButton("user_id[]",null,array("value"=>$data->user_id,"class"=>"user_id"))',                       'type' => 'raw'  
                       ),
                        array(
                            'header' => 'Name',
                            'name' => 'user_name',
                            'value' => 'ucwords($data->title.\' \'.$data->user_name)'
                        ),
                        'phno',
                        'email',
                        'location',
                        
                     ),
         'afterAjaxUpdate' => "
            function(id, data) {
                 $('#viewall').attr('disabled', 'true');
                $('.user_id').click(function(){
                $('#viewall').removeAttr('disabled', 'true');
                });
              }"
            )
    );
    $this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Submit',
    'type' => 'primary', 
    'buttonType'=>'submit',
    'htmlOptions' => array('id' => 'viewall','disabled'=>'true')
));

$this->endWidget();

}
echo CHtml::link("Back", array("inquiry/admin"));




