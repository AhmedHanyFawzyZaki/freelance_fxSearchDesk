<?php
$this->breadcrumbs = array(
    'Rss Feeds' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List RssFeed'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create RssFeed'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rss-feed-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Manage Rss Feeds'); ?>

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
    'id' => 'rss-feed-grid',
    'type' => 'striped  condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        'content',
        'date_created',
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
