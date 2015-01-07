<?php
$this->layout = 'temp';
if (!empty($data)) {
    $date_time = $data['date_time'];
    $hrs_taken = $data['hrs_taken'];
    $service = $data['service_type'];
    if ($service != 1) {
        $service = $data['job_type'];
    }
    if($hrs_taken=='')
    {
        $hrs_taken="3";
    }
        
    $_SESSION['date_time'] = $date_time;
    $_SESSION['service_type'] = $service;
    $_SESSION['hrs_taken'] = $hrs_taken;
} else {
    $date_time = $_SESSION['date_time'];
    $service = $_SESSION['service_type'];
    $hrs_taken = $_SESSION['hrs_taken'];
}
?>
<div>
<?php 
$url=$this->createAbsoluteUrl("Report/totaldonationcsv");
Yii::app()->clientScript->registerScript('search', "
$('#form_viewall').submit(function(){
$('#txt_viewall').val('1');    
$('#find-available-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
/*$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'form_viewall',
    'type'=>'search',
   )); 
echo $form->hiddenField($model, 'viewall', array('id' => 'txt_viewall'));
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'View All',
    'type' => 'success', 
    'buttonType'=>'submit',
    'htmlOptions' => array('id' => 'viewall','style'=>'display:none')
));*/


$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'find-available-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->dialogsearch($date_time, $service,floatval($hrs_taken)),
    'filter' => $model,
    'columns' => array(
                        array(
                            'header' => '',
                            'value' => 'CHtml::radioButton("user_id[]",null,array("value"=>$data->availability_id,"class"=>"avail_select","id"=>"aid_".$data->availability_id))',
                            'type' => 'raw'
                        ),
                        array(
                            'name' => 'name',
                            'value' => 'ucwords($data->user->title.\' \'.$data->user->user_name)'
                        ),
                       
                        array(
                                'name' => 'available_date',
                                'value'=>'Yii::app()->dateFormatter->format("dd-MM-y",strtotime($data->available_date))'
                        ),
                        'from_time',
                        'to_time',
                        array(
                            'name' => 'location',
                            'value' => '$data->user->location'
                        ), 
                        array(
                                    'class' => 'bootstrap.widgets.TbButtonColumn',
                                    'template'=>'{detail}',
                                    'buttons'=>array(
                                    'detail'=>array(
                                            'label'=>'Show Details', 
                                            'url'  =>'Yii::app()->createUrl("users/view",array("id"=>$data->user->user_id))',
                                            'options'=>array('title'=>'Show Details','class'=>'detailsLink','target'=>'_blank'),                           
                                   )) 
                            ),
        ),
    'afterAjaxUpdate' => "
            function(id, data) {
                $('#jobDialog').find('.avail_select').click(function(){
                        $('#aval_val').val($(this).val());
                         $('#aval_all_val').val(0);
                        $('#avail_rcrd').html($(this).parent().parent().html());
                        $('#avail_rcrd').find('.avail_select').hide();
                        $('#result').show();
                        $('#confirm').removeAttr('disabled', 'true');
                       
                });
              }")
    );

//$this->endWidget();

?>
</div>
<script>
$(document).ready(function(){
     if($('#find-available-grid table td').hasClass('empty'))
     {
           $('#viewall').show();
     }
     else
     {
            $('#viewall').hide();
     }
});
</script>
