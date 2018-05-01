<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'contact-us-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

        <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'company_name', array('class' => 'span9', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'first_name', array('class' => 'span9', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'last_name', array('class' => 'span9', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span9', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'span9', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'subject', array('class' => 'span9', 'maxlength' => 255)); ?>

<?php echo $form->textAreaRow($model, 'comment', array('rows' => 6, 'cols' => 50, 'class' => 'span9')); ?>

<?php echo $form->checkBoxRow($model, 'send_updates'); ?>

<div class="form-actions clear">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
