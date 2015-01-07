<?php
/* @var $this LocationMasterController */
/* @var $model LocationMaster */

$this->breadcrumbs=array(
	'Location'=>array('admin'),
	'Manage',
);

$this->menu=array(
	
    array('label'=>'Create Location', 'url'=>array('create')),
);


?>

<h1>Manage Location</h1>
<?php
 $this->widget('ext.groupgridview.BootGroupGridView', array(
      'id' => 'grid1',
      'dataProvider' => $model->search(),
     'filter'=>$model,
      //'mergeColumns' => array('parent.location'), 
      //'extraRowColumns' => array('parent_id','locationMasters.parent_id'),
      //'extraRowExpression' => '"<b style=\"font-size: 1.5em;\">".$data->parent->location."</b>"',
      'columns' => array(
          'location',
          'address',
          'post_code',
          array(
		 'class'=>'bootstrap.widgets.TbButtonColumn',
                 'template'=>'{update} {delete}',
                 'header'=>'action'
                ),
      ),
    ));
?>
