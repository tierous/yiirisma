<h3>View Admin #<?php echo $model->admin_id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'admin_id',
		'admin_email',
		'username',
		'password',
	),
)); ?>
