<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div class="erro-page">
  <div id="error404" class="error">
    <div class="block">
      <h1>
        <span>Error 404</span>
      </h1>
      <h2>
        <span>Oops!</span>
      </h2>
      <div id="innerMenu">
        
        <p class="error-massage">
          <?php echo CHtml::encode($message); ?>
        </p>
        <p>Here’s a little map that might help you get back on track:</p>
        <ul>
          <li>
            <?php  $url=$this->createAbsoluteUrl("DutyOfficers/index");?>  
            <a class="home" href=<?php echo $url;?>>
              <span>Go to Home</span>
            </a>
          </li>
          <li>
           <?php  $url=$this->createAbsoluteUrl("clientDetail/create");?>  
           
            <a title="New Enquiry" class="works" href=<?php echo $url;?>>
              <span>Enquiry</span>
            </a>
          </li>
          <li>
             <?php  $url=$this->createAbsoluteUrl("jobs/admin");?>    
            <a title="Job roles" class="services" href=<?php echo $url;?>>
              <span>Job roles</span>
            </a>
          </li>
          <li>
            <?php  $url=$this->createAbsoluteUrl("clientDetail/admin");?>   
            <a title="Client detail" class="about" href=<?php echo $url;?>>
              <span>Contact management</span>
            </a>
          </li>
          <li>
            <?php  $url=$this->createAbsoluteUrl("users/admin");?>   
            <a title="Resource" class="about" href=<?php echo $url;?>>
              <span>Resource</span>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
  </div>
</div>



