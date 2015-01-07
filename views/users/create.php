<?php
$this->breadcrumbs = array(
    'Driver/Handyman' => array('admin'),
    'Create'
);
$this->menu = array(    
    array('label' => 'Manage Driver/Handyman', 'url' => array('admin')),
    array('label' => 'Add Time Schedule', 'url' => array('userAvailability/create')),
    array('label' => 'View Time Schedule', 'url' => array('userAvailability/admin')),
);
?>
<h1>Create Driver/Handyman</h1>
<?php $this->renderPartial('_form', array('model' => $model, 'obj_job' => $obj_job, 'job_list' => $job_list));