<h3>View Product #<?php echo $model->product_id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_id',
		'product_name',
		'category_id',
		'product_price',
	),
)); ?>
