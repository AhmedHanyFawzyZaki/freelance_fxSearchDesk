<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'saved-link-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

        <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'link', array('class' => 'span9', 'maxlength' => 255)); ?>

<div class="control-group">
    <?php echo $form->labelEx($model, 'user_id', array('class' => 'control-label')) ?>
    <?php
    $this->widget('Select2', array(
        'model' => $model,
        'attribute' => 'user_id',
        'data' => CHtml::listData(User::model()->findAll(array('condition' => 'user_type=1')), 'id', 'username'),
        'htmlOptions' => array('class' => "span7", "empty" => " "),
    ));
    ?>
</div>

<div class="control-group">
    <?php echo $form->labelEx($model, 'folder_id', array('class' => 'control-label')) ?>
    <?php
    $this->widget('Select2', array(
        'model' => $model,
        'attribute' => 'folder_id',
        'data' => CHtml::listData(SearchFolder::model()->findAll(), 'id', 'title'),
        'htmlOptions' => array('class' => "span7", "empty" => " "),
    ));
    ?>
</div>

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
