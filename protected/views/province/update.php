<?php
/* @var $this ProvinceController */
/* @var $model Province */

$this->breadcrumbs=array(
	'Provinces'=>array('index'),
	$model->province_id=>array('view','id'=>$model->province_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Province', 'url'=>array('index')),
	array('label'=>'Create Province', 'url'=>array('create')),
	array('label'=>'View Province', 'url'=>array('view', 'id'=>$model->province_id)),
	array('label'=>'Manage Province', 'url'=>array('admin')),
);
?>

<h1>Update Province <?php echo $model->province_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>