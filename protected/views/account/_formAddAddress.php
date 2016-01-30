<?php $form = $this -> beginWidget('CActiveForm', 
		array('id' => 'add-addressBook-form', 
		'enableAjaxValidation' => false, 
		'enableClientValidation' => TRUE, 
		)
	); 
?>

<p class="note">
	Fields with <span class="required">*</span> are required.
</p>
<!--untuk menampilkan summary error-->
<?php echo $form -> errorSummary($model); ?>

<div class="row">
	<?php echo $form -> labelEx($model, 'entry_name'); ?>
	<?php echo $form -> textField($model, 'entry_name', array('size' => 56, 'maxlength' => 56)); ?>
	<?php echo $form -> error($model, 'entry_name'); ?>
</div>

<div class="row">
	<?php echo $form -> labelEx($model, 'entry_address'); ?>
	<?php echo $form -> textArea($model, 'entry_address', array('cols' => 43, 'rows' => 3)); ?>
	<?php echo $form -> error($model, 'entry_address'); ?>
</div>

<div class="row">
	<?php echo $form -> labelEx($model, 'entry_province_id'); ?>
	<?php
                echo $form->dropDownList($model,'entry_province_id',
                CHtml::listData(Province::model()->findAll(),
                'province_id', 'province_name'), array('empty'=>'--please select--'));
        ?>
	<?php echo $form -> error($model, 'entry_province_id'); ?>
</div>

<div class="row">
	<?php echo $form -> labelEx($model, 'entry_city_id'); ?>
	<?php
                echo $form->dropDownList($model,'entry_city_id',
                CHtml::listData(City::model()->findAll(),
                'city_id', 'city_name'), array('empty'=>'--please select--'));
        ?>
	<?php echo $form -> error($model, 'entry_city_id'); ?>
</div>

<div class="row buttons">
	<?php echo CHtml::submitButton($model -> isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this -> endWidget(); ?>