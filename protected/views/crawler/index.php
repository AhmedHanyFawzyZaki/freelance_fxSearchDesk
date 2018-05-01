<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'advertise-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'action' => Yii::app()->request->baseUrl . '/crawler/test',
        ));
?>

<p class="help-block">Please Keep the websites field empty if you want to crawl all websites (not recommended).</p><hr>

<div class="control-group">
    <label class="control-label">Websites</label>
    <?php
    $this->widget('Select2', array(
        'name' => 'websites',
        'data' => CHtml::listData($websites, 'id', 'url'),
        'htmlOptions' => array('class' => "span7", 'multiple' => 'multiple'),
    ));
    ?>
</div>

<div class="control-group">
    <label class="control-label">Depth Level</label>
    <div class="controls">
        <?php
        echo CHtml::textField('depth', '2', array('class' => 'span4'));
        ?>
    </div>
</div>

<div class="form-actions clear">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'CRAWL NOW',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
