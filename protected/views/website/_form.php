<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'website-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

        <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'url', array('class' => 'span9', 'maxlength' => 255)); ?>

<div class="control-group">
    <?php echo $form->labelEx($model, 'included_categories', array('class' => 'control-label')) ?>
    <?php
    $this->widget('Select2', array(
        'model' => $model,
        'attribute' => 'included_categories',
        'data' => CHtml::listData(SearchTab::model()->findAll(), 'id', 'title'),
        'htmlOptions' => array('class' => "span7", 'multiple' => 'multiple'),
    ));
    ?>
</div>

<div class="clear"><br></div>

<?php
echo $form->labelEx($model, 'description', array('rows' => 6, 'cols' => 100));
$this->widget('application.extensions.eckeditor.ECKEditor', array(
    'model' => $model,
    'attribute' => 'description',
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
