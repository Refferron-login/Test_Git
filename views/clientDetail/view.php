<script>
    jQuery(document).ready(function() {
        setTimeout("jQuery('.alert').hide();", 3000);
    });
</script>
<?php
$this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true, 
    'fade' => true, 
    'closeText' => '&times;', 
    'alerts' => array('success' => array('block' => true, 'fade' => true, 'closeText' => '&times;'))
));
$this->breadcrumbs = array(
    'Client Detail' => array('admin'),
    $model->client_name
);
$this->menu = array(    
    array('label' => 'Update Client', 'url' => array('update', 'id' => $model->client_id)),
    array('label' => 'Delete Client', 'url' => '#',
          'linkOptions' => array('submit' => array('delete', 'id' => $model->client_id),
          'confirm' => "Warning : If you delete any Client ,you will loose all the records regarding selected Client.")     ),
    array('label' => 'Manage Client', 'url' => array('admin'))
);
?>
<h1>View Client Detail : <?php echo ucwords($model->client_name); ?></h1>
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name'=>'client_name',
            'value'=>$model->title." ".$model->client_name
        ),
        'family_name',
        //'fname',
        //'lname',
        'phno',
        'home_phno',
        'state',
        'country',
        'town',
        'address',
        'post_code',
        'email',
        //'DOB',
         array(
            'name'=>'DOB',
            'oneRow'=>true,
            'type'=>'raw',
            'value'=>$model->DOB?Yii::app()->dateFormatter->format("dd-MM-y",strtotime($model->DOB)):NULL
                           
        ),
        'next_of_kin_name',
        'next_of_kin_contact',
        'next_of_kin_home_phno',
        'relationship',
    )
));

