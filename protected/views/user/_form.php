<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

        <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->
<div class="well dis_tab">
    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'username', array('class' => 'span9', 'maxlength' => 255)); ?>

    <?php
    echo '<div class="control-group">';
    echo $form->labelEx($model, 'image', array('class' => 'control-label'));
    echo '<div class="controls">';
    echo $form->fileField($model, 'image', array('class' => 'span8', 'maxlength' => 255));
    if (!$model->isNewRecord) {
        $this->widget('ext.SAImageDisplayer', array(
            'image' => $model->image,
            'title' => $model->username,
            'alt' => $model->username,
            'defaultImage' => 'defaultUser.jpg',
            'class' => 'pull-right',
            'group' => 'users',
            'size' => 'tiny',
        ));
    }
    echo '</div></div>';
    ?>

    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span9', 'maxlength' => 255)); ?>

    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span9', 'maxlength' => 255)); ?>

    <?php echo $form->textFieldRow($model, 'first_name', array('class' => 'span9', 'maxlength' => 255)); ?>

    <?php echo $form->textFieldRow($model, 'last_name', array('class' => 'span9', 'maxlength' => 255)); ?>

    <?php echo $form->textFieldRow($model, 'phone', array('class' => 'span9', 'maxlength' => 255)); ?>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'user_type', array('class' => 'control-label')) ?>
        <?php
        $this->widget('Select2', array(
            'model' => $model,
            'attribute' => 'user_type',
            'data' => CHtml::listData(UserType::model()->findAll(),'id','title'),
            'htmlOptions' => array('class' => "span7"),
        ));
        ?>
    </div>
    
    <div class="control-group ch <?= $hosp ?>">
        <?php echo $form->labelEx($model, 'date_of_renewal', array('class' => 'control-label')) ?>
        <div class="controls">
            <?php
            $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                'model' => $model, //Model object
                'attribute' => 'date_of_renewal', //attribute name
                'language' => '',
                'mode' => 'date', //use "time","date" or "datetime" (default)
                'options' => array(
                    "dateFormat" => Yii::app()->params['dateFormatJS'],
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'showOtherMonths' => true, // Show Other month in jquery
                    'yearRange' => "-10:+10",
                ), // jquery plugin options
                'htmlOptions' => array(
                    'style' => 'height:20px;',
                    'class' => 'span8',
                ),
            ));
            ?>
        </div>
    </div>
    
    <?php echo $form->checkBoxRow($model, 'active'); ?>
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
