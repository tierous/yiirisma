<?php
$this->breadcrumbs = array(
    'Product Option Value To Product Options' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List ProductOptionValueToProductOption', 'url' => array('index')),
    array('label' => 'Create ProductOptionValueToProductOption', 'url' => array('create')),
);
$this->title = 'Manage Product Option Value To Product Options'
?>

<!-- <h1>Manage Product Option Value To Product Options</h1> -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'product-option-value-to-product-option-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'product_option_value_to_product_option_id',
        array(  'name'=>'product_option_id', 
                        'type'=>'html', 
            'value'=>'$data->productOption->product_option_name','sortable'=>TRUE,
            'filter' => CHtml::listData(ProductOption::model()->findAll(),'product_option_id','product_option_name'),
                ),           
        array(  'name'=>'product_option_value_id', 
                        'type'=>'html', 
            'value'=>'$data->productOptionValue->product_option_value_name','sortable'=>TRUE,
            'filter' => CHtml::listData(ProductOptionValue::model()->findAll(),'product_option_value_id','product_option_value_name'),
                ),        
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}&nbsp;&nbsp;{delete}'
        ),
    ),
));
?>
