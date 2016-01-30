<?php

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);

?>

<h1>Manage Categories</h1>

<div>
    <?php echo CHtml::link('Add Category', array('category/create'));?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'summaryText'=>'',
        'pager'=>array(
        'header'=> '',
        'firstPageLabel'=>'| <',
        'lastPageLabel'=>'> |',
        'nextPageLabel'=>'>',
        'prevPageLabel'=>'<',
        ),
	'columns'=>array(
		'category_id',
		'category_name',
		'date_added',
		'date_modified',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update}&nbsp;&nbsp;{delete}'
		),
	),
)); ?>
