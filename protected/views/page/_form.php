<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'page-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

        <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span9', 'maxlength' => 255)); ?>

<div class="clear"></div>

<?php
/*echo $form->labelEx($model, 'introduction', array('rows' => 6, 'cols' => 100));
$this->widget('application.extensions.eckeditor.ECKEditor', array(
    'model' => $model,
    'attribute' => 'introduction',
));*/
?>

<div class="clear"><br></div>

<?php
echo $form->labelEx($model, 'details', array('rows' => 6, 'cols' => 100));
$this->widget('application.extensions.eckeditor.ECKEditor', array(
    'model' => $model,
    'attribute' => 'details',
));
?>

<div class="clear"><br></div>

<?php echo $form->checkBoxRow($model, 'active'); ?>

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
