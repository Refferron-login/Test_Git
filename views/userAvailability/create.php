<?php
/* @var $this UserAvailabilityController */
/* @var $model UserAvailability */
$this->breadcrumbs=array(
	'Time Management'=>array('admin'),
	'Create'
);
$this->menu=array(	
	array('label'=>'Create Driver/Handyman', 'url'=>array('users/create')),
        array('label'=>'Add Time Schedule', 'url'=>array('userAvailability/create')),
        array('label'=>'View Time Schedule', 'url'=>array('userAvailability/admin')),
);
?>
<h1>Add Time</h1>
<?php $this->renderPartial('_form', array('model'=>$model,'serviceman_list'=>$serviceman_list,'job_list'=>$job_list,'obj_job'=>$obj_job));