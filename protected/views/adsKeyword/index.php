<?php
$this->breadcrumbs = array(
    'Ads Keywords' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List AdsKeyword'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create AdsKeyword'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ads-keyword-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Manage Ads Keywords'); ?>

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
    'id' => 'ads-keyword-grid',
    'type' => 'striped  condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'keyword',
        'counter',
        'active' => array(
            'name' => 'active',
            'value' => '$data->active?"Active":"Inactive"',
            'filter' => array('1' => 'Active', '0' => 'Inactive')
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
