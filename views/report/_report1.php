<script>
    $(document).ready(function(){     
       $("#chart").hide();
    });
</script>
<h3>Number of unique client registered</h3>
<?php
$url = $this->createAbsoluteUrl("Report/uniqueclientcsv");
$this->layout='temp';
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'client-detail-grid',
     'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                    array(
                        'header'=>'Name',
                        'name'=>'client_name',
                        'value'=>'ucwords($data->title.\' \'.$data->client_name)',   

                      ),
                   'family_name',  
                   'phno',
                   'home_phno',
                   'email',
                   'address',
                   'post_code'
            )
)); 
echo CHtml::link('Download CSV',$url,array('class'=>'btn btn-primary'));