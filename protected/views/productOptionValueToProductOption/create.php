<?php
/* @var $this ProductOptionValueToProductOptionController */
/* @var $model ProductOptionValueToProductOption */

$this->breadcrumbs=array(
	'Product Option Value To Product Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductOptionValueToProductOption', 'url'=>array('index')),
	array('label'=>'Manage ProductOptionValueToProductOption', 'url'=>array('admin')),
);
?>

<h1>Create ProductOptionValueToProductOption</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>