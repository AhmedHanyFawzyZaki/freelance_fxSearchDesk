<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'Choose-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'table_form span12'),
        ));
?>

<?php
if(Yii::app()->user->hasFlash('msg')){
    echo '<div class="alert alert-success">'.Yii::app()->user->getFlash('msg').'</div>';
}
?>

<div class="control-group ">
    <?php echo CHtml::label(Yii::t('translate', 'Select File'), 'file', array('class' => 'control-label')); ?>
    <?php echo '<div class="controls">';
    echo CHtml::fileField('file', '', array('class' => 'span9')); 
    echo '</div>';
    ?>
</div>

<div class="form-actions ">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => Yii::t('translate', 'Submit'),
        'htmlOptions' => array(
            'style' => "float: right; margin-right: 100px;",
            'name'=>'submit'
        )
    ));
    ?>
</div>

<?php $this->endWidget(); ?>