<?php
$this->breadcrumbs = array(
    'Driver/Handyman' => array('admin'),
    'Manage'
);
$this->menu = array(
    array('label' => 'Create Driver/Handyman', 'url' => array('create')),
    array('label' => 'Add Time Schedule', 'url' => array('userAvailability/create')),
    array('label' => 'View Time Schedule', 'url' => array('userAvailability/admin'))
);
$url = $this->createAbsoluteUrl('users/deletemultiple');
Yii::app()->clientScript->registerScript('search', "
$('#del').click(function(){
    var idList = $('input[type=checkbox]:checked').serialize();   
    if(idList)
    {
        if(confirm('Are you sure want to delete?'))
        {   var url='$url';
            $.post(url,idList,function(response)
            { 
              $.fn.yiiGridView.update('users-grid');
              
            });            
        }
    }
 });      
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Manage Driver/Handyman</h1>
<?php
$url = $this->createAbsoluteUrl("Users/Usercsv");
$makeModels = HandymanJobAllocation::model()->findAll();
$data1 = CHtml::listData($makeModels, 'user_id', 'user_id');
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'users-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
            'selectableRows' => 2,
            'value' => '$data["user_id"]',
            'checkBoxHtmlOptions' => array('name' => 'idList[]'),
            'disabled' => array($model, 'checkvisible'),
            'id'=>'ids'
        ),
        array(
            'header' => 'Name',
            'name' => 'user_name',
            'value' => 'ucwords($data->title.\' \'.$data->user_name)'
        ),
        'phno',
        'home_phno',
        'email',
        array(
            'header' => 'Job',
            'name' => 'usertype',
            'value' => '$data->usertype0->title'
        ),
        'state',
        //'city',
        'country',
        'location',
        'post_code',
        
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'buttons' => array
                (
                'delete' => array
                    (
                    'visible' => '!$data->handymanJobAllocations && !$data->driverJobAllocations',
                ),
            ),'header'=>'action')),
             'afterAjaxUpdate' => "
            function(id, data) {
            if($('.grid-view table td').hasClass('empty'))
            {
                $('#del').hide();
            }
            else
            {
                    $('#del').show();
            }
                
            }"
));
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Delete',
    'type' => 'danger', 
    'htmlOptions' => array('id' => 'del')
));
echo "&nbsp;&nbsp;&nbsp;&nbsp;".CHtml::link('Download CSV',$url,array('class'=>'btn btn-primary'));