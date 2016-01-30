<?php
/* @var $this ManufacturerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Manufacturers',
);

$this->menu=array(
	array('label'=>'Create Manufacturer', 'url'=>array('create')),
	array('label'=>'Manage Manufacturer', 'url'=>array('admin')),
);
?>

<h1>Manufacturers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
