<?php
/* @var $this ProductOptionController */
/* @var $model ProductOption */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'product_option_id'); ?>
		<?php echo $form->textField($model,'product_option_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_option_name'); ?>
		<?php echo $form->textField($model,'product_option_name',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->