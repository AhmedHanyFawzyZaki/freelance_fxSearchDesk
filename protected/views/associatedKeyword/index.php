<?php
$this->breadcrumbs = array(
    'Associated Keywords' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List AssociatedKeyword'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create AssociatedKeyword'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('associated-keyword-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Manage Associated Keywords'); ?>

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
    'id' => 'associated-keyword-grid',
    'type' => 'striped  condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        'title',
        'focal_keyword_id' => array(
            'name' => 'focal_keyword_id',
            'value' => '$data->focalKeyword->title',
            'filter' => CHtml::listData(FocalKeyword::model()->findAll(), 'id', 'title'),
        ),
        'country_currency' => array(
            'name' => 'country_currency',
            'value' => '$data->countryCurrency->title',
            'filter' => CHtml::listData(CountryCurrency::model()->findAll(), 'id', 'title'),
        ),
        'active' => array(
            'name' => 'active',
            'value' => '$data->active?"Active":"Inactive"',
            'filter' => array('1' => 'Active', '0' => 'Inactive')
        ),
        'is_focal' => array(
            'name' => 'is_focal',
            'value' => '$data->is_focal?"Focal Keyword":"Country/Currency Keyword"',
            'filter' => array('1' => 'Focal Keyword', '0' => 'Country/Currency Keyword')
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
