<?php
/* @var $this ProductOptionController */
/* @var $model ProductOption */

$this->breadcrumbs=array(
	'Product Options'=>array('index'),
	$model->product_option_id,
);

$this->menu=array(
	array('label'=>'List ProductOption', 'url'=>array('index')),
	array('label'=>'Create ProductOption', 'url'=>array('create')),
	array('label'=>'Update ProductOption', 'url'=>array('update', 'id'=>$model->product_option_id)),
	array('label'=>'Delete ProductOption', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->product_option_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductOption', 'url'=>array('admin')),
);
?>

<h1>View ProductOption #<?php echo $model->product_option_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_option_id',
		'product_option_name',
	),
)); ?>
