<?php
$this->breadcrumbs = array(
    'Duty Officers' => array('index'),
    'Update'
);
$this->menu = array(
    array('label' => 'List DutyOfficers', 'url' => array('index')),
    array('label' => 'Create DutyOfficers', 'url' => array('create')),
    array('label' => 'View DutyOfficers', 'url' => array('view', 'id' => $model->do_id)),
    array('label' => 'Manage DutyOfficers', 'url' => array('admin'))
);
?>
<h1>Update DutyOfficers : <?php echo ucwords($model->username); ?></h1>
<?php $this->renderPartial('_form', array('model' => $model));