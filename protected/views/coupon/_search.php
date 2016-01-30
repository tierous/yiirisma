<?php
/* @var $this CouponController */
/* @var $model Coupon */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'coupon_id'); ?>
		<?php echo $form->textField($model,'coupon_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coupon_code'); ?>
		<?php echo $form->textField($model,'coupon_code',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coupon_discount'); ?>
		<?php echo $form->textField($model,'coupon_discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coupon_status'); ?>
		<?php echo $form->textField($model,'coupon_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coupon_date_expire'); ?>
		<?php echo $form->textField($model,'coupon_date_expire'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coupon_used'); ?>
		<?php echo $form->textField($model,'coupon_used'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->