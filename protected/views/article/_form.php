<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'article-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

        <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span9', 'maxlength' => 255)); ?>

<?php /*
echo '<div class="control-group">';
echo $form->labelEx($model, 'image', array('class' => 'control-label'));
echo '<div class="controls">';
echo $form->fileField($model, 'image', array('class' => 'span8', 'maxlength' => 255));
if (!$model->isNewRecord) {
    $this->widget('ext.SAImageDisplayer', array(
        'image' => $model->image,
        //'title' => $model->username,
        //'alt' => $model->username,
        //'defaultImage' => 'defaultUser.jpg',
        'class' => 'pull-right',
        'group' => 'users',
        'size' => 'tiny',
    ));
}
echo '</div></div>';
*/?>

<div class="control-group span11">
    <?php
    echo $form->labelEx($model, 'intro', array('class' => 'control-label'));
    echo '<div class="controls">';
    $this->widget('application.extensions.eckeditor.ECKEditor', array(
        'model' => $model,
        'attribute' => 'intro',
    ));
    echo '</div>';
    ?>
</div>

<div class="control-group span11">
    <?php
    echo $form->labelEx($model, 'description', array('class' => 'control-label'));
    echo '<div class="controls">';
    $this->widget('application.extensions.eckeditor.ECKEditor', array(
        'model' => $model,
        'attribute' => 'description',
    ));
    echo '</div>';
    ?>
</div>

<div class="clear"><br></div>

<?php echo $form->checkBoxRow($model, 'publish'); ?>

<?php //echo $form->checkBoxRow($model, 'featured'); ?>

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
