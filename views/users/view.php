<script>
    jQuery(document).ready(function() {
        setTimeout("jQuery('.alert').hide();", 3000);
    });
</script>
<?php

$this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true, 
    'fade' => true,
    'closeText' => '&times;', 
    'alerts' => array(// configurations per alert type
        'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;')
    )
));
$this->breadcrumbs = array(
    'Driver/Handyman' => array('admin'),
    $model->user_name
);
$this->menu = array(
    array('label' => 'Create Driver/Handyman', 'url' => array('create')),
    array('label' => 'Update Driver/Handyman', 'url' => array('update', 'id' => $model->user_id)),
    array('label' => 'Delete Driver/Handyman', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->user_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Driver/Handyman', 'url' => array('admin'))
);
?>
<h1>View Driver/Handyman : <?php echo ucwords($model->user_name); ?></h1>
<?php
if ($model->usertype == 1) {
    $usertype = "Driver";
} else if($model->usertype == 2){
    $usertype = "Handyman";
}
 else {
     $usertype = "Volunteer";
}

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        
        array(
            'name'=>'user_name',
            'value'=>$model->title." ".$model->user_name
        ),
        'family_name',
        'phno',
        'home_phno',
        'email',
        'state',
        //'city',
        'country',
        'location',
        'address',
        'post_code',
        'note',
        'car_model',
        'car_make',
        
        array(
            'name' => 'User Type',
            'value' => $model->usertype0->title
        ),
        'note'
    )
));
if(isset($inquiry_model))
{

$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'inquiry-grid',
        'type'=>'striped bordered condensed',
	'dataProvider'=>$inquiry_model->inquirysearch(),
        'filter'=>$inquiry_model, 
	'columns'=>array(
		
               array(
                     'name'=>'inquiry_id',
                     'value' => 'CHtml::link($data->inquiry_id,Yii::app()->createUrl("inquiry/updatestatus",array("id"=>$data->inquiry_id)))',
                     'type'  => 'raw'
                     
                  ),
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


