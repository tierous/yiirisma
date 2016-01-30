<?php
/* @var $this SupportTicketController */
/* @var $model SupportTicket */

$this->breadcrumbs=array(
	'Support Tickets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SupportTicket', 'url'=>array('index')),
	array('label'=>'Manage SupportTicket', 'url'=>array('admin')),
);
?>

<h1>Create SupportTicket</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>