<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->layout="temp";
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'client-detail-grid',
        'type'=>'striped bordered condensed',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
                    
                    'name'=>'availability_id',
                    'value'=>'CHtml::radioButton("user_id[]",null,array("value"=>$data->availability_id,"class"=>"avail_select","id"=>"aid_".$data->availability_id))',
                    'type'=>'raw',
                    //'htmlOptions'=>array('width'=>5),
                    //'visible'=>false,
                    ),
                
                array(
                    //'header'=>'Name',
                    'name'=>'name',
                    'value'=>'ucwords($data->user->title.\' \'.$data->user->user_name)',   
                ),
                    
		'available_date',
                'from_time',
                'to_time',
                'user.location', 
                       
		array(
		     'class'=>'bootstrap.widgets.TbButtonColumn',
                     'template' => '', 
                     ),
	),
)); ?>

<?php