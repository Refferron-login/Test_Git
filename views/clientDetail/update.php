<?php
/* @var $this ClientDetailController */
/* @var $model ClientDetail */
$this->breadcrumbs=array(
	'Client Detail'=>array('admin'),
	'Update'
);
$this->menu=array(
	//array('label'=>'List Client', 'url'=>array('index')),
	//array('label'=>'Create Client', 'url'=>array('create')),
	array('label'=>'View Client', 'url'=>array('view', 'id'=>$obj_client->client_id)),
	array('label'=>'Manage Client', 'url'=>array('admin')),
);
?>
<h1>Update Client : <?php echo ucwords($obj_client->client_name); ?></h1>
<?php $this->renderPartial('_updateform', array('obj_client'=>$obj_client)); ?>