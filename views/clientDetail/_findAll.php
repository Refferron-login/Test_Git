<?php
$this->layout = 'temp';
Yii::app()->clientScript->registerScript('search', "
$('#form_viewall').submit(function(){
$('#txt_viewall').val('1');    
$('#find-all-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>
<h3>List of All <?php echo $service?></h3>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'find-all-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
                        array(
                            'header' => '',
                            'value' => 'CHtml::radioButton("user_id[]",null,array("value"=>$data->user_id,"class"=>"avail_select","id"=>"aid_".$data->user_id))',
                            'type' => 'raw'
                        ),
                        array(
                                'header' => 'Name',
                                'name' => 'user_name',
                                'value' => 'ucwords($data->title.\' \'.$data->user_name)'
                        ),
                        'phno',
                        'home_phno',
                        'email',
                        'location',
                        'post_code',
                         array(
                                    'class' => 'bootstrap.widgets.TbButtonColumn',
                                    'template'=>'{detail}',
                                    'buttons'=>array(
                                    'detail'=>array(
                                            'label'=>'Show Details', 
                                            'url'  =>'Yii::app()->createUrl("users/view",array("id"=>$data->user_id))',
                                            'options'=>array('title'=>'Show Details','class'=>'detailsLink','target'=>'_blank'),
                                            
                                           
                                        
                                   )) 
                            ),
        ),
    'afterAjaxUpdate' => "
            function(id, data) {
                $('#viewall_dialog').find('.avail_select').click(function(){
                        $('#aval_all_val').val($(this).val());
                        $('#aval_val').val(0);
                        $('#avail_rcrd').html($(this).parent().parent().html());
                        $('#avail_rcrd').find('.avail_select').hide();
                        $('#result').show();
                        $('#confirm').removeAttr('disabled', 'true');
                       
                });
               
                
              }")
    );

  $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'joballocated_dialog',
            'options' => array(
                                'title' => Yii::t('job', 'Allocated Job'),
                                'autoOpen' => false,
                                'modal' => 'true',
                                'width' => '60%',
                                'height' => 'auto',
                                'buttons' => array('Ok' => 'js:function(){ $(this).dialog("close");}'),
                              ),
        ));
  
?>
 <div id='div_allocated_job'></div>
 <?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>  

</div>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
 
$(document).ready(function(){
     if($('#find-all-grid table td').hasClass('empty'))
     {
           $('#viewall').show();
     }
     else
     {
            $('#viewall').hide();
     }
    /*$(".detailsLink").click(function(){
        $("#joballocated_dialog").dialog("open"); 
        
        var url=$(this).attr("href");
          $.ajax({
                      url:url,
                      //data:{},                                           
                      type:"POST",
                      
                      success: function(data)
                               { 
                                  $("#div_allocated_job").html(data);
                               }
               });
          return false;
      
      });*/
     
   
});
</script>
