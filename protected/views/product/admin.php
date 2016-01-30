<?php

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
);
$this->title = 'Manage Products';
?>

<!-- <h1>Manage Products</h1> -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'columns'=>array(
		'product_id',
		array(  'name'=>'category_id', 
                        'type'=>'html', 
			'value'=>'$data->category->category_name','sortable'=>TRUE,
			'filter' => CHtml::listData(Category::model()->findAll(),'category_id','category_name'),
                ),
		array(  'name'=>'manufacturer_id', 
                        'type'=>'html', 
			'value'=>'$data->manufacturer->manufacturer_name','sortable'=>TRUE,
			'filter' => CHtml::listData(Manufacturer::model()->findAll(),'manufacturer_id','manufacturer_name'),
                ),
		'product_name',
		'product_model',
		'product_price',
		/*
		'product_description',
		'product_image',
		'date_added',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
            'template' => '{update}&nbsp;&nbsp;{delete}'
        ),
	),
)); ?>
