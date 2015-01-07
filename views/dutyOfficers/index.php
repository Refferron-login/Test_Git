<?php
$this->breadcrumbs = array(
    'Duty Officers',
);
$this->menu = array(
    //array('label'=>'Create DutyOfficers', 'url'=>array('create')),
    //array('label'=>'Manage DutyOfficers', 'url'=>array('admin')),
    //array('label' => 'Enquiry', 'url' => array('clientDetail/create')),
    array('label' => 'Driver/Handyman', 'url' => array("users/admin")),
    //array('label'=>'Time Management', 'url'=>array("userAvailability/admin")),
   // array('label' => 'Manage Job Roles', 'url' => array("jobs/admin")),
    array('label' => 'Contacts', 'url' => array("clientDetail/admin")),
    array('label' => 'Reports', 'url' => array("report/index")),
    array('label' => 'Settings', 'url' => array("settings/index")),
);
?>
<?php
$url = $this->createAbsoluteUrl("DutyOfficers/Docsv");
/*$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'duty-officers-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'username',
        'email',
        array(
            'name' => 'rights',
            //call the method 'renderAddress' from the model
            //'value'=>'$data->rights', 
            'value' => array($model, 'renderRights')
        )
    )
));
echo CHtml::link('Download CSV',$url,array('class'=>'btn btn-primary'));*/
 $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Enquiry'),
        array('label'=>'New Enquiry', 'url'=>array('clientDetail/create'),'icon'=>'pencil'),
        array('label'=>'Unfullfilled Enquiries', 'url'=>array('inquiry/admin','status'=>2),'icon'=>'pencil'),
        array('label'=>'Completed Enquiries', 'icon'=>'cog', 'url'=>array('inquiry/admin','status'=>1),'icon'=>'pencil'),
        array('label'=>'Completed Outstanding Info', 'url'=>array('inquiry/admin','status'=>0),'icon'=>'pencil'),
        
    ),
)); ?>
