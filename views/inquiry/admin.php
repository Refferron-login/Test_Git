<?php
$this->breadcrumbs=array(
	'Enquiry List'
);
$this->menu=array(	
	array('label'=>'New Enquiry', 'url'=>array('clientDetail/create')),
        array('label' => 'Unfullfilled Enquiries', 'url' => array('inquiry/admin','status'=>2)),
        array('label' => 'Completed Enquiries', 'url' => array('inquiry/admin','status'=>1)),
        array('label' => 'Completed Outstanding Info', 'url' => array('inquiry/admin','status'=>0)),
    
);
?>
<script>
   jQuery(document).ready(function() {
        setTimeout("jQuery('.alert').hide();", 4000);
    }); 
    $('#jobDialog').find('.avail_select').click(function() {
        alert($(this).val());
    });
</script>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#inquiry-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true, 
    'fade' => true, 
    'closeText' => 'close',
    'alerts' => array(// configurations per alert type
        'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;')
    )
));

?>

<h1>Enquiry List</h1>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model
));*/ ?>
</div><!-- search-form -->
<?php
Yii::app()->clientScript->registerScript('search', "
$('#inquiry-form').submit(function(){
    $('#inquiry-grid').yiiGridView('update', {
        data: $(this).serialize()
    });    
    return false;
});
");

$dataProvider=new CActiveDataProvider($model);
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inquiry-form',
    'enableAjaxValidation'=>false,
    'type' => 'search',
    'htmlOptions' => array('class' => 'well')
)); 

/* search form */
echo $form->textFieldRow($model, 'start_date', array('id' => 'date_range', 'readonly' => true, 'prepend' => '<i class=""><img src="themes/blackboot/css/css/calendar.png" /></i>')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Go')); 
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'inquiry-grid',
        'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
        'filter'=>$model, 
	'columns'=>array(
		/*array(
                    'header'=>'',
                    'name'=>'donations.inquiry_id',
                    'value'=>'CHtml::radioButton("inquiry_id[]",null,array("value"=>$data->inquiry_id,"class"=>"inquiry_select","id"=>"inquiry_".$data->inquiry_id))',
                    'type'=>'raw',
                    'htmlOptions'=>array('width'=>5),
                    //'visible'=>false,
                    
                    ), */
               /* array(
                     'id' => 'selectedIds',
                     'class' => 'CCheckBoxColumn'
                ),*/
               array(
                     'name'=>'inquiry_id',
                     //'value'=>'$data->inquiry_id',
                     'value' => 'CHtml::link($data->inquiry_id,Yii::app()->createUrl("inquiry/updatestatus",array("id"=>$data->primaryKey)))',
                     'type'  => 'raw'
                     
                  ),
                array(
                    'header'=>'Client',
                    'name'=>'ClientName',
                    'value'=>'$data->client->title." ".$data->client->client_name'
                ),
            array(
                    'header'=>'Family',
                    'name'=>'FamilyName',
                    'value'=>'$data->client->family_name'
                ),
		array(
                      'name'=>'service_type',  
                      'value'=>array($model,'renderServicetype') 
                ),
                array(
                      'name'=>'job_detail',  
                      'value'=>array($model,'renderJob'),
                      'filter'=>false  
                ),
                array(
                      'name'=>'status',  
                      'value'=>array($model,'renderStatus'),
                      'filter'=>false,
                ),
                array(
                    'name'=>'Date_Time',
                    'value'=>array($model,'renderDatetime')
                 ),
                array(
                      'name'=>'appointment_date',
                      'value'=>'$data->appointment_date?Yii::app()->dateFormatter->format("dd-MM-y  HH:mm:ss",strtotime($data->appointment_date)):NULL',
                 ),
            array(
                 
                'name'=>'UserName',
                'value'=>array($model,'renderResource'),
            ),
             array(
                    'header'=>'DutyOfficer',
                    'name'=>'DoName',
                    'value'=>'$data->do->username'
                ),
                 
            )
    )); 
$this->endWidget();
?>
 <div class="clearfix">
    <?php //echo CHtml::submitButton('View Enquiry  ',array('id'=>'update','class'=>'btn-primary')); ?>
 </div>
 <?php //$this->endWidget(); ?>
 <script>
    $(document).ready(function() {
       
        $('#date_range').daterangepicker();

    });
</script>