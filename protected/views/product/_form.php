<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php 
                    echo $form->dropDownList($model,'category_id',
                    CHtml::listData(Category::model()->findAll(),
                    'category_id', 'category_name'), array('empty'=>'--please select--'));
                ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manufacturer_id'); ?>
		<?php
                echo $form->dropDownList($model,'manufacturer_id',
                CHtml::listData(Manufacturer::model()->findAll(),
                'manufacturer_id', 'manufacturer_name'), array('empty'=>'--please select--'));
                ?>
		<?php echo $form->error($model,'manufacturer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_name'); ?>
		<?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'product_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_model'); ?>
		<?php echo $form->textField($model,'product_model',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'product_model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_price'); ?>
		<?php echo $form->textField($model,'product_price'); ?>
		<?php echo $form->error($model,'product_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_description'); ?>
		<?php echo $form->textArea($model,'product_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'product_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_image'); ?>
		<?php echo $form->fileField($model,'product_image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'product_image'); ?>
	</div>	

        <?php if(!empty($model->product_image)){?>
	 
	<div class="row">		
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/img/products/'.$model->product_image.'','product_image',array("style"=>"width:93px;" ));?>
	</div>
	<?php }?>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->