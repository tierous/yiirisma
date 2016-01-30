<?php
$this->breadcrumbs = array(
    'Support Tickets' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List SupportTicket', 'url' => array('index')),
    array('label' => 'Create SupportTicket', 'url' => array('create')),
);
$this->title = 'Manage Support Tickets';
?>

<!-- <h1>Manage Support Tickets</h1> -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'support-ticket-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'support_ticket_id',
        'support_ticket_code',
        array(  'name'=>'customer_id', 
                        'type'=>'html', 
			'value'=>'$data->customer->customer_name','sortable'=>TRUE,
			//'filter' => CHtml::listData(Customer::model()->findAll(),'customer_id','customer_name'),
                ),
        'issue',
        'question',
        'answer',        
        'date_added',
        'date_modified',         
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
