<?php
/* @var $this ProductOptionValueToProductOptionController */
/* @var $model ProductOptionValueToProductOption */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'product_option_value_to_product_option_id'); ?>
		<?php echo $form->textField($model,'product_option_value_to_product_option_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_option_id'); ?>
		<?php echo $form->textField($model,'product_option_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_option_value_id'); ?>
		<?php echo $form->textField($model,'product_option_value_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->