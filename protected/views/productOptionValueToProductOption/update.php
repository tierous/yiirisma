<?php
/* @var $this ProductOptionValueToProductOptionController */
/* @var $model ProductOptionValueToProductOption */

$this->breadcrumbs=array(
	'Product Option Value To Product Options'=>array('index'),
	$model->product_option_value_to_product_option_id=>array('view','id'=>$model->product_option_value_to_product_option_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductOptionValueToProductOption', 'url'=>array('index')),
	array('label'=>'Create ProductOptionValueToProductOption', 'url'=>array('create')),
	array('label'=>'View ProductOptionValueToProductOption', 'url'=>array('view', 'id'=>$model->product_option_value_to_product_option_id)),
	array('label'=>'Manage ProductOptionValueToProductOption', 'url'=>array('admin')),
);
?>

<h1>Update ProductOptionValueToProductOption <?php echo $model->product_option_value_to_product_option_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>