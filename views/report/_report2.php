<?php
Yii::app()->clientScript->registerScript('search', "
$('#extended-filters').submit(function(){
    $('#inquiry-grid').yiiGridView('update', {
        data: $(this).serialize()
    });    
    return false;
});
");
$this->layout = 'temp';
echo "<h3>Number of Job Booked During Month</h3>";
$url = $this->createAbsoluteUrl("Report/monthlyjobcsv");
/* search form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'extended-filters',
            'type' => 'search',
            'htmlOptions' => array('class' => 'well')
         ));
echo $form->textFieldRow($model, 'start_date', array('id' => 'date_range', 'readonly' => true, 'prepend' => '<i class=""><img src="themes/blackboot/css/css/calendar.png" /></i>')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Go')); ?>

<!--End Form -->
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'inquiry-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->reportsearch(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'inquiry_id',
            'value' => '$data->inquiry_id',
            'footer' => "Total Job: " . count($model->reportsearch()->getData()),
        ),
        array(
            'header' => 'Client',
            'name' => 'ClientName',
            'value' => '$data->client->title." ".$data->client->client_name',        
        ),
        array(
            'name' => 'UserName',
            'value' => array($model, 'renderResource')
        ),
        array(
            'name' => 'service_type',
            'value' => array($model, 'renderServicetype')
        ),
        array(
                  'name'=>'job_detail',  
                  'value'=>array($model,'renderJob'),
                  'filter'=>false
             ),
        array(
            'name' => 'status',
            'value' => array($model, 'renderStatus')
        ),
        array(
            'name' => 'Date_Time',
            'value' => array($model, 'renderDatetime')
        ),
         array(
                      'name'=>'appointment_date',
                      'value'=>'$data->appointment_date?Yii::app()->dateFormatter->format("dd-MM-y  HH:mm:ss",strtotime($data->appointment_date)):NULL',
              ),
        array(
                    'header'=>'DutyOfficer',
                    'name'=>'DoName',
                    'value'=>'$data->do->username'
                ),
    ),
));
 $this->endWidget();
echo CHtml::link('Download CSV', $url, array('class' => 'btn btn-primary'));
?>

<script>
    $(document).ready(function() {
        $("#chart").hide();
        //$("#chart").parent('.main').find('.main').hide();
        $('#date_range').daterangepicker();

    });
</script>