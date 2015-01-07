<h1>View Driver/Handyman : <?php echo ucwords($model->user_name); ?></h1>
<?php

if(isset($inquiry_model))
{

 $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'inquiry-grid',
        'type'=>'striped bordered condensed',
	'dataProvider'=>$inquiry_model->inquirysearch(),
        //'filter'=>'false', 
	'columns'=>array(
		
                'inquiry_id',
                array(
                    //'header'=>'Client',
                    'name'=>'ClientName',
                    'value'=>'$data->inquiry->client->title." ".$data->inquiry->client->client_name'
                ),
		 
                array(
                      'name'=>'inquiry.job_detail',  
                      'value'=>'$data->inquiry->job_detail'
                ),
                array(
                      'name'=>'Status',  
                      'value'=>array($model,'renderStatus'),
                      
                ),
                array(
                    'name'=>'date_time',
                    'value'=>'$data->date_time'
                 ))
    )); 
}
exit;
?>