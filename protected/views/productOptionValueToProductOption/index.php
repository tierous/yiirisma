<?php
/* @var $this ProductOptionValueToProductOptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Option Value To Product Options',
);

$this->menu=array(
	array('label'=>'Create ProductOptionValueToProductOption', 'url'=>array('create')),
	array('label'=>'Manage ProductOptionValueToProductOption', 'url'=>array('admin')),
);
?>

<h1>Product Option Value To Product Options</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
