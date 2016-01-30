<?php
/* @var $this ProductOptionValueController */
/* @var $model ProductOptionValue */

$this->breadcrumbs=array(
	'Product Option Values'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductOptionValue', 'url'=>array('index')),
	array('label'=>'Manage ProductOptionValue', 'url'=>array('admin')),
);
?>

<h1>Create ProductOptionValue</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>