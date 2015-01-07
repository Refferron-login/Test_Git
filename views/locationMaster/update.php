<?php
/* @var $this LocationMasterController */
/* @var $model LocationMaster */

$this->breadcrumbs=array(
	'Location'=>array('admin'),
	'Update',
);

$this->menu=array(

	array('label'=>'Create Location', 'url'=>array('create')),
	array('label'=>'Manage Location', 'url'=>array('admin')),
);
?>

<h1>Update Location</h1>

<?php $this->renderPartial('_update', array('model'=>$model)); ?>