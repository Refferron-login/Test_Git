<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'duty-officers-grid',
         'type'=>'striped bordered condensed',
        'type'=>'striped bordered condensed',
	'dataProvider'=>$DO_dataprovider,
	'columns'=>array(
		'username',
		'email',
                 array(            
                    'name'=>'rights',
                    'value'=>array($obj_DO,'renderRights'), 
                 ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'htmlOptions'=>array('style'=>'width:50px'),
                        'template'=>'{update}{delete}' ,
                    'header'=>'action'
		)
	)
)); 
