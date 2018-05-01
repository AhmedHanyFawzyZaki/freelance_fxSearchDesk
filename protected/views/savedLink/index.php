<?php
$this->breadcrumbs = array(
    'Saved Links' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List SavedLink'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create SavedLink'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('saved-link-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Manage Saved Links'); ?>

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
    'id' => 'saved-link-grid',
    'type' => 'striped  condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        'link',
        'user_id' => array(
            'name' => 'user_id',
            'value' => '$data->user->username',
            'filter' => CHtml::listData(User::model()->findAll(array('condition' => 'user_type=1')), 'id', 'username'),
        ),
        'folder_id' => array(
            'name' => 'folder_id',
            'value' => '$data->folder->title',
            'filter' => CHtml::listData(SearchFolder::model()->findAll(), 'id', 'title'),
        ),
        'date_created',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
