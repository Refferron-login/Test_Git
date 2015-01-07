<?php
$this->layout="loginlayout";
$this->pageTitle=Yii::app()->name . ' - Login';
?>
<h1>Login</h1>
<p>Please fill out the following form with your login credentials:</p>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
     'htmlOptions'=>array('class'=>'well')
)); 

echo $form->textFieldRow($model, 'username', array('class'=>'span3')); 
echo $form->passwordFieldRow($model, 'password', array('class'=>'span3'));
echo $form->checkboxRow($model,'rememberMe'); 
$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login','type'=>'primary'));
$this->endWidget(); ?>