<?php
$this->breadcrumbs=array(
	'Time Managemant'=>array('admin'),
	'Manage'
);
$this->menu=array(	
	array('label'=>'Create Driver/Handyman', 'url'=>array('users/create')),
        array('label'=>'Add Time Schedule', 'url'=>array('userAvailability/create')),
        array('label'=>'View Time Schedule', 'url'=>array('userAvailability/admin')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-availability-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Time Management</h1>
<?php 
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'user-availability-grid',
         'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'name',
                    'value'=>'ucwords($data->user->title.\' \'.$data->user->user_name)',   
                ),
                array(
                    'name'=>'phno',
                    'value'=>'$data->user->phno',
                ),
                array(
                    'name'=>'home_phno',
                    'value'=>'$data->user->home_phno',
                ),
                array(
                    'name'=>'email',
                    'value'=>'$data->user->email',
                ),
                array(
                    'header'=>'Service Type',
                    'name'=> 'servicetype',
                    'value'=>'$data->user->usertype0->title',
                ),
		array(
                    
                    'name'=> 'available_date',
                    'value'=>'Yii::app()->dateFormatter->format("dd-MM-y ",strtotime($data->available_date))',
                ),
		'from_time',
		'to_time',
                array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                         'template'=>'{update}{delete}', 
                    'header'=>'action'
                     )
	)
)); 