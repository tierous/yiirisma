<?php
/* @var $this ProductOptionValueToProductOptionController */
/* @var $model ProductOptionValueToProductOption */

$this->breadcrumbs=array(
	'Product Option Value To Product Options'=>array('index'),
	$model->product_option_value_to_product_option_id,
);

$this->menu=array(
	array('label'=>'List ProductOptionValueToProductOption', 'url'=>array('index')),
	array('label'=>'Create ProductOptionValueToProductOption', 'url'=>array('create')),
	array('label'=>'Update ProductOptionValueToProductOption', 'url'=>array('update', 'id'=>$model->product_option_value_to_product_option_id)),
	array('label'=>'Delete ProductOptionValueToProductOption', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->product_option_value_to_product_option_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductOptionValueToProductOption', 'url'=>array('admin')),
);
?>

<h1>View ProductOptionValueToProductOption #<?php echo $model->product_option_value_to_product_option_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_option_value_to_product_option_id',
		'product_option_id',
		'product_option_value_id',
	),
)); ?>
