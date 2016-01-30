<?php

$this->breadcrumbs=array(
	'Manufacturers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Manufacturer', 'url'=>array('index')),
	array('label'=>'Create Manufacturer', 'url'=>array('create')),
);
$this->title = 'Manage Manufacturers';
?>

<!-- <h1>Manage Manufacturers</h1> -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'manufacturer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'manufacturer_id',
		'manufacturer_name',
		'date_added',
		'date_modified',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{update}&nbsp;&nbsp;{delete}'
		),
	),
)); ?>
