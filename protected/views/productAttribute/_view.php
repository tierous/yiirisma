<?php
/* @var $this ProductAttributeController */
/* @var $data ProductAttribute */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_attribute_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product_attribute_id), array('view', 'id'=>$data->product_attribute_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_option_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_option_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('option_value_id')); ?>:</b>
	<?php echo CHtml::encode($data->option_value_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('option_value_price')); ?>:</b>
	<?php echo CHtml::encode($data->option_value_price); ?>
	<br />


</div>