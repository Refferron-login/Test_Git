<?php
$this->breadcrumbs=array(
	'Enquiries'=>array('index'),
	$model->inquiry_id=>array('view','id'=>$model->inquiry_id),
	'Update'
);
$this->menu=array(
	array('label'=>'List Enquiry', 'url'=>array('index')),
	array('label'=>'Create Enquiry', 'url'=>array('create')),
	array('label'=>'View Enquiry', 'url'=>array('view', 'id'=>$model->inquiry_id)),
	array('label'=>'Manage Enquiry', 'url'=>array('admin'))
);
?>
<h1>Update Enquiry <?php echo ucwords($model->inquiry_id); ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model));