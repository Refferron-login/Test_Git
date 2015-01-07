<?php
/* @var $this SettingsController */
$this->breadcrumbs=array(
	'Settings'
);
$this->widget('zii.widgets.jui.CJuiAccordion',array(
	    'panels'=>array(
	       
	        'Add User'=>$this->renderPartial("_form",array('model'=>$obj_DO),true),
                'Display/Edit User'=>$this->renderPartial("DO_list",array('DO_dataprovider'=>$DO_dataprovider,'obj_DO'=>$obj_DO),true),
	        // panel 3 contains the content rendered by a partial view
  //              'Change Password'=>$this->redirect(array("DutyOfficers/changePassword")),
              
	        'Mileage Setting'=>$this->renderPartial('mileage_setting',array('obj_mileage'=>$obj_mileage,'data'=>$data),true),           
	    ),
	    // additional javascript options for the accordion plugin
	    'options'=>array(
	        'animated'=>'bounceslide',
	        'style'=>array('minHeight'=>'100'),	    ),
	     
	));

$change_pass_url=$this->createAbsoluteUrl("DutyOfficers/changePassword");
$location_url=$this->createAbsoluteUrl("locationMaster/admin");
$job_url=$this->createAbsoluteUrl("jobs/admin");
?>

<div id="yw1" class="acoordion_header ui-accordion ui-widget ui-helper-reset" role="tablist">
<a href=<?php echo $change_pass_url?>><h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-yw1-header-1" aria-controls="ui-accordion-yw1-panel-1" aria-selected="false" tabindex="-1">Change Password</h3></a>
<a href=<?php echo $location_url?>><h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-yw1-header-1" aria-controls="ui-accordion-yw1-panel-1" aria-selected="false" tabindex="-1">Add Location</h3></a>
<a href=<?php echo $job_url?>><h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-yw1-header-1" aria-controls="ui-accordion-yw1-panel-1" aria-selected="false" tabindex="-1">Change Sevice Type</h3></a>
</div>