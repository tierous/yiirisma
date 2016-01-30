<?php
/* @var $this CouponController */
/* @var $data Coupon */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('coupon_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->coupon_id), array('view', 'id'=>$data->coupon_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coupon_code')); ?>:</b>
	<?php echo CHtml::encode($data->coupon_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coupon_discount')); ?>:</b>
	<?php echo CHtml::encode($data->coupon_discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coupon_status')); ?>:</b>
	<?php echo CHtml::encode($data->coupon_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coupon_date_expire')); ?>:</b>
	<?php echo CHtml::encode($data->coupon_date_expire); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('coupon_used')); ?>:</b>
	<?php echo CHtml::encode($data->coupon_used); ?>
	<br />

	*/ ?>

</div>