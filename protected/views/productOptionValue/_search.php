<?php
/* @var $this ProductOptionValueController */
/* @var $model ProductOptionValue */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'product_option_value_id'); ?>
		<?php echo $form->textField($model,'product_option_value_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_option_value_name'); ?>
		<?php echo $form->textField($model,'product_option_value_name',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->