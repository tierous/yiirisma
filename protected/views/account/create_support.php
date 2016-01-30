<div class="form">
    <h1>Create SupportTicket</h1>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'support-ticket-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'issue'); ?>
<?php echo $form->textField($model, 'issue', array('size' => 60, 'maxlength' => 64)); ?>
<?php echo $form->error($model, 'issue'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'question'); ?>
<?php echo $form->textArea($model, 'question', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->error($model, 'question'); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->