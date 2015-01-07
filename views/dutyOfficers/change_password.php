<script>
$(document).ready(function (){
   $('#DutyOfficers_confirmold').val('');
    setTimeout( "jQuery('.alert').hide();",3000 );

});</script>
<?php 
$this->layout="//layouts/column1";
?>
<h1>Change Password</h1>
<?php
/* @var $this DutyOfficersController */
/* @var $model DutyOfficers */
/* @var $form CActiveForm */
$this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
    )); 
$this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
    )); 
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'htmlOptions'=>array('class'=>'well'),
    'id'=>'duty-officers-form',
    'type'=>'horizontal',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    
));
 $id=Yii::app()->user->getId();
$value=DutyOfficers::model()->findAllByAttributes(array('username'=>$id));
?>

	

	<?php //echo $form->errorSummary($model); ?>
        <div class="control-group">
		<?php //echo $form->labelEx($model,'oldpassword'); ?>
            <div class="controls">
		<?php echo $form->hiddenField($model,'oldpassword',array('value'=>$value[0]->password)); ?>
		<?php echo $form->error($model,'oldpassword'); ?>
                </div>
	</div>
        <div class="control-group">
		<?php echo $form->labelEx($model,'confirmold'); ?>
              <div class="controls">
		<?php echo $form->passwordField($model,'confirmold',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'confirmold'); ?>
              </div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'password'); ?>
              <div class="controls">
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
              </div>
	</div>
        <div class="control-group">
		<?php echo $form->labelEx($model,'confirmpassword'); ?>
              <div class="controls">
		<?php echo $form->passwordField($model,'confirmpassword',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'confirmpassword'); ?>
              </div>
	</div>

	
	<div class="control-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Change' : 'Change',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->