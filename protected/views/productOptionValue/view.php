<?php
/* @var $this ProductOptionValueController */
/* @var $model ProductOptionValue */

$this->breadcrumbs=array(
	'Product Option Values'=>array('index'),
	$model->product_option_value_id,
);

$this->menu=array(
	array('label'=>'List ProductOptionValue', 'url'=>array('index')),
	array('label'=>'Create ProductOptionValue', 'url'=>array('create')),
	array('label'=>'Update ProductOptionValue', 'url'=>array('update', 'id'=>$model->product_option_value_id)),
	array('label'=>'Delete ProductOptionValue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->product_option_value_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductOptionValue', 'url'=>array('admin')),
);
?>

<h1>View ProductOptionValue #<?php echo $model->product_option_value_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_option_value_id',
		'product_option_value_name',
	),
)); ?>
