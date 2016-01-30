<?php
/* @var $this ProductOptionValueController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Option Values',
);

$this->menu=array(
	array('label'=>'Create ProductOptionValue', 'url'=>array('create')),
	array('label'=>'Manage ProductOptionValue', 'url'=>array('admin')),
);
?>

<h1>Product Option Values</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
