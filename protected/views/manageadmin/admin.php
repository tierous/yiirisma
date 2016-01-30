<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Admin', 'url'=>array('index')),
	array('label'=>'Create Admin', 'url'=>array('create')),
);

$this->title = 'Manage Admins';
?>

<!-- <h1>Manage Users</h1> -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'admin_id',
		'admin_email',
		'username',
		'password',
		'last_login_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
