<script>
 
    jQuery(document).ready(function () {
	setTimeout( "jQuery('.alert').hide();",3000 );
});
 
</script>
<?php
/* @var $this DutyOfficersController */
/* @var $model DutyOfficers */
$this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
    )); 
$this->breadcrumbs=array(
	'Duty Officers'=>array('index'),
	$model->do_id,
);

$this->menu=array(
	array('label'=>'List DutyOfficers', 'url'=>array('index')),
	array('label'=>'Create DutyOfficers', 'url'=>array('create')),
	array('label'=>'Update DutyOfficers', 'url'=>array('update', 'id'=>$model->do_id)),
	array('label'=>'Delete DutyOfficers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->do_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DutyOfficers', 'url'=>array('admin')),
);
?>

<h1>View Duty Officer<?php echo $model->do_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'do_id',
		'username',
		'password',
		'email',
		'rights',
	),
)); ?>
