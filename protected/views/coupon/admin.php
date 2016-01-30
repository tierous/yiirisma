<?php
$this->breadcrumbs = array(
    'Coupons' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Coupon', 'url' => array('index')),
    array('label' => 'Create Coupon', 'url' => array('create')),
);
?>

<h1>Manage Coupons</h1>

<div>
<?php echo CHtml::link('Add Coupon', array('coupon/create')); ?>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'coupon-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'summaryText' => '',
    'pager' => array(
        'header' => '',
        'firstPageLabel' => '| <',
        'lastPageLabel' => '> |',
        'nextPageLabel' => '>',
        'prevPageLabel' => '<',
    ),
    'columns' => array(
        'coupon_id',
        'coupon_code',
        'coupon_discount',       
        'coupon_date_expire',
        'date_added',
        'coupon_used',        
        array(
            'name' => 'coupon_status',
            'type' => 'raw',
            'header' => 'Status',
            'value' => 'CHtml::encode($data->formatStatus())',
            'htmlOptions' => array('width' => '20'),
        ),
        /*
          'date_modified',
         */
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}&nbsp;&nbsp;{delete}'
        ),
    ),
));
?>
