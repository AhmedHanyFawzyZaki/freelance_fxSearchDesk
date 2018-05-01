<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'settings-form',
    'enableAjaxValidation' => false,
    'type' => 'vertical',
        ));
?>

        <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

<div class="well">
    <h4 class="text text-info text-center">Required Fields</h4>
    <?php //echo $form->textFieldRow($model, 'name', array('class' => 'span9', 'maxlength' => 255)); ?>

    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span9', 'maxlength' => 255)); ?>

    <?php //echo $form->textFieldRow($model, 'phone', array('class' => 'span9', 'maxlength' => 255)); ?>

    <?php echo $form->textFieldRow($model, 'registration_period', array('class' => 'span9', 'maxlength' => 255, 'append' => 'days')); ?>
    
    <?php echo $form->textFieldRow($model, 'registration_period_paid', array('class' => 'span9', 'append' => 'days')); ?>

    <?php echo $form->textFieldRow($model, 'registration_period_price', array('class' => 'span9', 'append' => '$')); ?>
    
    <?php echo $form->textFieldRow($model, 'word_num8', array('class' => 'span9')); ?>

</div>
<!--<div class="well">
    <h4 class="text text-info text-center">Word Tracking</h4>
    <?php /*echo $form->textFieldRow($model, 'word_num1', array('class' => 'span9')); ?>
    <?php echo $form->textFieldRow($model, 'word_num2', array('class' => 'span9')); ?>
    <?php echo $form->textFieldRow($model, 'word_num3', array('class' => 'span9')); ?>
    <?php echo $form->textFieldRow($model, 'word_num4', array('class' => 'span9')); ?>
    <?php echo $form->textFieldRow($model, 'word_num5', array('class' => 'span9')); ?>
    <?php echo $form->textFieldRow($model, 'word_num6', array('class' => 'span9')); ?>
    <?php echo $form->textFieldRow($model, 'word_num7', array('class' => 'span9')); ?>
    <?php echo $form->textFieldRow($model, 'word_num8', array('class' => 'span9'));*/ ?>
</div>-->
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
