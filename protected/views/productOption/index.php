<?php
/* @var $this ProductOptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Options',
);

$this->menu=array(
	array('label'=>'Create ProductOption', 'url'=>array('create')),
	array('label'=>'Manage ProductOption', 'url'=>array('admin')),
);
?>

<h1>Product Options</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
