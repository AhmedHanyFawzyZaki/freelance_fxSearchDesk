<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'advertise-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

        <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span9', 'maxlength' => 255)); ?>

<?php echo $form->checkBoxRow($model, 'active'); ?>

<?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaRow($model, 'code', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->radioButtonListRow($model, 'type', Advertise::listTypes(), array('onclick'=>'checkType()')); ?>

<!--<div class="control-group" id="fo">
    <?php echo $form->labelEx($model, 'ads_keyword', array('class' => 'control-label')) ?>
    <?php
    $this->widget('Select2', array(
        'model' => $model,
        'attribute' => 'ads_keyword',
        'data' => CHtml::listData(AdsKeyword::model()->findAll(),'id','keyword'),
        'htmlOptions' => array('class' => "span7", "empty" => " "),
    ));
    ?>
</div>-->

<script>
    $(document).ready(function(){
        checkType();
    });
    function checkType(){
        var val=document.getElementById('Advertise_type_1').checked?'1':'0';
        if(val==1){
            $('#fo').show();
        }else{
            $('#fo').hide();
        }
    }
</script>

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
