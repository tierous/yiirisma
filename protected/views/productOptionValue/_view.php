<?php
/* @var $this ProductOptionValueController */
/* @var $data ProductOptionValue */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_option_value_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product_option_value_id), array('view', 'id'=>$data->product_option_value_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_option_value_name')); ?>:</b>
	<?php echo CHtml::encode($data->product_option_value_name); ?>
	<br />


</div>