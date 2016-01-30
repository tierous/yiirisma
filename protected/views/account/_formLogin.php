<div class="form">
	<?php $form = $this -> beginWidget('CActiveForm', 
		array('id' => 'login-form', 
		'enableClientValidation' => true, 
		'clientOptions' => array(
			'validateOnSubmit' => true, 
		), 
	  )
	); 
	?>
	<div class="row">
		<?php echo $form -> labelEx($model, 'customer_email'); ?>
		<?php echo $form -> textField($model, 'customer_email', array('size'=>'30')); ?>
		<?php echo $form -> error($model, 'customer_email'); ?>
	</div>
	<div class="row">
		<?php echo $form -> labelEx($model, 'customer_password'); ?>
		<?php echo $form -> passwordField($model, 'customer_password', array('size'=>'30')); ?>
		<?php echo $form -> error($model, 'customer_password'); ?>
	</div>
	<div class="row rememberMe">
		<?php echo $form -> checkBox($model, 'rememberMe',array('style'=>'float:left;margin-right:5px;margin-top:-2px;')); ?>
		<?php echo $form -> label($model, 'rememberMe'); ?>
		<?php echo $form -> error($model, 'rememberMe'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>
	<?php $this -> endWidget(); ?>
</div>