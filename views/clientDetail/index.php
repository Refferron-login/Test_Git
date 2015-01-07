<?php
/* @var $this ClientDetailController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs=array(
	'Client Details'
);
$this->menu=array(
	array('label'=>'Manage ClientDetail', 'url'=>array('admin'))
);
?>
<h1>Client Details</h1>
<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view'
)); 
?>
