
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'deal-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'product_id'); ?>
        <?php
        echo $form->dropDownList($model, 'product_id', CHtml::listData(Product::model()->findAll(), 'product_id', 'product_name'), array('empty' => '--please select--'));
        ?>
        <?php echo $form->error($model, 'product_id'); ?>
    </div>        	

    <div class="row">
        <?php echo $form->labelEx($model, 'deal_price'); ?>
        <?php echo $form->textField($model, 'deal_price'); ?>
        <?php echo $form->error($model, 'deal_price'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'date_expire'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'date_expire',
            'value' => $model->date_expire,
            'options' => array(
                'dateFormat' => 'yy-mm-dd',
                'showOn' => 'button',
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
                'duration' => 'fast',
                'showAnim' => 'slide',
            ),
            'htmlOptions' => array('size' => 20,),
                )
        );
        ?>
        <?php echo $form->error($model, 'date_expire'); ?>
    </div>

    

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php
        echo $form->dropDownList($model, 'status', array('1' => 'on', '0' => 'off'), array('empty' => '--select--'));
        ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->