<?php
/* @var $this ProvinceController */
/* @var $model Province */

$this->breadcrumbs=array(
	'Provinces'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Province', 'url'=>array('index')),
	array('label'=>'Manage Province', 'url'=>array('admin')),
);
?>

<h1>Create Province</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>