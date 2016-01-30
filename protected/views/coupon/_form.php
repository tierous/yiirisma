
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coupon-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'coupon_code'); ?>
		<?php echo $form->textField($model,'coupon_code',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'coupon_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coupon_discount'); ?>
		<?php echo $form->textField($model,'coupon_discount'); ?>
		<?php echo $form->error($model,'coupon_discount'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'coupon_status'); ?>
		<?php echo $form->dropDownList($model,'coupon_status',
			array('0'=>'off','1'=>'on'),
			array('empty'=>'--status--')); ?>
		<?php echo $form->error($model,'coupon_status'); ?>
	</div>        

	<div class="row">
		<?php echo $form->labelEx($model,'coupon_date_expire'); ?>
		<?php echo $form->dateField($model,'coupon_date_expire'); ?>
		<?php echo $form->error($model,'coupon_date_expire'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->