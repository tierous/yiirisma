<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'customer_name'); ?>
		<?php echo $form->textField($model,'customer_name',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_dob'); ?>
		<?php echo $form->textField($model,'customer_dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_gender'); ?>
		<?php echo $form->textField($model,'customer_gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_telephone'); ?>
		<?php echo $form->textField($model,'customer_telephone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_email'); ?>
		<?php echo $form->textField($model,'customer_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->