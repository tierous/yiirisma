<?php
/* @var $this CouponController */
/* @var $model Coupon */

$this->breadcrumbs=array(
	'Coupons'=>array('index'),
	$model->coupon_id=>array('view','id'=>$model->coupon_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coupon', 'url'=>array('index')),
	array('label'=>'Create Coupon', 'url'=>array('create')),
	array('label'=>'View Coupon', 'url'=>array('view', 'id'=>$model->coupon_id)),
	array('label'=>'Manage Coupon', 'url'=>array('admin')),
);
?>

<h1>Update Coupon <?php echo $model->coupon_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>