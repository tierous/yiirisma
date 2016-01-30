<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Customers</h1>

<div>
<?php echo CHtml::link('Add Customer', array('customer/create')); ?>
</div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customer-grid',
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
		'customer_id',
		'customer_name',
		'customer_dob',
		array(
            'name' => 'customer_gender',
            'type' => 'raw',
            'header' => 'Gender',
            'value' => 'CHtml::encode($data->formatGender())',
            'htmlOptions' => array('width' => '20'),
        ),
		'customer_telephone',
		/*
		'customer_email',
		'customer_password',
		*/
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}&nbsp;&nbsp;{delete}'
		),
	),
)); ?>
