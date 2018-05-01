<?php
$this->breadcrumbs = array(
    'Advertises' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List Advertise'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create Advertise'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('advertise-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Manage Advertises'); ?>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php
$this->renderPartial('_search', array(
    'model' => $model,
));
?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'advertise-grid',
    'type' => 'striped  condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        'title',
        //'description',
        //'code',
        'active' => array(
            'name' => 'active',
            'value' => '$data->active?"Active":"Inactive"',
            'filter' => array('1' => 'Active', '0' => 'Inactive')
        ),
        'type' => array(
            'name' => 'type',
            'value' => 'Advertise::getType($data->type)',
            'filter' => Advertise::listTypes()
        ),
        /*'ads_keyword' => array(
            'name' => 'ads_keyword',
            'value' => '$data->adKeyword->keyword',
            'filter' => CHtml::listData(AdsKeyword::model()->findAll(), 'id', 'keyword'),
        ),*/
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
