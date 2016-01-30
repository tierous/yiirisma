<div style="padding-right: 10px ;margin-left:5px;margin-bottom:15px;border:1px solid #CCC; margin-right: 5px; margin-top: 5px; text-align: justify; padding-top: 15px;">
    <div class="form" style="margin-left: 15px;">
    	
        <?php $form = $this -> beginWidget('CActiveForm', 
        array('id' => 'customer-form', 
        	'enableAjaxValidation' => false,
        	'enableClientValidation'=>TRUE, 
		)); ?>

        <p class="note">
            Fields with <span class="required">*</span> are required.
        </p>

        <?php echo $form -> errorSummary($model); ?>

        <div class="row">
            <?php echo $form -> labelEx($model, 'customer_name'); ?>
            <?php echo $form -> textField($model, 'customer_name', array('size' => 57, 'maxlength' => 57)); ?>
            <?php echo $form -> error($model, 'customer_name'); ?>
        </div>
        
        <div class="row">
            <?php echo $form -> labelEx($model, 'customer_dob'); ?>
            <?php echo $form -> dateField($model, 'customer_dob'); ?>
            <?php echo $form -> error($model, 'customer_dob'); ?>
        </div>
        
        <div class="row">
            <?php echo $form -> labelEx($model, 'customer_telephone'); ?>
            <?php echo $form -> telField($model, 'customer_telephone', array('size' => 57, 'maxlength' => 57)); ?>
            <?php echo $form -> error($model, 'customer_telephone'); ?>
        </div>
        
        <div class="row">
            <?php echo $form -> labelEx($model, 'customer_email'); ?>
            <?php echo $form -> textField($model, 'customer_email', array('size' => 45, 'maxlength' => 45)); ?>
            <?php echo $form -> error($model, 'customer_email'); ?>
        </div>

        <div class="row">
            <?php echo $form -> labelEx($model, 'customer_password'); ?>
            <?php echo $form -> passwordField($model, 'customer_password', array('size' => 35, 'maxlength' => 35)); ?>
            <?php echo $form -> error($model, 'customer_password'); ?>
        </div>

        <div class="row">
            <?php echo $form -> labelEx($model, 'comparePassword'); ?>
            <?php echo $form -> passwordField($model, 'comparePassword', array('size' => 35, 'maxlength' => 35)); ?>
            <?php echo $form -> error($model, 'comparePassword'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton("Register"); ?>
        </div>

        <?php $this -> endWidget(); ?>
    </div>
</div>