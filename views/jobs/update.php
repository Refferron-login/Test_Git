<?php
$this->layout="//layouts/column1";
$this->breadcrumbs=array(
	'Jobs'=>array('admin'),
	'Update'
);
?>
<h1>Update Job :<?php echo ucwords($model->title); ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model));