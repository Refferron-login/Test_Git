<?php 
$this->layout="//layouts/column1";
?>
<?php
$this->breadcrumbs = array(
    'Client Detail' => array('admin'),
    'Manage'
);
$url = $this->createAbsoluteUrl('clientDetail/deletemultiple');
Yii::app()->clientScript->registerScript('search', "
    $('#del').click(function(){
    var idList    = $('input[type=checkbox]:checked').serialize();   
    if(idList)
    {   if(confirm('Are you sure want to delete?'))
        {   var url='$url';
            $.post(url,idList,function(response)
            { 
              $.fn.yiiGridView.update('client-detail-grid');
              
            });            
        }
    }
 });  
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#client-detail-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});

");
?>
<h1>Manage Clients</h1>
<div class="search-form" style="display:none">
    <?php /* $this->renderPartial('_search',array(
      'model'=>$model,
      )); */ ?>
</div><!-- search-form -->
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'client-detail-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
                        array(
                            'class' => 'CCheckBoxColumn',
                            'selectableRows' => 2,
                            'value' => '$data["client_id"]',
                            'checkBoxHtmlOptions' => array('name' => 'idList[]')
                        ),
                        array(
                            'header' => 'Name',
                            'name' => 'client_name',
                            'value' => 'ucwords($data->title.\' \'.$data->client_name)'
                        ),
                        'phno',
                        'home_phno',
                        'email',
                        'country',
                        //'state',
                        //'city',
                        'address',  
                        'post_code',
                        //'DOB',
                        array(
                            
                            'name' => 'DOB',
                            'value'=>'$data->DOB?Yii::app()->dateFormatter->format("dd-MM-y",strtotime($data->DOB)):NULL'
                        ),
                        'next_of_kin_name',
                       
                        array(
                            
                            'name' => 'next_of_kin_contact',
                            'value'=>'$data->next_of_kin_contact!=0?$data->next_of_kin_contact:""'
                        ),
                        
                        array(
                            'class' => 'bootstrap.widgets.TbButtonColumn',
                            'buttons' => array('delete' => array(
                                                                'options' => array(
                                                                                'confirm' => "Warning : If you delete any Client ,you will loose all the records regarding selected Client. "
                                                                              )
                                                            )
                                           ),
                            'header'=>'action',
                        )
                ),
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
?>