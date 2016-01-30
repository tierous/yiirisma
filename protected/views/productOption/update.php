<?php
/* @var $this ProductOptionController */
/* @var $model ProductOption */

$this->breadcrumbs=array(
	'Product Options'=>array('index'),
	$model->product_option_id=>array('view','id'=>$model->product_option_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductOption', 'url'=>array('index')),
	array('label'=>'Create ProductOption', 'url'=>array('create')),
	array('label'=>'View ProductOption', 'url'=>array('view', 'id'=>$model->product_option_id)),
	array('label'=>'Manage ProductOption', 'url'=>array('admin')),
);
?>

<h1>Update ProductOption <?php echo $model->product_option_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>