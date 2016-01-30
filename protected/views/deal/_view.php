<?php
/* @var $this DealController */
/* @var $data Deal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->deal_id), array('view', 'id'=>$data->deal_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_price')); ?>:</b>
	<?php echo CHtml::encode($data->deal_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_expire')); ?>:</b>
	<?php echo CHtml::encode($data->date_expire); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>