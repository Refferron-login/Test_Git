<?php
$this->breadcrumbs = array(
    'Driver/Handyman'
);
$this->menu = array(
    array('label' => 'Create Driver/Handyman', 'url' => array('create')),
    array('label' => 'Manage Driver/Handyman', 'url' => array('admin')),
    array('label' => 'Add Time Schedule', 'url' => array('userAvailability/create')),
    array('label' => 'View Time Schedule', 'url' => array('userAvailability/admin'))
);
?>
<h1>Driver/Handyman List</h1>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view'
));