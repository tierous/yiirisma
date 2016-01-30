<?php
$this->breadcrumbs=array(
	'Support Tickets'=>array('index'),
	$model->support_ticket_id=>array('view','id'=>$model->support_ticket_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SupportTicket', 'url'=>array('index')),
	array('label'=>'Create SupportTicket', 'url'=>array('create')),
	array('label'=>'View SupportTicket', 'url'=>array('view', 'id'=>$model->support_ticket_id)),
	array('label'=>'Manage SupportTicket', 'url'=>array('admin')),
);
?>

<h1>Update SupportTicket <?php echo $model->support_ticket_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>