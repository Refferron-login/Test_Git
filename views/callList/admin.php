<?php
/* @var $this CallListController */
/* @var $model CallList */

$this->breadcrumbs=array(
	'Call Lists'=>array('admin'),
	'Manage',
);

/* @var $this CallListController */
/* @var $model CallList */
/* @var $form CActiveForm */


?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl("CallList/saveAll"),
	'method'=>'POST',
        'htmlOptions'=>array('class'=>'call-form'),
)); 

?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'call-list-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
            
             array(
                         'name'=>'call_list_id',
                         'type'=>'raw',
                         'header'=>'',
                         'value'=>'CHtml::hiddenField("call_id[]","$data->call_list_id",array("id"=>"call_list_id","name"=>"call_list_id[]"))',       //'visible'=>false 
              ),
            
            array(
                'name'=>'today_date',
                'value'=>'Yii::app()->dateFormatter->format("dd-MM-y",strtotime($data->today_date))',
            ),            
             array(
                         'name'=>'job_date',
                         'type'=>'raw',
                         'value'=>'CHtml::textField("job_date[]",Yii::app()->dateFormatter->format("dd-MM-y",strtotime($data->job_date)),array("id"=>"job_date","name"=>"job_date[]","class"=>"job_date"))',  
                        

                       
                   ),     
             array(
                   'name'=>'user_id',
                   'type'=>'raw',
                   'value' => 'ucwords($data->user_id)',
               ),
             array(
                'name'=>'user_id',
                'header'=>'User',
                'type'=>'raw',
                 'value' => 'ucwords($data->user->title.\' \'.$data->user->user_name)',
                 
              ),
             
             array(
                'name'=>'a',
                'type'=>'raw',
                'value' => 'CHtml::checkBox("a_$data->call_list_id", $data->a)',
              ),
              array(
                'name'=>'n_a',
                'type'=>'raw',
                'value' => 'CHtml::checkBox("n_a_$data->call_list_id", $data->n_a)',
              ),
             array(
                 
                'name'=>'n_r',
                'type'=>'raw',
                'value' => 'CHtml::checkBox("n_r_$data->call_list_id", $data->n_r)',
              ),
             array(
                'name'=>'ans',
                'type'=>'raw',
                'value' => 'CHtml::checkBox("ans_$data->call_list_id", $data->ans)',
              ),	
            array(
                 'name'=>'client_id',
                 'type'=>'raw',
                 'value'=>array($model,'clientList'),
            ),
		
		
	),
     'afterAjaxUpdate' => "
            function(id, data) {
                $('.job_date').each(function(i) {
                        this.id = 'datepicker' + i;
                    }).datepicker({dateFormat:'dd-mm-yy','changeYear':true,'changeMonth': true,});
               
              }",
    
));?>
    
<div class="row buttons">
		<?php echo CHtml::submitButton('Save',array("class"=>"btn btn-primary")); 
                
                echo CHtml::link('Archive',$this->createAbsoluteUrl("CallList/archive"),array('class'=>'btn btn-success archived','confirm'=>"Are you sure want archived call log?")); ?>
</div>
</div>
<?php $this->endWidget(); 
 Yii::app()->clientscript
		
                ->registerCssFile( Yii::app()->theme->baseUrl . '/css/jquery-ui.css' )
		
               ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/jquery-ui.min.js', CClientScript::POS_END )
?>


<script>
$(document).ready(function() {
       
        $('.job_date').each(function(i) {
            this.id = 'datepicker' + i;
        }).datepicker({dateFormat:'dd-mm-yy','changeYear':true,'changeMonth': true,});
        
           
 });
</script>


 
