<?php
/* @var $this SupportTicketController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Support Tickets',
);

$this->menu=array(
	array('label'=>'Create SupportTicket', 'url'=>array('create')),
	array('label'=>'Manage SupportTicket', 'url'=>array('admin')),
);
?>

<h1>Support Tickets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
