<?php
$this->breadcrumbs = array(
    'Jobs' => array('admin'),
    'Create'
);
$this->menu = array(
    array('label' => 'Manage Job Roles', 'url' => array('admin')),
);
?>
<h1>Create Job</h1>
<?php $this->renderPartial('_form', array('model' => $model)); 