<?php
/* @var $this ProductOptionController */
/* @var $model ProductOption */

$this->breadcrumbs=array(
	'Product Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductOption', 'url'=>array('index')),
	array('label'=>'Manage ProductOption', 'url'=>array('admin')),
);
?>

<h1>Create ProductOption</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>