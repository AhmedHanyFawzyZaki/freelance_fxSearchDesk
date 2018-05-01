<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'associated-keyword-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

<script>
    $(document).ready(function(){
        checkType(<?=$model->is_focal?>);
    });
    function checkType(val){
        if(val==1){
            $('#fo').show();
            $('#cc').hide();
        }else{
            $('#fo').hide();
            $('#cc').show();
        }
    }
</script>
    <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span9', 'maxlength' => 255)); ?>

<?php echo $form->radioButtonListRow($model, 'is_focal', array('0' => 'Country/Curreny', '1' => 'Focal'), array('onchange' => 'checkType(this.value)')); ?>

<div class="control-group" id="fo">
    <?php echo $form->labelEx($model, 'focal_keyword_id', array('class' => 'control-label')) ?>
    <?php
    $this->widget('Select2', array(
        'model' => $model,
        'attribute' => 'focal_keyword_id',
        'data' => FocalKeyword::GetAllCategorized(),
        'htmlOptions' => array('class' => "span7", "empty" => " "),
    ));
    ?>
</div>

<div class="control-group" id="cc">
    <?php echo $form->labelEx($model, 'country_currency', array('class' => 'control-label')) ?>
    <?php
    $this->widget('Select2', array(
        'model' => $model,
        'attribute' => 'country_currency',
        'data' => CHtml::listData(CountryCurrency::model()->findAll(), 'id', 'title'),
        'htmlOptions' => array('class' => "span7", "empty" => " "),
    ));
    ?>
</div>

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
