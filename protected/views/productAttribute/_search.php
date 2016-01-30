<?php
/* @var $this ProductAttributeController */
/* @var $model ProductAttribute */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'product_attribute_id'); ?>
		<?php echo $form->textField($model,'product_attribute_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_id'); ?>
		<?php echo $form->textField($model,'product_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_option_id'); ?>
		<?php echo $form->textField($model,'product_option_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'option_value_id'); ?>
		<?php echo $form->textField($model,'option_value_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'option_value_price'); ?>
		<?php echo $form->textField($model,'option_value_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->