<script>
    $(document).ready(function(){
       //alert("hii"); 
       $("#chart").hide();
    });
</script>
<?php
$Inquiry= Inquiry::model()->findAll();
                    
                    $monthwise_jobcomplete= array_fill(0, 12, 0);
                   
                    for($i=0;$i<=sizeof($Inquiry)-1;$i++)
                    {
                        $status=$Inquiry[$i]->status;
                        if($status=='1')
                        {
                           if($Inquiry[$i]->service_type==0)
                           {
                              $dt=HandymanJobAllocation::model()->findAllByAttributes(array('inquiry_id'=> $Inquiry[$i]->inquiry_id));
                              $date=$dt[0]->date_time; 
                              if(date("Y",strtotime($date))==date('Y'))
                              {        
                                 $mon=date("m",strtotime($date));
                                 $monthwise_jobcomplete[$mon-1]=$monthwise_jobcomplete[$mon-1]+1;
                              }
                              
                           }
                           else
                           {
                              $dt=DriverJobAllocation::model()->findAllByAttributes(array('inquiry_id'=>  $Inquiry[$i]->inquiry_id));
                            $date=$dt[0]->date_time; 
                             if(date("Y",strtotime($date))==date('Y'))
                             {
                                $mon=date("m",strtotime($date));
                            
                                $monthwise_jobcomplete[$mon-1]=$monthwise_jobcomplete[$mon-1]+1;
                             }  
                           }
                        }
                    
                    }
                     
?>
<?php
/* @var $this ReportController */

$this->breadcrumbs=array(
	'Report',
);
/*$this->menu=array(
	//array('label'=>'Create DutyOfficers', 'url'=>array('create')),
	//array('label'=>'Manage DutyOfficers', 'url'=>array('admin')),
    
    array('label'=>'Unique client Report', 'url'=>array('report/Report1')),
    array('label'=>'Report 2', 'url'=>"#"),
    array('label'=>'Report 3', 'url'=>"#"),
             
);*/

?>
<?php //echo $this->id . '/' . $this->action->id; ?>

<p>
	<!--<select>
      <option value="">Select</option>
      <option value="unique_client">unique_client</option>
      <option value="r2">Report 2</option>
      <option value="r3">Report 3</option>
    </select>-->
            <?php
              
    //echo "Number of Job Completed During Month<br>";
    $month=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    
   $result=array();
    if(isset($monthwise_jobcomplete))
    {   
        foreach ($monthwise_jobcomplete as $key=>$job)
             {
                    //$month[$key]=$job;
                    
                    $result[$month[$key]]=$job;
                    //$result[$month[$key]]=$job;
                    //$result[$month[$key]]=$job;
             }
            //echo $result['Jan'];
    }
   // print_r($result);
            ?>
		 
	    <div class="row">
            <?php //echo CHtml::label("Select Report :", false)
             $reports=array('r1'=>'Unique client','r2'=>'Monthwise completed jobs','r3'=>'Total donation received','r4'=>'Total Mileage Claim');?>
            
                
            <?php echo CHtml::dropDownList('id','',$reports,
                      array(                      
                      'prompt'=>'Select Report',  
                      'ajax' => array(
                      'type'=>'POST', 
                      'url'=>Yii::app()->createUrl('report/reports'), 
                      'update'=>'#result', 
                      'data'=>array('id'=>'js:this.value'),
                      //'success'=>"function(data123) {//alert ($('#id.val'));
                             //    var res = jQuery.parseJSON(data123); 
                             //    $('#result').append(res[4]);
                               //            }",
                          
                    ))); 
                ?>  
                
        </div>
        <div id="result"></div>
        <div id="chart">
            <?php
            echo "<h3>Number of Job Completed During Month</h3>";
             $url=$this->createAbsoluteUrl("Report/monthlyjobcsv");
            echo CHtml::link('Download CSV',$url);
           $this->widget('ext.Hzl.google.HzlVisualizationChart', array('visualization' => 'PieChart',
               
            'data' => array(
                array('Months', 'Jobs Completed'),
                array('Jan', $result['Jan']),
                array('Feb', $result['Feb']),
                array('Mar', $result['Mar']),
                array('Apr', $result['Apr']),
                array('May', $result['May']),
                array('Jun', $result['Jun']),
                array('Jul', $result['Jul']),
                array('Aug', $result['Aug']),
                array('Sept',$result['Sep']),
                array('Oct', $result['Oct']),
                array('Nov', $result['Nov']),
                array('Dec', $result['Dec']) 
               
            ),
            'options' => array('title' => '')));
          

 ?>
     </div> 
 
 
 
