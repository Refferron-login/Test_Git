<script>
    jQuery(document).ready(function() {
        setTimeout("jQuery('.alert').hide();", 3000);
    });
</script>
<?php
$this->layout="//layouts/column1";
$this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true, 
    'fade' => true, 
    'closeText' => 'close',
    'alerts' => array(// configurations per alert type
        'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;')
    )
));
$this->breadcrumbs = array(
    'Job Roles' => array('admin'),
    'Manage'
);
$url = $this->createAbsoluteUrl('jobs/deletemultiple');
Yii::app()->clientScript->registerScript('search', "
$('#del').click(function(){
    var idList    = $('input[type=checkbox]:checked').serialize();
    var sel=$('#jobs-grid').yiiGridView('getSelection');
    //alert(sel.length);
    if(idList)
    {   
        if(confirm('Warning : If you delete any Job ,you will loose all the records regarding selected job.?'))
        {
            if(confirm('Are you sure want to delete?'))
            {   var url='$url';
                $.post(url,idList,function(response)
                { 
                  $.fn.yiiGridView.update('jobs-grid');

                });
            }
         }
    }
 });  
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jobs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Manage Job Roles</h1>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'jobs-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'enableHistory' => false,
    'columns' => array(
                        'title',
                        array(
                            'class' => 'bootstrap.widgets.TbButtonColumn',
                            'template' => '{update}',
                            'header'=>'action'
                            
                              )
                   ),
   
));
