<?php
/* @var $this ProductAttributeController */
/* @var $model ProductAttribute */

$this->breadcrumbs=array(
	'Product Attributes'=>array('index'),
	$model->product_attribute_id,
);

$this->menu=array(
	array('label'=>'List ProductAttribute', 'url'=>array('index')),
	array('label'=>'Create ProductAttribute', 'url'=>array('create')),
	array('label'=>'Update ProductAttribute', 'url'=>array('update', 'id'=>$model->product_attribute_id)),
	array('label'=>'Delete ProductAttribute', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->product_attribute_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductAttribute', 'url'=>array('admin')),
);
?>

<h1>View ProductAttribute #<?php echo $model->product_attribute_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_attribute_id',
		'product_id',
		'product_option_id',
		'option_value_id',
		'option_value_price',
	),
)); ?>
