<?php
/* @var $this ProductAttributeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Attributes',
);

$this->menu=array(
	array('label'=>'Create ProductAttribute', 'url'=>array('create')),
	array('label'=>'Manage ProductAttribute', 'url'=>array('admin')),
);
?>

<h1>Product Attributes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
