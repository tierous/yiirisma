<?php
$this->breadcrumbs = array(
    'Product Options' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List ProductOption', 'url' => array('index')),
    array('label' => 'Create ProductOption', 'url' => array('create')),
);
$this->title = 'Manage Product Options';
?>

<!-- <h1>Manage Product Options</h1> -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'product-option-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'product_option_id',
        'product_option_name',
        array(
            'class' => 'CButtonColumn',
            'template'=>'{update}&nbsp;&nbsp;{delete}'
        ),
    ),
));
?>
