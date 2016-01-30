<?php
/* @var $this ProductAttributeController */
/* @var $model ProductAttribute */

$this->breadcrumbs=array(
	'Product Attributes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductAttribute', 'url'=>array('index')),
	array('label'=>'Manage ProductAttribute', 'url'=>array('admin')),
);
?>

<h1>Create ProductAttribute</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>