<?php
$this->breadcrumbs = array(
    'Enquiry Detail' =>array('inquiry/admin'),
    'Create'
);
$this->layout="//layouts/column1";
/*$this->menu = array(array('label' => 'List Enquiry', 'url' => array('inquiry/admin')),
                    array('label' => 'Manage Location', 'url' => array('locationMaster/admin')));
*/
?>
<h3>Enquiry Detail</h3>
<?php $this->renderPartial('_form', array('obj_client' => $obj_client, 'obj_inquiry' => $obj_inquiry, 'job_list' => $job_list, 'obj_job' => $obj_job, 'obj_handyman_job' => $obj_handyman_job, 'obj_driver_job' => $obj_driver_job,'location_list'=>$location_list,'do_list'=>$do_list)); ?>