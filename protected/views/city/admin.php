<?php

$this->breadcrumbs=array(
	'Cities'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List City', 'url'=>array('index')),
	array('label'=>'Create City', 'url'=>array('create')),
);

?>

<h1>Manage Cities</h1>
<div>
    <?php echo CHtml::link('Add City', array('city/create'));?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'city-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'summaryText' => '',
        'pager' => array(
        'header' => '',
        'firstPageLabel' => '| <',
        'lastPageLabel' => '> |',
        'nextPageLabel' => '>',
        'prevPageLabel' => '<',
    ),
	'columns'=>array(
		'city_id',
		array(  'name'=>'province_id', 
                        'type'=>'html', 
			'value'=>'$data->province->province_name','sortable'=>TRUE,
			'filter' => CHtml::listData(Province::model()->findAll(),'province_id','province_name'),
                ),
		'city_name',
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}&nbsp;&nbsp;{delete}'
		),
	),
)); ?>
