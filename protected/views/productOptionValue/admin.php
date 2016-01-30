<?php
$this->breadcrumbs = array(
    'Product Option Values' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List ProductOptionValue', 'url' => array('index')),
    array('label' => 'Create ProductOptionValue', 'url' => array('create')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('product-option-value-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
$this->title = 'Manage Product Option Values';
?>

<!-- <h1>Manage Product Option Values</h1> -->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'product-option-value-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'product_option_value_id',
        'product_option_value_name',
        array(
            'class' => 'CButtonColumn',
            'template'=>'{update}&nbsp;&nbsp;{delete}'
        ),
    ),
));
?>
