<?php
/* @var $this SupportTicketController */
/* @var $model SupportTicket */

$this->breadcrumbs=array(
	'Support Tickets'=>array('index'),
	$model->support_ticket_id,
);

$this->menu=array(
	array('label'=>'List SupportTicket', 'url'=>array('index')),
	array('label'=>'Create SupportTicket', 'url'=>array('create')),
	array('label'=>'Update SupportTicket', 'url'=>array('update', 'id'=>$model->support_ticket_id)),
	array('label'=>'Delete SupportTicket', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->support_ticket_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SupportTicket', 'url'=>array('admin')),
);
?>

<h1>View SupportTicket #<?php echo $model->support_ticket_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'support_ticket_id',
		'support_ticket_code',
		'customer_id',
		'issue',
		'question',
		'answer',
		'date_added',
		'date_modified',
	),
)); ?>
