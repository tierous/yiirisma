
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product-option-value-to-product-option-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'product_option_id'); ?>
        <?php
        echo $form->dropDownList($model, 'product_option_id', CHtml::listData(ProductOption::model()->findAll(), 'product_option_id', 'product_option_name'), array('empty' => '--please select--'));
        ?>
        <?php echo $form->error($model, 'product_option_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'product_option_value_id'); ?>
        <?php
        echo $form->dropDownList($model, 'product_option_value_id', CHtml::listData(ProductOptionValue::model()->findAll(), 'product_option_value_id', 'product_option_value_name'), array('empty' => '--please select--'));
        ?>
        <?php echo $form->error($model, 'product_option_value_id'); ?>
    </div>

    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->