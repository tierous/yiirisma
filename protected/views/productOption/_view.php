<?php
/* @var $this ProductOptionController */
/* @var $data ProductOption */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_option_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product_option_id), array('view', 'id'=>$data->product_option_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_option_name')); ?>:</b>
	<?php echo CHtml::encode($data->product_option_name); ?>
	<br />


</div>