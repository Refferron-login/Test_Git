<h3>Total donation received</h3>
<?php
$this->layout='temp';
$url=$this->createAbsoluteUrl("Report/totaldonationcsv");
Yii::app()->clientScript->registerScript('search', "
$('#extended-filters').submit(function(){
    $('#donation').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'extended-filters',
    'type'=>'search',
    'htmlOptions'=>array('class'=>'well'),
)); 
echo $form->textFieldRow($model, 'start_date', array('id'=>'date_range','readonly'=>true, 'prepend'=>'<i class=""><img src="themes/blackboot/css/css/calendar.png" /></i>'));
$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Go'));


$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'donation',
        'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
        'filter' => $model,	
	'columns'=>array(
		
                'inquiry_id',
                array(
                  
                  'name'=>'client',
                  'value'=>'ucwords($data->inquiry->client->title.\' \'.$data->inquiry->client->client_name)'    
                ),
                array(
                  
                  'name'=>'service',
                  'value'=>  '$data->user->usertype0->title'
                    
                ),
                 array
               (
                  
                   'name'=>'resource',
                   'value'=>'ucwords($data->user->title.\' \'.$data->user->user_name)'   
                ),
                array(
                    'name'=>'Date_Time',
                    'value'=>array($model,'renderDatetime')                     
                 ), 
                 array(
                  'header'=>'Donation',
                  'name'=>'amount',
                  'value'=>  '$data->amount',
                  'footer'=>"Total: ".$model->getTotals($model->search()->getData())
                ) 
	)
)); 
$this->endWidget();
echo CHtml::link('Download CSV',$url,array('id'=>'download','class'=>'btn btn-primary'));
?>
<script>
    $(document).ready(function(){
       $("#chart").hide();
       $('#date_range').daterangepicker();
    });
</script>