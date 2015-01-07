<script>
    $(document).ready(function() {
           $("#chart").hide();
    });
</script>
<?php
/* @var $this ReportController */
$this->breadcrumbs = array(
    'Report'
);
?>
<div class="row">
    <br><br>
    <?php 
    $reports = array('r1' => 'Unique client', 'r2' => 'Monthwise booked jobs', 'r3' => 'Total donation received', 'r4' => 'Total Mileage Claim');
    echo CHtml::dropDownList('id', '', $reports, array(
            'prompt' => 'Select Report',
            'ajax' => array(
                'type' => 'POST',
                'url' => Yii::app()->createUrl('report/reports'),
                'update' => '#result',
                'data' => array('id' => 'js:this.value')
          )));
    ?> 
</div>
<div id="result"></div>