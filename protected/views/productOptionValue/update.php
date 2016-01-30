<?php
/* @var $this ProductOptionValueController */
/* @var $model ProductOptionValue */

$this->breadcrumbs=array(
	'Product Option Values'=>array('index'),
	$model->product_option_value_id=>array('view','id'=>$model->product_option_value_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductOptionValue', 'url'=>array('index')),
	array('label'=>'Create ProductOptionValue', 'url'=>array('create')),
	array('label'=>'View ProductOptionValue', 'url'=>array('view', 'id'=>$model->product_option_value_id)),
	array('label'=>'Manage ProductOptionValue', 'url'=>array('admin')),
);
?>

<h1>Update ProductOptionValue <?php echo $model->product_option_value_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>