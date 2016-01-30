<?php
/* @var $this ProductAttributeController */
/* @var $model ProductAttribute */

$this->breadcrumbs=array(
	'Product Attributes'=>array('index'),
	$model->product_attribute_id=>array('view','id'=>$model->product_attribute_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductAttribute', 'url'=>array('index')),
	array('label'=>'Create ProductAttribute', 'url'=>array('create')),
	array('label'=>'View ProductAttribute', 'url'=>array('view', 'id'=>$model->product_attribute_id)),
	array('label'=>'Manage ProductAttribute', 'url'=>array('admin')),
);
?>

<h1>Update ProductAttribute <?php echo $model->product_attribute_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>