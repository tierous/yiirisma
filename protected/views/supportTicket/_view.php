<?php
/* @var $this SupportTicketController */
/* @var $data SupportTicket */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('support_ticket_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->support_ticket_id), array('view', 'id'=>$data->support_ticket_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('support_ticket_code')); ?>:</b>
	<?php echo CHtml::encode($data->support_ticket_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue')); ?>:</b>
	<?php echo CHtml::encode($data->issue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question')); ?>:</b>
	<?php echo CHtml::encode($data->question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>